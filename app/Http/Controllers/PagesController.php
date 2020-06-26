<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\category;
use App\sub_category;
use App\produce;
use App\img;

class PagesController extends Controller
{
    function index(){
        $listProduces = DB::table('produces')->join('imgs', 'produces.id', '=', 'imgs.produce_id')->get();
        $Category=category::all();
        $SCategorys=sub_category::all();
        $prouctTop=DB::table('produces')->join('imgs', 'produces.id', '=', 'imgs.produce_id')->where('top','>=','21')->get();
        // echo  $prouctTop;
        return view('client.pages.index', compact('Category','listProduces','SCategorys','prouctTop'));       
    }
}
