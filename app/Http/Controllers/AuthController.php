<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\ShipAgency;
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
            return redirect('/')->with('error', 'Wrong credential, please try again.');;
        }
    }
    public function logout()
    {
        Auth::logout();
        Session::forget('username');
        Session::forget('nameUser'); // Clear the user object from the session
        return redirect('/')->with('success', 'You have been logged out!');
    }

    public function save(Request $request)
    {
        $request->validate([
            'userName' => 'required|string|email|max:255|unique:users,email',
            'yourName' => 'required|string|max:255',
            'companyName' => 'required|string|max:255',
        ]);
        $email_system_admin = env('EMAIL_SYSTEM_ADMIN');
        try {
            $user = new User;
            $user->email = $request->input('userName');
            $user->name = $request->input('yourName');
            $user->note = $request->input('companyName');
            $user->password = "P12345.9876p*";
            $user->status = 2; // 0 = Inactive, 1 = Active, 2 = New Request
            $user->save();
            sendEmailUserNewRequest($user->name, $email_system_admin, $user->note, $user->email);

            return redirect()->route('register')->with('success', 'Request sent successfully. You will receive a notification by email soon with your process status.');
        } catch (\Exception $e) {
            // Captura cualquier excepción que ocurra
            Log::error($e); // Registra el error en los logs

            // Redirige hacia atrás con un mensaje de error
            return redirect()->route('register')->with('error', 'There was an error creating your request. Please try again or contact the system administrator.');
        }
    }

    // SAVE NEW USER FROM ADMIN USER
    public function create(Request $request)
    {
        $request->validate([
            'inputName' => 'required|string|max:255',
            'inputEmail' => 'required|string|email|max:255|unique:users,email',
            'inputPassword' => 'required|string|min:8',
            'shipagency' => 'required|string|max:255',
        ]);

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
        $users = User::whereIn('status', [0, 1])->get();
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

    // Get user information for update
    public function editUser(Request $request)
    {

        $userEmail = $request->input('email');

        $user = User::where('email', $userEmail)->first();

        if (!$user) {
            return redirect()->route('users.table')->with('error', 'User not found.');
        }

        return view('users.profile-edit', compact('user'));
    }

    // Update user information
    public function updateUser(Request $request)
    {
        // $request->validate([
        //     'name' => 'required|string|max:255',
        //     'email' => 'required|string|email|max:255|unique:users,email,' . $id,
        //     'shipping_line' => 'required|string|max:255',
        //     'type' => 'required|integer',
        //     'note' => 'nullable|string|max:255',
        // ]);

        try {
            $userEmail = $request->input('email');
            $user = User::where('email', $userEmail)->first();

            if ($user) {
                $user->name = $request->input('inputName');
                // $user->email = $request->input('email');
                $user->shipping_line = $request->input('shipagency');
                $user->type = $request->input('role');
                $user->note = $request->input('inputNote');
                $user->save();

                return redirect()->route('users.table')->with('success', 'User updated successfully.');
            } else {
                return redirect()->route('users.table')->with('error', 'User not found.');
            }
        } catch (\Exception $e) {
            Log::error($e); // Log the error
            return redirect()->route('users.table')->with('error', 'There was an error updating the user. Please try again.');
        }
    }

    // Delete user
    public function deleteUser(Request $request)
    {
        $userEmail = $request->input('email');
        $email_super_administrator = env('EMAIL_SUPER_ADMINISTRATOR');


        try {
            if ($userEmail === $email_super_administrator) {
                return redirect()->route('users.table')->with('error', 'Operation denied. Cannot delete this user.');
            }

            $user = User::where('email', $userEmail)->first();

            if ($user) {
                $user->delete();
                return redirect()->route('users.table')->with('success', 'User deleted successfully.');
            } else {
                return redirect()->route('users.table')->with('error', 'User not found.');
            }
        } catch (\Exception $e) {
            Log::error($e);
            return redirect()->route('users.table')->with('error', 'There was an error deleting the user. Please try again.');
        }
    }

    public function newRequestList()
    {
        $newUserRequests = User::where('status', 2)->get();
        return view('users.new-users-list', compact('newUserRequests'));
    }

    // Activate New Users
    public function activateUser(Request $request)
    {

        $userEmail = $request->input('email');

        $user = User::where('email', $userEmail)->first();

        if (!$user) {
            return redirect()->route('users.new-users-list')->with('error', 'User not found.');
        }

        return view('users.activate', compact('user'));
    }

    public function activatingUser(Request $request)
    {
        // $request->validate([
        //     'name' => 'required|string|max:255',
        //     'email' => 'required|string|email|max:255|unique:users,email,' . $id,
        //     'shipping_line' => 'required|string|max:255',
        //     'type' => 'required|integer',
        //     'note' => 'nullable|string|max:255',
        // ]);

        try {
            $userEmail = $request->input('email');
            $nameLastName = $request->input('name');
            $user = User::where('email', $userEmail)->first();
            $newPassword = generateRandomPassword();

            if ($user) {
                // $user->name = $request->input('inputName');
                // $user->email = $request->input('email');
                $user->shipping_line = $request->input('shipagency');
                $user->password = $newPassword;
                $user->status = 1;
                // $user->type = $request->input('role');
                // $user->note = $request->input('inputNote');
                $user->save();

                sendEmailUserActivated($nameLastName, $newPassword, $userEmail);

                return redirect()->route('users.table')->with('success', 'User '.$userEmail.' account has been activated.');
            } else {
                return redirect()->route('users.table')->with('error', 'User not found.');
            }
        } catch (\Exception $e) {
            Log::error($e); // Log the error
            return redirect()->route('users.table')->with('error', 'There was an error activating the user. Please try again.');
        }
    }

    public function rejectUser(Request $request)
    {

        try {
            $userEmail = $request->input('email');
            $nameLastName = $request->input('name');
            $user = User::where('email', $userEmail)->first();
            $newPassword = generateRandomPassword();

            if ($user) {
                $user->shipping_line = $request->input('shipagency');
                $user->password = $newPassword;
                $user->status = 0;
                $user->save();

                return redirect()->route('users.new-users-list')->with('error', 'User '.$userEmail.' account has been rejected.');
            } else {
                return redirect()->route('users.new-users-list')->with('error', 'User not found.');
            }
        } catch (\Exception $e) {
            Log::error($e); // Log the error
            return redirect()->route('users.new-users-list')->with('error', 'There was an error rejecting the user. Please try again.');
        }
    }

}
