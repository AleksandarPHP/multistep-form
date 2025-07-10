<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Settings;
use App\Helpers\Helper;
use Cache;

class SettingsController extends Controller
{
    private $allowedLangs;

    public function __construct()
    {
        $this->allowedLangs = ['sr', 'en'];
    }
    
    public function edit($id, Request $request)
    {
        $lang = $request->lang ?? 'sr';
        
        return view('cms.podesavanja.form', ['item' => Settings::findOrFail($id), 'editing' => true, 'lang' => $lang]);

    }

    public function update(Request $request, $id)
    {
        $item = Settings::findOrFail($id);    
        $lang = $request->language ?? 'sr';

        $allLangs = implode(",", $this->allowedLangs);

        $request->validate([
            'title' => ['nullable', 'string', 'max:191'],
            'description' => ['nullable', 'string', 'max:500'],
            'keywords' => ['nullable', 'string', 'max:500'],
            'email' => ['nullable', 'string', 'max:191'],

            'phone' => ['nullable', 'string', 'max:191'],
            'phone2' => ['nullable', 'string', 'max:191'],
            'worktime' => ['nullable', 'string', 'max:191'],
            'address' => ['nullable', 'string', 'max:191'],
            'facebook' => ['nullable', 'string', 'max:191'],
            'linkedin' => ['nullable', 'string', 'max:191'],
            'twitter' => ['nullable', 'string', 'max:191'],
            'google' => ['nullable', 'string', 'max:191'],
            'instagram' => ['nullable', 'string', 'max:191'],

            'logoH' => ['nullable',  'image', 'max:5000'],
            'logoF' => ['nullable',  'image', 'max:5000'],
            'favicon' => ['nullable', 'mimes:jpeg,png,svg', 'image', 'max:5000','dimensions:min_width=50,min_height=50'],
            'language' => ['required', 'string', 'in:'.$allLangs],
        ]);

        $item->setTranslation('description', $lang, $request->input('description'));
        $item->setTranslation('keywords', $lang, $request->input('keywords'));

        if($lang=='sr') {
            $logoH = $item->logoH;
            if($request->hasFile('logoH')) $logoH = Helper::saveImage($request->logoH, 'settings', 'logoH', $logoH);

            $logoF = $item->logoF;
            if($request->hasFile('logoF')) $logoF = Helper::saveImage($request->logoF, 'settings', 'logoF', $logoF);

            $favicon = $item->favicon;
            if($request->hasFile('favicon')) $favicon = Helper::saveImage($request->favicon, 'settings', 'favicon', $favicon);

            $item->title = $request->title;
            $item->phone = $request->phone;
            $item->worktime = $request->worktime;
            $item->address = $request->address;
            $item->email = $request->email;
            $item->facebook = $request->facebook;
            $item->twitter = $request->twitter;
            $item->linkedin = $request->linkedin;
            $item->instagram = $request->instagram;

            $item->logoH = $logoH;
            $item->logoF = $logoF;
            $item->favicon = $favicon;
        }

        $item->save();

        Cache::forget('settings');

        session()->flash('success',  __('app.success'));

        return redirect('cms/settings/'.$item->id.'/edit');
    }
}
