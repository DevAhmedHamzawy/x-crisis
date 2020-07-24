<?php

namespace App\Http\Controllers\Admin;

use App\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $pages = Page::all();

            return DataTables::of($pages)->addIndexColumn()
            ->addColumn('action', function($row){
    
                $btn = '<a href="'.route("pages.edit", [$row->id]).'" class="edit btn btn-primary btn-sm">تعديل</a>';
    
                return $btn;
            })
            ->addColumn('actionone', function($row){
    
                $btn = '<a href="'.route("pages.delete", [$row->id]).'" class="delete btn btn-danger btn-sm">حذف</a>';
    
                return $btn;
            })
            ->rawColumns(['action','actionone'])
            ->make(true);

        }

        return view('admin.pages.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Page $page)
    {   
        return view('admin.pages.create', ['mainPage' => $page]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), ['title' => 'required', 'body' => 'required']);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->with(['message' => 'من فضلك قم بمراجعة تلك الأخطاء', 'alert' => 'alert-danger']);
        }
        Page::create($request->except('_token'));
        return redirect()->route('pages.index')->with(['message' => 'تم الإضافة بنجاح', 'alert' => 'alert-success']);  
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page)
    {
        return view('admin.pages.show', ['page' => $page, 'childPages' => Page::whereParentId($page->id)->get()]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {   
        return view('admin.pages.edit', ['page' => $page]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request ,Page $page, $id=null)
    {
        $validator = Validator::make($request->all(), ['title' => 'required', 'body' => 'required']);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->with(['message' => 'من فضلك قم بمراجعة تلك الأخطاء', 'alert' => 'alert-danger']);
        }
        $page->update($request->only('title','body'));
        return redirect()->route('pages.index')->with(['message' => 'تم التعديل بنجاح', 'alert' => 'alert-success']);  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        $page->delete();
        return redirect()->route('pages.index')->with(['message' => 'تم الحذف بنجاح', 'alert' => 'alert-success']);  
    }
}
