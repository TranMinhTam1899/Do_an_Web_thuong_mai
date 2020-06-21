<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\vendor;
class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listVendors = vendor::all();
        return view('admin.pages.shop.list-shop', compact('listVendors'));

    }
}
