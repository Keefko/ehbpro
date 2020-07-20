<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{


    public function postContact(Request $request){

        $mail = new \App\Mail();
        $mail->name = $request->input('name');
        $mail->email = $request->input('email');
        $mail->subject = $request->input('service');
        $mail->phone = $request->input('phone');
        $mail->text = $request->input('text');
        $mail->save();

        $data = array(
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'subject' => $request->input('service'),
            'phone' => $request->input('phone'),
            'bodyMessage' => $request->input('text'),
        );

        Mail::send('emails.contact', $data, function($message) use ($data){
            $message->from($data['email']);
            $message->to('kohooutdan@gmail.com');
            $message->subject($data['subject']);
        });

        session()->flash('success', 'Your Email was Sent!');

        return redirect('/');
    }

    public function destroy($id){
        $mail = \App\Mail::findOrFail($id);
        $mail->delete();
        return redirect()->back()->with('success', 'Mail bol zmazaný');
    }
}
