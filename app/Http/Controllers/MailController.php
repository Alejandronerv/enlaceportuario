<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Mailgun\Mailgun;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class MailController extends Controller
{
    public function sendEmailRecoveryProcess(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $email = $request->input('email');

        // Check if the email exists in the database
        $user = User::where('email', $email)->where('status', 1)->first();

        if (!$user) {
            return redirect()->route('forgot-password')->with('error', 'Account not found.');
        }

        $domain = env('MAILGUN_DOMAIN');
   $apiKey = env('MAILGUN_SECRET');
   $linkRecovery = env('EMAIL_LINK_RECOVERY_PASSWORD') . '?email=' . urlencode($email);
        

        // Initialize the Mailgun client
        $mgClient = Mailgun::create($apiKey);
        $token = generateRandomFourDigitNumber();

        // Update the user record with the token
        $user->password_reset_token = $token;
        $user->password_reset_token_created_at = now();
        $user->save();

        // Define the email parameters
        $params = [
            'from'    => "CCTlink Notifications <notifications@{$domain}>",
            'to'      => $email,
            'subject' => 'CCTlink - Password Recovery',
            'template' => 'password-recovery',
            'h:X-Mailgun-Variables' => json_encode(['token' => $token, 'link' => $linkRecovery]),
        ];

        // Send the email
        $response = $mgClient->messages()->send($domain, $params);

        if ($response->getId()) {
            return redirect()->route('forgot-password')->with('success', 'Check your inbox! We\'ve sent you a link to create a new password.');
        } else {
            return redirect()->route('forgot-password')->with('error', 'Your email address is not recognized or may be locked.');
        }
    }

    public function saveNewPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'token' => 'required',
            'password' => 'required|min:8|confirmed',
        ]);

        $email = $request->input('email');
        $token = $request->input('token');
        $password = $request->input('password');

        // Check if the email and token are valid
        $user = User::where('email', $email)
                    ->where('password_reset_token', $token)
                    ->where('status', 1)
                    ->first();

        if (!$user) {
            return redirect()->route('password.reset', ['email' => $email])->with('error', 'Invalid token or email.');
        }

        // Update the user's password
        $user->password = Hash::make($password);
        $user->password_reset_token = null;
        $user->password_reset_token_created_at = null;
        $user->save();

        return redirect()->route('login')->with('success', 'Your password has been reset successfully.');
    }
}
