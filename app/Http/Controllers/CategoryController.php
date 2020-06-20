<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\category;
class CategoryController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listCategorys = category::all();
        //$listLinhVuc = LinhVuc::all();
        return view('admin.pages.category.list-category', compact('listCategorys'));

    }
}
