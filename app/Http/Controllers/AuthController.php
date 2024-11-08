<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;
use App\Services\UserService;

class AuthController extends Controller
{
    protected $userService;
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }
    public function validateLogin(Request $request)
    {
        // Aquí validarías los datos del usuario y los autenticarías
        // Por ahora, simplemente mostraremos los datos enviados

        $username = $request->username;
        $password = $request->password;
        $nameUser = $this->userService->getUserByUsername($username);

        // return view('dashboard', compact('username', 'password'));

        if (Auth::attempt(['email' => $request->username, 'password' => $request->password])) {
            // Store the user object
            Session::put('username', $username);
            Session::put('name', $nameUser->name);
            Session::put('type', $nameUser->type);
            Session::put('shipping_line', $nameUser->shipping_line);
            //////////////////////////////////////////////////////////////
            return redirect()->intended('/dashboard');
        } else {
            return redirect('/')->with('status', 'Wrong credential, please try again.');;
        }
    }
    public function logout()
    {
        Auth::logout();
        Session::forget('username');
        Session::forget('nameUser'); // Clear the user object from the session
        return redirect('/')->with('status', 'You have been logged out!');
    }

    public function save(Request $request)
    {

        $user = new User;
        $user->email = $request->input('userName');
        $user->name = $request->input('yourName');
        $user->note = $request->input('companyName');
        $user->password = "P12345";
        $user->status = 2; // 0 = Inactive, 1 = Active, 2 = New Request
        $user->save();
        sendEmailUserNewRequest($user->name, $user->email, $user->note);

        return redirect()->route('register')->with('success', 'Request sent successfully. You will receive a notification by email soon with your process status.');
    }

    // SAVE NEW USER FROM ADMIN USER
    public function create(Request $request)
    {
        try {
            $user = new User;
            $user->name = $request->input('inputName');
            $user->email = $request->input('inputEmail');
            $user->password = $request->input('inputPassword');
            $user->shipping_line = $request->input('shipagency');
            $user->type = $request->input('role');
            $user->note = $request->input('inputNote');
            $user->status = 1; // 0 = Inactive, 1 = Active, 2 = New Request
            $user->save();
            //sendEmailUserNewRequest($user->name, $user->email, $user->note);

            return redirect()->route('users.table')->with('success', 'New user account created.');
        } catch (\Exception $e) {
            // Captura cualquier excepción que ocurra
            Log::error($e); // Registra el error en los logs

            // Redirige hacia atrás con un mensaje de error
            return redirect()->route('users.table')->with('error', 'There was an error saving the user. Please try again.');
        }
    }

    public function table()
    {
        $users = User::all();
        return view('users.table', compact('users'));
    }

    // Update user password
    public function updatePassword(Request $request)
    {
        //    $request->validate([
        //        'email' => 'required|email|exists:users,email',
        //        'password' => 'required|string|min:8|confirmed',
        //    ]);

        $userEmail = $request->input('email');
        try {
            $user = User::where('email', $userEmail)->first();
            if ($user) {

                $newPassword = generateRandomPassword();
                $nameLastName = $user->name;

                sendEmailUserResetPassword($nameLastName, $newPassword, $userEmail);

                $user->password = $newPassword;
                $user->save();

                return redirect()->route('users.table')->with('success', 'User password reset successfully. An email with the new password has been sent to the user.');
            } else {
                return redirect()->route('users.table')->with('error', 'User not found.');
            }
        } catch (\Exception $e) {
            Log::error($e); // Log the error
            return redirect()->route('users.table')->with('error', 'There was an error updating the password. Please try again.');
        }
    }

    public function updateProfile(Request $request)
    {
        $newPassword = $request->input('newPassword');
        $newPasswordRepeat = $request->input('newPasswordRepeat');

        if ($newPassword !== $newPasswordRepeat) {
            return redirect()->route('user.profile')->with('error', 'New password and repeat password do not match.');
        }

        $user = User::where('email', Session::get('username'))->first();

        if ($user) {
            $user->password = $request->input('newPassword');
            $user->save();
            return redirect()->route('user.profile')->with('success', 'Password updated successfully.');
        } else {
            return redirect()->route('user.profile')->with('error', 'User not found.');
        }
    }
}
