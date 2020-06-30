<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listUsers = user::all();
        //$listLinhVuc = LinhVuc::all();
        return view('admin.pages.user.list-user', compact('listUsers'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.user.add-user');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $addUser = new user;
         $addUser->user_name = $request->user_name;
         $addUser->password = $request->password;
         $addUser->role = $request->role;
         $addUser->first_name = $request->first_name;
         $addUser->last_name = $request->last_name;
         $addUser->email = $request->email;
         $addUser->phone = $request->phone;
         $addUser->address = $request->address;
         $addUser->num_order = "null";
         $addUser->gender = $request->gender;
         $addUser->birthday = $request->birthday;
         $addUser->status = $request->status;
       
         $addUser->save();
         return redirect()->route('user.listUser')->with(['flash_message' => 'Thêm User thành công ']);
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
         $addUser = user::find($id);
         return view('admin.pages.user.add-user', compact('addUser'));
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
         $addUser = user::find($id);
         $addUser->user_name = $request->user_name;
         $addUser->password = $request->password;
         $addUser->role = $request->role;
         $addUser->first_name = $request->first_name;
         $addUser->last_name = $request->last_name;
         $addUser->email = $request->email;
         $addUser->phone = $request->phone;
         $addUser->address = $request->address;
         $addUser->num_order = "null";
         $addUser->gender = $request->gender;
         $addUser->birthday = $request->birthday;
         $addUser->status = $request->status;
         $addUser->save();
         return redirect()->route('user.listUser')->with(['flash_message' => 'Cập nhật User thành công ']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $addUser = user::find($id);
         $addUser->delete();
         return redirect()->route('user.listUser');
    }
}
