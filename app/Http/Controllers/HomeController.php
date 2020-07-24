<?php

namespace App\Http\Controllers;

use App\Business;
use App\Contact;
use App\Page;
use App\Partner;
use App\Project;
use App\Service;
use App\Slider;
use App\SeoLinks\SeoLinksIndex;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
   
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function welcome()
    {
        return view('welcome', ['sliders' => Slider::all(), 'services' => Service::all(), 'servicestwo' => DB::table('services_two')->get(), 'partners' => Partner::all(), 'projects' => Project::all(), 'business' => Business::findOrFail(1), 'footercolone' => Page::wherePlace('col1')->get(), 'footercoltwo' => Page::wherePlace('col2')->get() ]);
    }

    public function sendContact(Request $request)
    {
        $validator = Validator::make($request->all(), ['name' => 'required', 'email' => 'required', 'subject' => 'required', 'message' => 'required']);
        if($validator->fails()){
            return response()->json(['success' => false, 'errors' => $validator->getMessageBag()->toArray()], 400);
        }

        $request->merge(['body' => $request->message]);
        Contact::create($request->except('message'));
        return 'ok';
    }

    public function pageShow($id)
    {
        SeoLinksIndex::getLinks($page->title, str_limit($page->body, 50), url()->current(), env('APP_URL'), $settings->twitter, $settings->logo1);
        return view('page', ['page' => Page::findOrFail($id)]);
    }
}
