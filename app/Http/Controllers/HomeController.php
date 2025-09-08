<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Apartment;
use App\Notifications\Konfigurator;
use App\Models\Floor;
use Exception;
use Illuminate\Http\Request;
use App\Models\Gallery;
use Notification;

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

    public function konfigurator(Request $request)
    {
        $html = '<b>Was suchen sie:</b> '.htmlspecialchars($request->input('advisor')).'<br>';

        if($request->input('product')!='') $html .= '<b>Produkte :</b> '.htmlspecialchars($request->input('product')).'<br>';
        if($request->input('product_position')!='') $html .= '<b>Wo soll das Produkt stehen:</b> '.htmlspecialchars($request->input('product_position')).'<br>';
        if($request->input('design')!='') $html .= '<b>Welche Kassetten-Markisen Ausführung wünschen Sie sich:</b> '.htmlspecialchars($request->input('design')).'<br>';
        if($request->input('articulated_arm_awning')!='') $html .= '<b>Welche Gelenkarm-Markisen Ausführung wünschen Sie sich:</b> '.htmlspecialchars($request->input('articulated_arm_awning')).'<br>';
        if($request->input('important_to_you')!='') $html .= '<b>Was ist Ihnen wichtig:</b> '.htmlspecialchars($request->input('important_to_you')).'<br>';
        if($request->input('pergola_awning_design')!='') $html .= '<b>Welche Pergola-Markisen Ausführung wünschen Sie sic:</b> '.htmlspecialchars($request->input('pergola_awning_design')).'<br>';
        if($request->input('indoor_or_outdoor')!='') $html .= '<b>Wünschen Sie sich innen- oder außenliegende Wintergarten-Markisen:</b> '.htmlspecialchars($request->input('indoor_or_outdoor')).'<br>';
        if($request->input('strong_winds')!='') $html .= '<b>Ist der voraussichtliche Einbauort starkem Wind ausgesetzt:</b> '.htmlspecialchars($request->input('strong_winds')).'<br>';
        if($request->input('side_awning_design')!='') $html .= '<b>Welchen Seitenmarkisen Verlauf wünschen Sie sich:</b> '.htmlspecialchars($request->input('side_awning_design')).'<br>';
        if($request->input('parasol_shape')!='') $html .= '<b>Welche Sonnenschirm Form wünschen Sie sich:</b> '.htmlspecialchars($request->input('parasol_shape')).'<br>';
        if($request->input('mast_design')!='') $html .= '<b>Welche Mast-Ausführung wünschen Sie sich:</b> '.htmlspecialchars($request->input('mast_design')).'<br>';
        if($request->input('type_of_connection')!='') $html .= '<b>Welche Anbindungsarten wünschen Sie sich:</b> '.htmlspecialchars($request->input('type_of_connection')).'<br>';
        if($request->input('extension_of_the_sun_sail')!='') $html .= '<b>Welchen Auszug des Sonnensegels wünschen Sie:</b> '.htmlspecialchars($request->input('extension_of_the_sun_sail')).'<br>';
        if($request->input('height_adjustment')!='') $html .= '<b>Wünschen Sie sich eine Höhenverstellung:</b> '.htmlspecialchars($request->input('height_adjustment')).'<br>';
        if($request->input('type_of_roofing')!='') $html .= '<b>Welche Überdachungsausführung wünschen Sie sich:</b> '.htmlspecialchars($request->input('type_of_roofing')).'<br>';
        if($request->input('kind_instalation')!='') $html .= '<b>Welche Montageart wünschen Sie sich:</b> '.htmlspecialchars($request->input('kind_instalation')).'<br>';
        if($request->input('valance_blind')!='') $html .= '<b>Wünschen Sie sich ein Volant-Rollo:</b> '.htmlspecialchars($request->input('valance_blind')).'<br>';
        if($request->input('equipment')!='') $html .= '<b>Welches Zubehör benötigen Sie?:</b> '.htmlspecialchars($request->input('equipment')).'<br>';
        if($request->input('control')!='') $html .= '<b>Wünschen Sie sich eine Steuerung:</b> '.htmlspecialchars($request->input('control')).'<br>';
        if($request->input('width')!='') $html .= '<b>Bitte geben Sie die Breite an:</b> '.htmlspecialchars($request->input('width')).'<br>';
        if($request->input('length')!='') $html .= '<b>Bitte geben Sie die Länge an:</b> '.htmlspecialchars($request->input('length')).'<br>';
        if($request->input('design_color')!='') $html .= '<b>Welche Stofffarbe wünschen Sie sich:</b> '.htmlspecialchars($request->input('design_color')).'<br>';
        if($request->input('fabric_color')!='') $html .= '<b>Welches Muster wünschen Sie sich:</b> '.htmlspecialchars($request->input('fabric_color')).'<br>';
        if($request->input('frame_color')!='') $html .= '<b>Welche Gestellfarbe wünschen Sie sich:</b> '.htmlspecialchars($request->input('frame_color')).'<br>';
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

        try {
            Notification::route('mail',route: 'acocoaj123@gmail.com')->notify(new Konfigurator($html, $request->input('email'), $request->input('firstname')));
            // Notification::route('mail',route: 'office@sonnenschutzmacher.at')->notify(new Konfigurator($html, $request->input('email'), $request->input('firstname')));
        } catch (Exception $e) {}

        return redirect('/')->with(['status' => 'Ihre Nachricht wurde erfolgreich versendet!']);
    }
}
