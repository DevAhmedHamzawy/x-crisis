<?php

namespace App\Http\Controllers\Admin;

use App\Business;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BusinessController extends Controller
{

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Business  $business
     * @return \Illuminate\Http\Response
     */
    public function edit(Business $business)
    {
        return view('admin.business.edit', ['business' => $business]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Business  $business
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Business $business)
    {

        $validator = Validator::make($request->all(), ['title1' => 'required', 'title2' => 'required', 'description' => 'required']);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->with(['message' => 'من فضلك قم بمراجعة تلك الأخطاء', 'alert' => 'alert-danger']);
        }

        $request->merge(['image' => 'fff']);
        $business->update($request->all());
        return redirect()->route('business.edit',$business->id)->with(['message' => 'تم التعديل بنجاح', 'alert' => 'alert-success']);
    }
}
