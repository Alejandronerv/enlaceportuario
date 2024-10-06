<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Mailgun\Mailgun;

class MailController extends Controller
{
    public function sendEmailRecoveryProcess()
    {
        $domain = env('MAILGUN_DOMAIN');
        $apiKey = env('MAILGUN_SECRET');

        // Initialize the Mailgun client
        $mgClient = Mailgun::create($apiKey);
        $token = generateRandomFourDigitNumber();

        // Define the email parameters
        $params = [
            'from'    => "CCTlink Notifications <notifications@{$domain}>",
            'to'      => 'TEST <alejandro@nervcorp.io>',
            'subject' => 'CCTlink - Password Recovery',
            'template' => 'password-recovery',
            'h:X-Mailgun-Variables' => json_encode(['token' => $token]),
        ];

        // Send the email
        $response = $mgClient->messages()->send($domain, $params);

        if ($response->getId()) {
            return 'Email sent successfully!';
        } else {
            return 'Error sending email: ' . $response->getMessage();
        }
    }
}
