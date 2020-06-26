<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\vendor;
use App\user;
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
    public function create()
    {
        $dataUser = user::all();
        // echo $dataUser;
        return view('admin.pages.shop.add-shop', compact('dataUser'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $getbannerFile = '';
	    if($request->hasFile('bannerFile')){
		//Hàm kiểm tra dữ liệu
		// $this->validate($request, 
		// 	[
		// 		Kiểm tra đúng file đuôi .jpg,.jpeg,.png.gif và dung lượng không quá 2M
		// 		'hinhthe' => 'mimes:jpg,jpeg,png,gif|max:2048',
		// 	],			
		// 	[
		// 		Tùy chỉnh hiển thị thông báo không thõa điều kiện
		// 		'hinhthe.mimes' => 'Chỉ chấp nhận hình thẻ với đuôi .jpg .jpeg .png .gif',
		// 		'hinhthe.max' => 'Hình thẻ giới hạn dung lượng không quá 2M',
		// 	]
		// );
		
		//Lưu hình ảnh vào thư mục public/upload/hinhthe
		$hinhthe = $request->file('hinhthe');
		$gethinhthe = time().'_'.$hinhthe->getClientOriginalName();
		$destinationPath = public_path('upload/hinhthe');
		$hinhthe->move($destinationPath, $gethinhthe);
	}


        $vendor = new vendor;
        $vendor->shop_name = $request->shop_name;
        $vendor->user_id = $request->id_user;
        $vendor->banner = $request->bannerFile->getClientOriginalName();
        $vendor->desc =  $request->desc;
        $vendor->logo = $request->logoFile->getClientOriginalName();
        $vendor->status ="1";
        $vendor->save();
        return redirect()->route('vendor.listVendor');
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
        // $vendor = vendor::find($id);
        // return view('admin.pages.shop.add-shop ', compact('vendor'));
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
