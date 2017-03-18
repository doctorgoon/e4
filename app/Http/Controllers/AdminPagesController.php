<?php

namespace App\Http\Controllers;

use App\Pages;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Session;

class AdminPagesController extends Controller
{

    public function show($route)
    {
        $page = Pages::where('website_id', Session::get('website_id'))->where('route', $route)->get()->first();

        if ( ! is_null($page)) {
            $file = file_get_contents(storage_path('/pages/' . $page->filename));

            return view('pages.show', compact('page', 'file'));
        } else {
            return abort(404);
        }
    }


    public function welcome()
    {
        return view('pages.welcome');
    }

}
