<?php

use Illuminate\Foundation\Inspiring;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
 */

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->describe('Display an inspiring quote');

$client = new GuzzleHttp\Client;

Artisan::command('oauth:token', function () use ($client) {

    $response = $client->post('http://localhost:8000/oauth/token', [
        'form_params' => [
            'client_id' => 4,
            // The secret generated when you ran: php artisan passport:install
            'client_secret' => 'qo1Xhzbn1Zs5iKomOhld3RQSdXHhDhT5tPpIwkek',
            'grant_type' => 'password',
            'username' => '18500466496',
            'password' => '123456',
            'scope' => '*',
        ]
    ]);

    // You'd typically save this payload in the session
    $auth = json_decode( (string) $response->getBody() );

    $response = $client->post('http://localhost:8000/oauth/token', [
        'form_params' => [
            'grant_type' => 'refresh_token',
            'refresh_token' => 'the-refresh-token',
            'client_id' => 4,
            'client_secret' => 'qo1Xhzbn1Zs5iKomOhld3RQSdXHhDhT5tPpIwkek',
            'scope' => '',
        ],
    ]);
    $auth = json_decode( (string) $response->getBody() );
    dd($auth);

    $response = $client->get('http://localhost:8000/api/note', [
        'headers' => [
            'Authorization' => 'Bearer '.$auth->access_token,
        ]
    ]);
    $notes = json_decode( (string) $response->getBody() );

    $noteList = "";
    foreach ($notes as $note) {
        $noteList .= "<li>{$note->name}".($note->description ? '✅' : '')."</li>";
    }

    echo "<ul>{$noteList}</ul>";

})->describe('oauth token');
