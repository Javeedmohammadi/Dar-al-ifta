<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\person;


class AjaxSearchControlller extends Controller
{
    public function search($language, Request $request)
    {
        $language = app()->getLocale();
        $people = Person::where('person_father_name', 'like', "%{$request->search}%")
            ->orWhere('person_question', 'like', "%{$request->search}%")
            ->get()->take(100);

        $result = '';
        foreach ($people as $person) {
            $result .=
                "
                <div class='mb-1' dir='rtl'>
                    <h4>
                        <a class='p-1 text-white' href=$language/singleFullDetails/{$person->id}>
                            $person->person_father_name
                        </a>
                    </h4>
                </div>
            ";
        }

        return response($result);
    }
}
