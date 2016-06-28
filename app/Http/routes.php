<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use Illuminate\Mail\Message;

Route::get('/', function () {
    return view('home');
});

Route::post('/contact', function () {
    
    Mail::send(
        'contact',
        [
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'message' => $_POST['message']
        ],
        function (Message $message) {
        
            $message->from('no-reply@bj-payne.com', 'Site visitor email');
        
            $message->to('benja@minpayne.com');

        }
    );

    $message = new \App\Message;

    $message->name      = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
    $message->email     = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $message->message   = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_SPECIAL_CHARS);

    $message->save();

});
