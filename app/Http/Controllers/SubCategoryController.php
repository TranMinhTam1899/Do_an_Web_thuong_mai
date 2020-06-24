<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\sub_category;
class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $SCategorys = sub_category::all();
        
        // return view('client.pages.index', compact('SCategory'));

    }
}
