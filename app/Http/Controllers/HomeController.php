<?php

namespace App\Http\Controllers;

use App\Models\Accessory;
use App\Models\Album;
use App\Models\Apartment;
use App\Models\Color;
use App\Models\Mail;
use App\Models\Option;
use App\Models\Surface;
use App\Notifications\Konfigurator;
use App\Models\Floor;
use Exception;
use Illuminate\Http\Request;
use App\Models\Gallery;
use Log;
use Notification;

class HomeController extends Controller
{
    public function showOptions(Request $request)
    {
        $options = Option::whereRaw('JSON_CONTAINS(product_id, ?)', [json_encode($request->id)])->get();
        return response()->json(['options' => view('partials.items_list', ['options' => $options])->render()], 200);
    }

    public function showAccessories(Request $request)
    {
        $accessories = Accessory::whereRaw('JSON_CONTAINS(product_id, ?)', [json_encode($request->id)])->get();
        return response()->json(['accessories' => view('partials.accessories_list', ['accessories' => $accessories])->render()], 200);
    }

    public function showColors(Request $request)
    {
        $colors = Color::whereRaw('JSON_CONTAINS(product_id, ?)', [json_encode($request->id)])->get();
        return response()->json(['colors' => view('partials.colors_list', ['colors' => $colors])->render()], 200);
    }

    public function showSurfaces(Request $request)
    {
        $surfaces = Surface::whereRaw('JSON_CONTAINS(product_id, ?)', [json_encode($request->id)])->get();
        \Illuminate\Support\Facades\Log::info($surfaces);
        return response()->json(['surfaces' => view('partials.surfaces_list', ['surfaces' => $surfaces])->render()], 200);
    }

    public function konfigurator(Request $request)
    {
        $html = '<b>Was suchen sie:</b> '.htmlspecialchars($request->input('advisor')).'<br>';

        if($request->input('product')!='') $html .= '<b>Produkte :</b> '.htmlspecialchars($request->input('product')).'<br>';
        if($request->input('product_position')!='') $html .= '<b>Wo soll das Produkt stehen:</b> '.htmlspecialchars($request->input('product_position')).'<br>';

        if($request->input('message')!='') $html .= '<b>Möchten Sie uns noch etwas mitteilen:</b> '.htmlspecialchars($request->input('message')).'<br>';
        if($request->input('sex')!='') $html .= '<b>Geschlecht:</b> '.htmlspecialchars($request->input('sex')).'<br>';
        if($request->input('firstname')!='') $html .= '<b>Vorname:</b> '.htmlspecialchars($request->input('firstname')).'<br>';
        if($request->input('lastname')!='') $html .= '<b>Nachname:</b> '.htmlspecialchars($request->input('lastname')).'<br>';
        if($request->input('phone')!='') $html .= '<b>Telefon:</b> '.htmlspecialchars($request->input('phone')).'<br>';
        if($request->input('email')!='') $html .= '<b>Email:</b> '.htmlspecialchars($request->input('email')).'<br>';
        if($request->input('street')!='') $html .= '<b>Straße:</b> '.htmlspecialchars($request->input('street')).'<br>';
        if($request->input('housenumber')!='') $html .= '<b>Hausnummer:</b> '.htmlspecialchars($request->input('housenumber')).'<br>';
        if($request->input('plz')!='') $html .= '<b>PLZ:</b> '.htmlspecialchars($request->input('plz')).'<br>';
        if($request->input('city')!='') $html .= '<b>Stadt:</b> '.htmlspecialchars($request->input('city')).'<br>';

        $mail = Mail::create([
            'name' => $request->firstname.' '.$request->lastname,
            'email' => $request->email,
            'content' => $html,
            'is_sent' => 0,
        ]);
        // try {
        //     Notification::route('mail',route: 'acocoaj123@gmail.com')->notify(new Konfigurator($html, $request->input('email'), $request->input('firstname')));
        //     Notification::route('mail', 'office@sonnenschutzmacher.at')->notify(new Konfigurator($html, $request->input('email'), $request->input('firstname')));
        // } catch (Exception $e) {}

        return redirect('/')->with(['status' => 'Ihre Nachricht wurde erfolgreich versendet!']);
    }
}
