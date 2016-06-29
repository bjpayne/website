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

Route::get('/', ['as' => 'home', function () {
    return view('home');
}]);

Route::post('/contact', ['as' => 'contact', function () {
    
    Mail::send(
        'emails.message',
        [
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'text' => $_POST['message']
        ],
        function (Message $message) {
            
            $message->subject('Message from ' . $_POST['name']);
        
            $message->from($_POST['email'], $_POST['name']);
        
            $message->to('bj.payne@me.com');

        }
    );

    Mail::send(
        'emails.confirmation',
        [
            'name' => $_POST['name']
        ],
        function (Message $message) {

            $message->subject('Confirmation');

            $message->from('benj@minpayne.com', 'Ben Payne');

            $message->to($_POST['email']);

        }
    );

    $message = new \App\Message;

    $message->name      = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
    $message->email     = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $message->message   = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_SPECIAL_CHARS);

    $message->save();

    return redirect(route('home'))->with('message_sent', 'Thank you for your message ' . $_POST['name']);

}]);
