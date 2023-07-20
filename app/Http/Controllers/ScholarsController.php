<?php

namespace App\Http\Controllers;

use App\Models\scholars;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ScholarsController extends Controller
{
    public function show()
    {
        $scholars = scholars::paginate(5);
        return view('scholars.show', compact('scholars'));
    }

    public function index()
    {
        $scholars = scholars::latest()->paginate(3);
        return view('scholars.index', compact('scholars'));
    }

    public function create()
    {
        return view('scholars.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'scholar_name' => ['required', 'string', 'max:255', 'min:3'],
            'scholar_self_desc' => ['required', 'string', 'max:2000', 'min:10'],
        ]);

        scholars::create(
            [
                'scholar_name' => $request->scholar_name,
                'scholar_self_desc' => $request->scholar_self_desc,
            ]
        );

        Alert::success('پاملرنه!', '.نوی عالم اضافه شو');
        return to_route('scholar.index', app()->getLocale());
    }

    public function destroy($lang, $scholars)
    {
        $remove_scholar = Scholars::findOrFail($scholars);
        $remove_scholar->delete();

        Alert::error('پاملرنه!', '.عالم معلومات له منځه لاړل');
        return to_route('scholar.index', app()->getLocale());
    }

    public function edit($lang, $id)
    {
        $scholar = scholars::findOrFail($id);
        return view('scholars.edit', compact('scholar'));
    }

    public function store_edited($lang, $scholars, Request $request)
    {
        $request->validate([
            'scholar_name' => ['required', 'string', 'max:255', 'min:3'],
            'scholar_self_desc' => ['required', 'string', 'max:1500', 'min:10'],
        ]);

        $scholar = scholars::findOrFail($scholars);
        $scholar->update(
            [
                'scholar_name' => $request->scholar_name,
                'scholar_self_desc' => $request->scholar_self_desc,
            ]
        );

        Alert::success('پاملرنه!', '.د عالم په اړه معلومات نوی شول');
        return to_route('scholar.index', app()->getLocale());
    }
}
