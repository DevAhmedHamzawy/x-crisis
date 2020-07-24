<?php

namespace App\Http\Controllers\Admin;

use App\Project;
use App\Upload\Upload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $projects = Project::all();

            return DataTables::of($projects)->addIndexColumn()
            ->addColumn('action', function($row){
    
                $btn = '<a href="'.route("projects.edit", [$row->id]).'" class="edit btn btn-primary btn-sm">تعديل</a>';
    
                return $btn;
            })
            ->addColumn('actionone', function($row){
    
                $btn = '<a href="'.route("projects.delete", [$row->id]).'" class="delete btn btn-danger btn-sm">حذف</a>';
    
                return $btn;
            })
            ->rawColumns(['action','actionone'])
            ->make(true);

        }

        return view('admin.projects.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.projects.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), ['name' => 'required', 'description' => 'required', 'link' => 'required', 'the_image' => 'mimes:jpeg,jpg,png,gif|required|max:10000']);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->with(['message' => 'من فضلك قم بمراجعة تلك الأخطاء', 'alert' => 'alert-danger']);
        }

        $request->merge(['image' => Upload::uploadImage($request->the_image, 'projects' , $request->name)]);
        Project::create($request->except('_token','the_image'));
        return redirect()->route('projects.index')->with(['message' => 'تم الإضافة بنجاح', 'alert' => 'alert-success']);  
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        return view('admin.projects.edit', ['project' => $project]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {

        $validator = Validator::make($request->all(), ['name' => 'required', 'description' => 'required', 'link' => 'required']);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->with(['message' => 'من فضلك قم بمراجعة تلك الأخطاء', 'alert' => 'alert-danger']);
        }

        if($request->has('the_image')){
            $request->merge(['image' => Upload::uploadImage($request->the_image, 'projects' , $request->name)]);
        }
        $project->update($request->except('the_image'));
        return redirect()->route('projects.index')->with(['message' => 'تم التعديل بنجاح', 'alert' => 'alert-success']);  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('projects.index')->with(['message' => 'تم الحذف بنجاح', 'alert' => 'alert-success']);
    }
}
