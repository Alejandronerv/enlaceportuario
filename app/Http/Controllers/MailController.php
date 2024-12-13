<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Mailgun\Mailgun;
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
            'h:X-Mailgun-Variables' => json_encode(['token' => $token]),
        ];

        // Send the email
        $response = $mgClient->messages()->send($domain, $params);

        if ($response->getId()) {
            return redirect()->route('forgot-password')->with('success', 'Check your inbox! We\'ve sent you a link to create a new password.');
        } else {
            return redirect()->route('forgot-password')->with('error', 'There was an error sending the email. Please try again.');
        }
    }
}
