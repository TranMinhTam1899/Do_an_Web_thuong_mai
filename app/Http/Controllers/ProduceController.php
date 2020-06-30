<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\category;
use App\img;
use App\user;
use App\produce;
class ProduceController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listProduce = DB::table('produces')->join('imgs', 'produces.id', '=', 'imgs.produce_id')->get();
        return view('admin.pages.product.list-product', compact('listProduce'));
    }
    public function select()
    {
        // $listProduces = produce::all();
        $listProduces = DB::table('produces')->join('imgs', 'produces.id', '=', 'imgs.produce_id')->get();
        // echo "$listProduces";
        return view('client.pages.list-product', compact('listProduces'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        // $listProducts= produce::all();
        $listcategory=category::all();
        $listUser =user::all();
        //$listImg = img::all();
        return view('admin.pages.product.add-product', compact('listcategory','listUser'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

       
        $listProduce = new produce ;
        $listImg = new img ; 
        $this->validate($request, 
			[
				//Kiểm tra đúng file đuôi .jpg,.jpeg,.png.gif và dung lượng không quá 2M
				'imgFile' => 'mimes:jpg,jpeg,png,gif|max:2048',
			],			
			[
				//Tùy chỉnh hiển thị thông báo không thõa điều kiện
				'imgFile.mimes' => 'Chỉ chấp nhận hình thẻ với đuôi .jpg .jpeg .png .gif',
				'imgFile.max' => 'Hình thẻ giới hạn dung lượng không quá 2M',
			]
		);
        if ($request->file('imgFile')->isValid()) {

           
        
        $imageName = time().'.'.$request->file('imgFile')->getClientOriginalExtension();

        $request->imgFile->move(public_path('upload'), $imageName);

        $file = $request->file('imgFile')->move(public_path('upload'),'firtupload.jpg' );

       //if($request->hasFile('imgFile'))
        //{
            //lưu file
            //$file
        $listImg ->url = 'public/upload/' . $imageName;
       // }
        //else
        //{
        //    echo "Chưa có file";
        //}


             
        $listProduce->name = $request->name;
        $listProduce->unit = $request->unit;
        $listProduce->SKU = $request->SKU;
        $listProduce->desc = $request->desc;
        $listProduce->short_desc = $request->shortdesc;
        $listProduce->category_id = $request->category_id;
        $listProduce->author_id = $request->author_id;
        $listProduce->price = $request->price;
        $listProduce->discout_price = $request->discout_price;
        $listProduce->status = $request->status;
        $listProduce->top ="0";
        $listProduce->save();
        return redirect()->route('product.listProduct');
        }
        else 
        {
            return redirect()->route('product.listProduct');
        }
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
