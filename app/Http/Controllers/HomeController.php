<?php

namespace App\Http\Controllers;

use App\Models\Accessory;
use App\Models\AccessoryItem;
use App\Models\Album;
use App\Models\Apartment;
use App\Models\Color;
use App\Models\ColorItem;
use App\Models\Dimension;
use App\Models\Mail;
use App\Models\Option;
use App\Models\OptionItem;
use App\Models\Product;
use App\Models\ProductPosition;
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
        $product = Product::find($request->id);
        return response()->json(['colors' => view('partials.colors_list', ['colors' => $colors, 'product' => $product])->render()], 200);
    }

    public function showSurfaces(Request $request)
    {
        $surfaces = Surface::whereRaw('JSON_CONTAINS(product_id, ?)', [json_encode($request->id)])->get();
        return response()->json(['surfaces' => view('partials.surfaces_list', ['surfaces' => $surfaces])->render()], 200);
    }

    public function konfigurator(Request $request)
    {


//     <tr>
//       <th scope="row">1</th>
//       <td>Mark</td>
//     </tr>
//   </tbody>
// </table>
        // dd($request->all());
        $sum = [];
        $product = Product::find($request->product);
        $dimension = Dimension::whereRaw('JSON_CONTAINS(product_id, ?)', [json_encode($request->product)])->where('dimension1',$request->surface[1])->where('dimension2', $request->surface[3])->first();

        $html = '<b>Was suchen sie:</b> '.htmlspecialchars($request->input('advisor')).'<br>';
        $html .= '<table class="table table-bordered">
        <thead>
            <tr>
            <th scope="col">Produkte:</th>
            <th scope="col">'.$product->title.'</th>
            <th scope="col">'.$dimension->price.'</th>
            </tr>
        </thead>
        <tbody>';

        $product_position = ProductPosition::find($request->product);
        $html .= '<tr><th scope="row">Wo soll das Produkt stehen</th><td scope="row">'.$product_position->title.'</td><td><input class="form-control" name="product_position" type="number" value="'.$product_position->price.'"></td></tr>';
        $sum[] = $product_position->price;
        foreach ($request->option as $key => $value) {
            $option = Option::find($key);
            $option_item = OptionItem::find($value);
            $html .= '<tr><th scope="row">'.$option->title.'</th><td scope="row">'.$option_item->title.'</td><td><input class="form-control" name="option" type="number" value="'.$option_item->price.'"></td></tr>';
            $sum[] = $option_item->price;
        }
                                                                                                            
        foreach ($request->accessory as $key => $value) {
            $accessory = Accessory::find($key);
            $accessory_item = AccessoryItem::find($value);
            $html .= '<tr><th scope="row">'.$accessory->title.'</th><td scope="row">'.$accessory_item->title.'</td><td><input class="form-control" name="accessory" type="number" value="'.$accessory_item->price.'"></td></tr>';
            $sum[] = $accessory_item->price;

        }

        foreach ($request->color as $key => $value) {
            $color = Color::find($key);
            $color_item = ColorItem::find($value);
            $html .= '<tr><th scope="row">'.$color->title.'</th><td scope="row">'.$color_item->title.'</td><td><input class="form-control" name="color" type="number" value="'.$color_item->price.'"></td></tr>';
            $sum[] = $color_item->price;

        }
        foreach ($request->surface as $key => $value) {
            $surface = Surface::find($key);
            $html .= '<tr><th scope="row">'.$surface->title.'</th><td scope="row" colspan="2">'.$value.'</td></tr>';
        }
        $sum[] = $dimension->price;
        if($request->instalation!='' && $request->instalation != 0){
            $html .= '<tr><th scope="row">Instalation </th><td scope="row" colspan="2"><b><input name="sum" class="form-control" type="number" value="'.$request->instalation.'"></b></td></tr>';
            $sum[] = intval($request->instalation);
        } 
        $html .= '<tr><th scope="row">Zusammenfassung Preis</th><td scope="row" colspan="2"><b><input name="sum" class="form-control" type="number" value="'.array_sum($sum).'"></b></td></tr>';
        $html .= '</tbody></table><br>';
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
