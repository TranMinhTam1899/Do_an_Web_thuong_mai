<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\customer;
class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listCustomer = customer::all();
        // echo $listCustomer;
        return view('admin.pages.customer.list-customer', compact('listCustomer'));

    }
}
