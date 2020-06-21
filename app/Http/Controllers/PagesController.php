<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\category;

class PagesController extends Controller
{
    function index(){
        $Category=category::all();
        return view('client.pages.index', compact('Category'));
    }
}
