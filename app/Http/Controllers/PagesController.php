<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\category;
use App\sub_category;

class PagesController extends Controller
{
    function index(){
        $listProduces = DB::table('produces')->join('imgs', 'produces.id', '=', 'imgs.produce_id')->get();
        $Category=category::all();
        $SCategorys=sub_category::all();
        return view('client.pages.index', compact('Category','listProduces','SCategorys'));
        
    }

}
