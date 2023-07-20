<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\person;
use RealRashid\SweetAlert\Facades\Alert;

class PersonController extends Controller
{
    public function index()
    {
        $person = person::latest()->Paginate(2);
        return view('people.index', compact('person'));
    }

    public function create()
    {
        return view('people.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'fullname' => ['required', 'string', 'max:255', 'min:3'],
            'fathername' => ['required', 'string', 'max:255', 'min:3'],
            'phone' => ['required', 'string', 'min:10', 'max:15'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'question' => ['required', 'string', 'min:10', 'max:4000'],
        ]);

        Person::create(
            [
                'person_full_name' => $request->fullname,
                'person_father_name' => $request->fathername,
                'person_phone' => $request->phone,
                'person_email' => $request->email,
                'person_question' => $request->question,
            ]
        );

        Alert::success('پاملرنه!', '.ستاسو پوښتنه واستول شوه');
        return to_route('people.create', app()->getLocale());
    }

    public function edit($lang, $person_id)
    {
        $person = Person::findOrFail($person_id);
        return view('people.edit', compact('person', 'person_id'));
    }

    public function update($lang, $person_id, Request $request)
    {
        $request->validate([
            'answer' => ['required', 'string', 'max:5000', 'min:10'],
            'answerby' => ['required', 'string', 'max:5000', 'min:3'],
        ]);

        $person = Person::findOrFail($person_id);
        $person->persondetail()->updateOrCreate(
            [
                'person_id' => $person_id,
            ],
            [
                'answer' => $request->answer,
                'answerBy' => $request->answerby,
            ]
        );

        // $email_in_advance = new SendEmailController();
        // $email_in_advance -> send_email($person->id);

        Alert::success('پاملرنه!', '.پوښتنه ځواب شوه');
        return to_route("people", app()->getLocale());
    }

    public function destroy($lang, $id)
    {
        $person = Person::findOrFail($id);
        $person->delete();

        Alert::error('پاملرنه!', '.پوښتنه له منځه لاړه');
        return to_route('people', app()->getLocale());
    }

    public function getAll()
    {

        $people = Person::paginate(15);
        return view('people.getAll', compact('people'));
    }

    public function getOne($lang, $id)
    {
        $increase_counter = Person::findOrFail($id);
        Person::where('id', $increase_counter->id)
            ->update(
                [
                    'views_counter' => $increase_counter->views_counter + 1
                ]
            );

        $person = Person::findOrFail($id);
        return view('people.getOne', compact('person'));
    }
}
