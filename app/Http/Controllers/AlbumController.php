<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Album;
use Cache;

class AlbumController extends Controller
{
    public function __construct()
    {
        $this->allowedLangs = ['sr', 'en'];
    }

    public function create()
    {
        $lang = $request->lang ?? 'sr';

        return view('cms.album.form', ['item' => new Album(), 'editing' => false, 'lang' => $lang]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:191'],
            'type' => ['required', 'numeric'],
            'is_active' => ['nullable', 'string', 'in:1']
        ]);

        Album::create([
            'title' => $request->title,
            'is_active' => $request->is_active,
            'type' => $request->type,
        ]);

        Cache::forget( 'album');

        session()->flash('success', 'Dodato.');

        return redirect('cms/galleries');
    }

    public function edit($id)
    {
        $lang = $request->lang ?? 'sr';

        return view('cms.album.form', ['item' => Album::findOrFail($id), 'editing' => true, 'lang' => $lang]);
    }

    public function update(Request $request, $id)
    {
        $album = Album::findOrFail($id);
        $request->validate([
            'title' => ['required', 'string', 'max:191'],
            'type' => ['required', 'numeric'],
            'is_active' => ['nullable', 'string', 'in:1']
        ]);

        $album->title = $request->title;
        $album->type = $request->type;
        $album->is_active = $request->is_active;
        $album->save();

        Cache::forget( 'album');

        session()->flash('success', 'Dodato.');

        return redirect('cms/galleries');
    }
}
