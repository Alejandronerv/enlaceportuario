<?php

use Mailgun\Mailgun;

function generateRandomFourDigitNumber() {
    return rand(1000, 9999);
}

function sendEmailUserNewRequest($name, $email, $company)
{
    $domain = env('MAILGUN_DOMAIN');
    $apiKey = env('MAILGUN_SECRET');

    // Initialize the Mailgun client
    $mgClient = Mailgun::create($apiKey);

    // Define the email parameters
    $params = [
        'from'    => "CCTlink Notifications <notifications@{$domain}>",
        'to'      => 'TEST <alejandro@nervcorp.io>',
        'subject' => 'CCTlink - New User Request',
        'template' => 'register_new_user',
        'h:X-Mailgun-Variables' => json_encode(['name' => $name,'email' => $email,'company' => $company]),
    ];

    // Send the email
    $response = $mgClient->messages()->send($domain, $params);

    return $response;
}