<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\img;


class ImgController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listimg = img::all();
  
    }
    
}
