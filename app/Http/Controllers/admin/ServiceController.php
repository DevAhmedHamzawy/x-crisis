<?php

namespace App\Http\Controllers\Admin;

use App\Service;
use App\Upload\Upload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if ($request->ajax()) {

            $services = Service::all();

            return DataTables::of($services)->addIndexColumn()
            ->addColumn('action', function($row){
    
                $btn = '<a href="'.route("services.edit", [$row->id]).'" class="edit btn btn-warning btn-sm">تعديل</a>';
    
                return $btn;
            })
            ->addColumn('actionone', function($row){
    
                $btn = '<a href="'.route("services.delete", [$row->id]).'" class="delete btn btn-danger btn-sm">حذف</a>';
    
                return $btn;
            })
            ->rawColumns(['action','actionone'])
            ->make(true);

        }

        return view('admin.services.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.services.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), ['icon' => 'required', 'title' => 'required', 'title1' => 'required', 'description' => 'required']);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->with(['message' => 'من فضلك قم بمراجعة تلك الأخطاء', 'alert' => 'alert-danger']);
        }

        Service::create($request->except('_token'));
        return redirect()->route('services.index')->with(['message' => 'تم الإضافة بنجاح', 'alert' => 'alert-success']);  
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        return view('admin.services.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {

        $validator = Validator::make($request->all(), ['icon' => 'required', 'title' => 'required', 'title1' => 'required', 'description' => 'required']);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->with(['message' => 'من فضلك قم بمراجعة تلك الأخطاء', 'alert' => 'alert-danger']);
        }

        $service->update($request->all());
        return redirect()->route('services.index')->with(['message' => 'تم التعديل بنجاح', 'alert' => 'alert-success']);  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        $service->delete();
        return redirect()->route('services.index')->with(['message' => 'تم الحذف بنجاح', 'alert' => 'alert-success']);  
    }
}
