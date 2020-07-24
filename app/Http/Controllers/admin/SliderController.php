<?php

namespace App\Http\Controllers\Admin;

use App\Slider;
use App\Upload\Upload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if ($request->ajax()) {

            $sliders = Slider::all();

            return DataTables::of($sliders)->addIndexColumn()
            ->addColumn('action', function($row){
    
                $btn = '<a href="'.route("sliders.edit", [$row->id]).'" class="edit btn btn-warning btn-sm">تعديل</a>';
    
                return $btn;
            })
            ->addColumn('actionone', function($row){
    
                $btn = '<a href="'.route("sliders.delete", [$row->id]).'" class="delete btn btn-danger btn-sm">حذف</a>';
    
                return $btn;
            })
            ->rawColumns(['action','actionone'])
            ->make(true);

        }

        return view('admin.slider.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), ['title' => 'required', 'description' => 'required', 'button_name' => 'required' , 'link' => 'required', 'the_image' => 'mimes:jpeg,jpg,png,gif|required|max:10000']);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->with(['message' => 'من فضلك قم بمراجعة تلك الأخطاء', 'alert' => 'alert-danger']);
        }

        $request->merge(['image' => Upload::uploadImage($request->the_image, 'sliders' , $request->title)]);
        Slider::create($request->except('_token','the_image'));
        return redirect()->route('sliders.index')->with(['message' => 'تم الإضافة بنجاح', 'alert' => 'alert-success']);    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit(Slider $slider)
    {
        return view('admin.slider.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slider $slider)
    {

        $validator = Validator::make($request->all(), ['title' => 'required', 'description' => 'required', 'button_name' => 'required' , 'link' => 'required']);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->with(['message' => 'من فضلك قم بمراجعة تلك الأخطاء', 'alert' => 'alert-danger']);
        }

        if($request->has('the_image')){
            $request->merge(['image' => Upload::uploadImage($request->the_image, 'sliders' , $request->title)]);
        }
        $slider->update($request->except('the_image'));
        return redirect()->route('sliders.index')->with(['message' => 'تم التعديل بنجاح', 'alert' => 'alert-success']);    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider)
    {
        $slider->delete();
        return redirect()->route('sliders.index')->with(['message' => 'تم الحذف بنجاح', 'alert' => 'alert-success']);
    }
}
