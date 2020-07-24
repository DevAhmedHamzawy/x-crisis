<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class ServiceTwoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $servicestwo = DB::table('services_two')->get();

            return DataTables::of($servicestwo)->addIndexColumn()
            ->addColumn('action', function($row){
    
                $btn = '<a href="'.route("servicestwo.edit", [$row->id]).'" class="edit btn btn-warning btn-sm">تعديل</a>';
    
                return $btn;
            })
            ->addColumn('actionone', function($row){
    
                $btn = '<a href="'.route("servicestwo.delete", [$row->id]).'" class="delete btn btn-danger btn-sm">حذف</a>';
    
                return $btn;
            })
            ->rawColumns(['action','actionone'])
            ->make(true);

        }

        return view('admin.services_two.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.services_two.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), ['title' => 'required', 'link' => 'required']);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->with(['message' => 'من فضلك قم بمراجعة تلك الأخطاء', 'alert' => 'alert-danger']);
        }

        DB::table('services_two')->insert(['title' => $request->title, 'link' => $request->link]);
        return redirect()->route('servicestwo.index')->with(['message' => 'تم الإضافة بنجاح', 'alert' => 'alert-success']);  
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $service_two = DB::table('services_two')->where('id', $id)->first();
        return view('admin.services_two.edit', ['services_two' => $service_two]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), ['title' => 'required', 'link' => 'required']);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->with(['message' => 'من فضلك قم بمراجعة تلك الأخطاء', 'alert' => 'alert-danger']);
        }
        
        DB::table('services_two')->where('id', $id)->update(['title' => $request->title, 'link' => $request->link]);   
        return redirect()->route('servicestwo.index')->with(['message' => 'تم التعديل بنجاح', 'alert' => 'alert-success']);  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('services_two')->where('id',$id)->delete();
        return redirect()->route('servicestwo.index')->with(['message' => 'تم الحذف بنجاح', 'alert' => 'alert-success']);  
    }
}
