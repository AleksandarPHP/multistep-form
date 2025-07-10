<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Apartment;
use App\Models\Floor;
use Illuminate\Http\Request;
use App\Models\Gallery;

class HomeController extends Controller
{
    public function gallery(){
        $albums = Album::where('is_active', 1)->get();

        return view('galerija', ['albums' => $albums]);
    }

    public function floors(Request $request, $id){
        $floors = Floor::findOrFail($id);

        return view('tehnicki-prikaz', ['floors' => $floors]);
    }

    public function apartmant(Request $request, $id){
        $apartmant = Apartment::findOrFail($id);
        $floor = Floor::select('id', 'title')->get();
        return view('detail', ['apartmant' => $apartmant, 'floor' => $floor]);
    }

    public function contact(Request $request)
    {
        $request->validate([
            'firstName' => ['required', 'string', 'max:191'],
            'phone' => ['required', 'string'],
            'email' => ['required', 'string', 'max:191'],
            'lastName' => ['required', 'string'],
            'question' => ['required', 'string'],
        ]);   



        return redirect()->back()->with(['status' => 'Vasa poruka je uspijesno poslana!']);
    }
}
