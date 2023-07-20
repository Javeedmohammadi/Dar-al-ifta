<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Information;
use RealRashid\SweetAlert\Facades\Alert;

class InformationController extends Controller
{
    public function create()
    {
        return view(view: 'information.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'info_desc' => ['required', 'string', 'max:2000', 'min:3'],
        ]);

        Information::create(
            [
                'info_desc' => $request->info_desc,
            ]
        );

        Alert::success('پاملرنه!', '.نوی معلومات اضافه شول');
        return to_route('index.info', app()->getLocale());
    }

    public function show()
    {
        $information = Information::all();
        return view('information.show', compact('information'));
    }

    public function index()
    {
        $information = Information::all();
        return view('information.index', compact('information'));
    }

    public function destroy($lang, $id)
    {

        $information = Information::findOrFail($id);
        $information->delete();

        Alert::error('پاملرنه!', '.معلومات له منځه لاړل');
        return to_route('index.info', app()->getLocale());
    }
}
