<?php

namespace App\Http\Controllers;

use App\Models\SuggestObjection;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class SuggestObjectionController extends Controller
{
    public function show()
    {
        return view('suggestObjection.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'suggest_name' => ['required', 'string', 'max:5', 'min:3'],
            'suggest_phone' => ['required', 'string', 'min:10', 'max:15'],
            'suggest_email' => ['required', 'string', 'email', 'max:255'],
            'suggest_desc' => ['required', 'string', 'min:10', 'max:2000'],
        ]);

        SuggestObjection::create(
            [
                'suggest_name' => $request->suggest_name,
                'suggest_phone' => $request->suggest_phone,
                'suggest_email' => $request->suggest_email,
                'suggest_desc' => $request->suggest_desc,
            ]
        );

        Alert::success('پاملرنه!', '.ستاسو وړاندیز واستول شو');
        return to_route('show.suggest.objection', app()->getLocale());
    }

    public function index()
    {
        $suggest_Objection = SuggestObjection::Paginate(2);
        return view('suggestObjection.index', compact('suggest_Objection'));
    }

    public function destory($lang, $id)
    {
        $sg = SuggestObjection::findOrFail($id);
        $sg->delete();

        Alert::error('پاملرنه!', '.وړاندیز له منځه لاړ');
        return to_route('show.suggest.index', app()->getLocale());
    }
}
