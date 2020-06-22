<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\produce;
use App\img;
class ProduceController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listProduce = produce::all();
        return view('admin.pages.product.list-product', compact('listProduce'));
    }
    public function select()
    {
        $listProduces = produce::all();
        // $listProduces = DB::table('produces')
        // ->whereExists(function ($query) {
        //     $query->select(DB::raw(1))
        //           ->from('imgs')
        //           ->whereRaw('produces.id = imgs.produce_id');
        // })
        // ->get();
        return view('client.pages.list-product', compact('listProduces'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return view('linh-vuc.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $linhVuc = new LinhVuc;
        // $linhVuc->ten_linh_vuc = $request->ten_linh_vuc;
        // $linhVuc->save();
        // return redirect()->route('linh-vuc.danh-sach');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $linhVuc = LinhVuc::find($id);
        // return view('linh-vuc.form', compact('linhVuc'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $linhVuc = LinhVuc::find($id);
        // $linhVuc->ten_linh_vuc = $request->ten_linh_vuc;
        // $linhVuc->save();
        // return redirect()->route('linh-vuc.danh-sach');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $linhVuc = LinhVuc::find($id);
        // $linhVuc->delete();
        // return redirect()->route('linh-vuc.danh-sach');
    }
}
