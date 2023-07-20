<?php

namespace App\Http\Controllers;

use App\Models\Artical;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ArticalController extends Controller
{
    public function show()
    {
        $articals = Artical::Paginate(3);
        return view('articals.show', compact('articals'));
    }

    public function index()
    {
        $articals = Artical::Paginate(3);
        return view('articals.index', compact('articals'));
    }

    public function create()
    {
        return view('articals.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'artical_name' => ['required', 'string', 'max:255', 'min:3'],
            'artical_desc' => ['required', 'string', 'max:2000', 'min:10'],
            'artical_source' => ['required', 'string', 'max:255', 'min:3'],
        ]);

        Artical::create(
            [
                'artical_name' => $request->artical_name,
                'artical_desc' => $request->artical_desc,
                'artical_source' => $request->artical_source,
            ]
        );

        Alert::success('پاملرنه!', '.نوی مقاله اضافه شوه');
        return to_route('artical.index', app()->getLocale());
    }

    public function destroy($lang, $articals)
    {
        $articals = Artical::findOrFail($articals);
        $articals->delete();

        Alert::error('پاملرنه!', '.مقاله له منځه لاړه');
        return to_route('artical.index', app()->getLocale());
    }
}
