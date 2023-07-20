<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\person;
use Illuminate\Support\Facades\Mail;
use App\Mail\EmailPerson;

class SendEmailController extends Controller
{
    public function send_email ($id) {
                
        $person = Person::findOrFail($id); 
        $emailData = [
            'fullname' => "{$person -> person_full_name}",
            'fathername' => "{$person -> person_father_name}",
            'phone' => "{$person -> person_phone}",
            'email' => "{$person -> person_email}",
            'question' => "{$person -> person_question}",
            'answer' => "{$person -> persondetail -> answer}" ?? '',
            'answerBy' => "{$person -> persondetail -> answerBy}" ?? '',
            'questioned_at' => "{$person -> created_at}",
            'answered_at' => "{$person -> persondetail -> created_at }" ?? '',        
        ];

        Mail::to("{$person -> person_email}")
            -> send(new EmailPerson($emailData));            
            
        return redirect('/people');
                // dd('Send Successfully! WOW!');
    }
}
