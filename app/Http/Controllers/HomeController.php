<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactMessage;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Mail\Mailer;
use Illuminate\Mail\Message;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('construction');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreContactMessage $request
     * @param \Illuminate\Mail\Mailer $mail
     * @return \Illuminate\Http\Response
     */
    public function store(StoreContactMessage $request, Mailer $mail)
    {
        $mail->send(
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

        $mail->send(
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

        $request->session()->flash('message', 'Thank you for your message ' . $_POST['name']);
        $request->session()->flash('message-type', 'info');

        return redirect(route('home'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
