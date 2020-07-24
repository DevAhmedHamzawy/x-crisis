<?php

namespace App\Http\Controllers\Admin;

use App\Setting;
use App\Upload\Upload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SettingController extends Controller
{

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Setting  $settings
     * @return \Illuminate\Http\Response
     */
    public function edit(Setting $setting)
    {
        return view('admin.settings.edit', ['settings' => $setting]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Setting  $settings
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Setting $setting)
    {
        //dd($request->all());
        $validator = Validator::make($request->all(), ['name' => 'required', 'description' => 'required', 'telephone' => 'required', 'email' => 'required']);


        if($request->hasFile('icon_header_image'))
        {

            $request->merge([
                'icon_header' => Upload::uploadImage($request->icon_header_image, 'settings' , 'icon_header'),
            ]);

        }

        if($request->hasFile('icon_header_admin_image'))
        {

            $request->merge([
                'icon_header_admin' => Upload::uploadImage($request->icon_header_admin_image, 'settings' , 'icon_header_admin'),
            ]);

        }

        if($request->hasFile('icon_tab_image'))
        {

            $request->merge([
                'icon_tab' => Upload::uploadImage($request->icon_tab_image, 'settings' , 'icon_tab'),
            ]);

        }

        if($request->hasFile('icon_service_two_image'))
        {

            $request->merge([
                'service_two' => Upload::uploadImage($request->icon_service_two_image, 'service_two' , 'service_two_image'),
            ]);

        }

        if($request->hasFile('icon_business_image'))
        {

            $request->merge([
                'business' => Upload::uploadImage($request->icon_business_image, 'business' , 'business'),
            ]);

        }

        



        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->with(['message' => 'من فضلك قم بمراجعة تلك الأخطاء', 'alert' => 'alert-danger']);
        }
        $setting->update($request->except(['icon_header_image','icon_header_admin_image','icon_tab_image','icon_service_two_image','icon_business_image']));
        return redirect()->route('settings.edit',$setting->id)->with(['message' => 'تم التعديل بنجاح', 'alert' => 'alert-success']);
    }
}
