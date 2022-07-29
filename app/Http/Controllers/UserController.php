<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use App\Models\AccountModel;
use App\Models\OrderModel;
// use Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'title' => 'Tài khoản',
            'action'=> 'Người dùng'
        ];
        $thanhvien = accountModel::orderBy('id','asc')->whereIn('role',[1,2])->get();
        return view('admin.user.index', compact('data','thanhvien'));
    }
    public function list(){
        $data = [
            'title' => 'Danh sách tài khoản',
            'action'=> 'Người dùng'
        ];
        $thanhvien = AccountModel::orderBy('id','asc')->get();
        return view('admin.user.list', compact('data','thanhvien'));
    }
    public function add_user(){
        $data = [
            'title' => 'Thêm tài khoản',
            'action'=> ''
        ];
        return view('admin.user.add_user', compact('data'));
    }


    public function doimatkhauadmin(Request $request){
        $id = $request->id;
        $data = $request->all();
        $passold = $data['matkhaucu'];
        if(Hash::check($passold, Auth::user()->password)){
            if($data['matkhaumoi'] == $data['xacnhanmatkhau']){
                $updated = accountModel::find($id);
                $updated->password = Hash::make($data['matkhaumoi']);
                if($updated->save()){
                    echo 'Đổi mật khẩu thành công!';
                }
            }
        }
    }
    public function doithongtinadmin(Request $request){
        $id = $request->id;
        $data = $request->all();
        $updated = accountModel::find($id);
        if($file = $request->file('avatar')){
            $ext= $request->avatar->getClientOriginalName();
            $data['avatar'] = time().'-'.'avatar.'.$ext;
            $file->move('uploads', $data['avatar']);
            $updated->m_avatar = $data['avatar'];
        }
        $updated->email = $data['email'];
        $updated->phone = $data['phone'];
        $updated->m_address = $data['address'];
        if($updated->save()){
            echo 'luuthongtinthanhcong';
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        $updated = accountModel::find($id);
        if($file = $request->file('avatar')){
            $ext= $request->avatar->getClientOriginalName();
            $file_name = time().'-'.'avatar.'.$ext;
            $file->move('uploads/avatar', $file_name);
            $updated->m_avatar = $file_name;
        }
        $updated->email = $request->email;
        $updated->phone = $request->phone;
        $updated->m_address = $request->m_address;
        if($updated->save()){
            return redirect()->back()->with('alert_success', 'Cập nhật thông tin thành công.');}
    }

    // Xóa tài khoản
    public function delete_user($id)
    {
        $id_user = $id;
        $result = User::where('id','=',$id_user)->delete();
        if($result) {
            $message = 'Đã Xóa Thành Công người dùng!';
        }
        return redirect()->back()->with('alert_success','Đã xóa người dùng thành công!');


    }

    // Cập nhật profile
    public function capnhat(){
        $data = [
        'title' => 'Cập nhật tài khoản',
        'action' => 'Người dùng'
        ];
        return view('Admin.user.edit_user');
    }
    // Cập nhật tài khoản
    public function update_form(Request $request, $id)
    {   
        $data = [
            'title' => 'Cập nhật tài khoản',
            'action' => '',
            'id'=> $id,
        ];
        return view('Admin.user.edit_user')->with(compact('data'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    // Gửi mail
    public function mail(){
        $name = 'forgot password';
        Mail::send('Auth.home', compact('name'), function($email){
            $email->to('kingdomsneakers80@gmail.com','Kingdom Sneakers');
        });
    }
}
