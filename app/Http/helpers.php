<?php

use Mailgun\Mailgun;
use App\Models\InventoryYardFile;

function generateRandomFourDigitNumber()
{
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
        'h:X-Mailgun-Variables' => json_encode(['name' => $name, 'email' => $email, 'company' => $company]),
    ];

    // Send the email
    $response = $mgClient->messages()->send($domain, $params);

    return $response;
}

function latestRecordYardInventory()
{
    // $latestRecord = InventoryYardFile::orderBy('created_at', 'desc')->first();
    $latestRecord = InventoryYardFile::where('file_type', 'IY')->orderBy('created_at', 'desc')->first();
    // Assign the file_name to a variable and store it in the session

    if ($latestRecord) {
        $latestYardInventory = $latestRecord->file_name;
        return $latestYardInventory;
    }
    return null;
}

function latestDensityForecast()
{
    $latestRecord = InventoryYardFile::where('file_type', 'DF')->orderBy('created_at', 'desc')->first();

    if ($latestRecord) {
        $latestDensityForecast = $latestRecord->file_name;
        return $latestDensityForecast;
    }
    return null;
}
