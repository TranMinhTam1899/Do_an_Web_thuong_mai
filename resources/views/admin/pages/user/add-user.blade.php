@extends('admin.layouts.master')

@section('title')
thêm mới user
@endsection

@section('main_content')
<div class="row">
    <div class="col-md-12" style="margin: 0 auto;">
        <div class="x_panel">
            <div class="x_title">@if(isset($addUser))Cập nhật @else Thêm @endif User </h4><br>
            @if(isset($addUser))
            <form action="{{route('user.xu-ly-cap-nhat',['id'=>$addUser->id])}}" method="POST" >
            @else
            <form action="{{route('user.xu-ly-them-moi')}}" method="POST" >

            </div>
            @endif
                @csrf
            <div class="x_content">
                <form class="form-horizontal form-label-left">
                    <div class="row">
                        <div class="form-group row col-md-6 col-sm-6">
                            <label class="control-label col-md-2 col-sm-2 ">Username</label>
                            <div class="col-md-10 col-sm-10 ">
                                <input type="text" name="user_name" class="form-control" placeholder="Username....." @if(isset($addUser)) value ="{{ $addUser->user_name }}" @endif>
                            </div>
                        </div>
                        <div class="form-group row col-md-6 col-sm-6">
                            <label class="control-label col-md-2 col-sm-2 ">Password</label>
                            <div class="col-md-10 col-sm-10 ">
                                <input type="password" name="password"class="form-control" placeholder="Password....." @if(isset($addUser)) value ="{{ $addUser->password }}" @endif>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group row col-md-6 col-sm-6">
                            <label class="control-label col-md-2 col-sm-2 ">First name</label>
                            <div class="col-md-10 col-sm-10 ">
                                <input type="text" name="first_name" class="form-control" placeholder="First name....." @if(isset($addUser)) value ="{{ $addUser->first_name }}" @endif>
                            </div>
                        </div>
                        <div class="form-group row col-md-6 col-sm-6">
                            <label class="control-label col-md-2 col-sm-2 ">Last name</label>
                            <div class="col-md-10 col-sm-10 ">
                                <input type="text" name="last_name" class="form-control" placeholder="Last name....." @if(isset($addUser)) value ="{{ $addUser->last_name }}" @endif>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group row col-md-6 col-sm-6 ">
                            <label class="control-label col-md-2 col-sm-2 ">Birthday</label>
                            <div class="col-md-10 col-sm-10 ">
                                <input type="date" name="birthday" class="form-control" @if(isset($addUser)) value ="{{ $addUser->birthday }}" @endif>
                            </div>
                        </div>
                        <div class="form-group row col-md-6 col-sm-6 ">
                            <label class="control-label col-md-2 col-sm-2 ">Images</label>
                            <div class="col-md-10 col-sm-10 ">
                                <input type="file" >
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="form-group row col-md-6 col-sm-6 ">
                            <label class="control-label col-md-2 col-sm-2 ">Email</label>
                            <div class="col-md-10 col-sm-10 ">
                                <input type="email" name="email" class="form-control" placeholder="Email....." @if(isset($addUser)) value ="{{ $addUser->email }}" @endif>
                            </div>
                        </div>
                        <div class="form-group row col-md-6 col-sm-6 ">
                            <label class="control-label col-md-2 col-sm-2 ">Phone</label>
                            <div class="col-md-10 col-sm-10 ">
                                <input type="phone" name="phone" class="form-control" placeholder="Phone....." @if(isset($addUser)) value ="{{ $addUser->phone }}" @endif>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group row col-md-6 col-sm-6 ">
                            <label class="control-label col-md-2 col-sm-2 ">Address</label>
                            <div class="col-md-10 col-sm-10 ">
                                <textarea  name="address" cols="10" rows="5" class="form-control"
                                placeholder="Address....." @if(isset($addUser)) value ="{{ $addUser->address }}" @endif></textarea>
                            </div>
                        </div>

                        <div class="form-group row col-md-6 col-sm-6">
                            <label class="control-label col-md-2 col-sm-2 ">Gender</label>
                            <div class="col-md-10 col-sm-10 " >
                                <select class="select2_single form-control" name="gender" tabindex="-1" @if(isset($addUser)) value ="{{ $addUser->gender }}" @endif>
                                    <option value="Male">Male</option>
                                    <option value="Female">FeMale</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                    <div class="form-group row col-md-6 col-sm-6">
                            <label class="control-label col-md-2 col-sm-2 ">Role</label>
                            <div class="col-md-10 col-sm-10"  >
                                <select class="select2_single form-control" name="role" tabindex="-1" @if(isset($addUser)) value ="{{ $addUser->role }}" @endif>
                                    <option value="1">Admin</option>
                                    <option value="0">Staff</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row col-md-6 col-sm-6">
                            <label class="control-label col-md-2 col-sm-2 ">Status</label>
                            <div class="col-md-10 col-sm-10 " >
                                <select class="select2_single form-control" name="status" tabindex="-1" @if(isset($addUser)) value ="{{ $addUser->status }}" @endif>    
                                    <option value="0">Action</option>
                                    <option value="1">UnAction</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-12 col-sm-12 text-center">
<<<<<<< HEAD
                            <button type="submit" class="btn btn_submit">Add user</button>
=======
                            <button type="submit" class="btn btn-success">
                            @if(isset($addUser))Cập nhật @else Thêm @endif
                            </button>
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection