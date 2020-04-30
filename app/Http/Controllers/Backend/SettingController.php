<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CMS\SettingUpdateRequest;
use App\Rules\ValidVersionInput;
use App\Setting;
use Illuminate\Support\Facades\Validator;

class SettingController extends Controller
{
    public function index()
    {
        $app_settings = Setting::where("title", "app_settings")->first()->text;
        $app_settings = json_decode($app_settings, true);
        return view('backend.pages.settings.index', ["app_settings" => $app_settings]);
    }

    public function update(SettingUpdateRequest $request)
    {
        $validator = Validator::make($request->all(), [
            "ios_new_version" => [new ValidVersionInput()],
            "android_new_version" => [new ValidVersionInput()],
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $request_app_settings = [
            "ios" => [
                "new_version" => $request->input("ios_new_version"),
                "update_required" => intval($request->input("ios_update_required"))
            ],
            "android" => [
                "new_version" => $request->input("android_new_version"),
                "update_required" => intval($request->input("android_update_required"))
            ],
        ];

        $app_settings = Setting::where("title", "app_settings")->first();
        $app_settings->text = json_encode($request_app_settings);
        $app_settings->save();

        return redirect()->route('backend.settings.index')->with(session()->flash('success', 'Setting Updated!'));
    }

}
