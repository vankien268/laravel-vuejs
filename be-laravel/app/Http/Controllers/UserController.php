<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = DB::table('users')
            ->join('departments', 'users.department_id', '=', 'departments.id')
            ->join('user_status', 'users.status_id', '=', 'user_status.id')
            ->select('users.*', 'departments.name as department_name', 'user_status.name as status_name')
            ->get();
        return $users;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departments = DB::table('departments')->get();
        $userStatus = DB::table('user_status')->get();
        return response()->json(['departments' => $departments, 'userStatus' => $userStatus]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            "status_id" => "required",
            "username" => "required|unique:users,username",
            "name" => "required|max:255",
            "email" => "required|unique:users,email|email",
            "department_id" => "required",
            "password" => "required",
            "password_confirmation" => "required|same:password"
        ], [
            "status_id.required" => "Nhập Tình trạng",
            "username.required" => "Nhập Tên Tài khoản",
            "username.unique" => "Tên Tài khoản đã tồn tại",

            "name.required" => "Nhập Họ và Tên",
            "name.max" => "Ký tự tối đa là 255",

            "email.required" => "Nhập Email",
            "email.email" => "Email không hợp lệ",
            "email.unique" => "Email đã tồn tại",

            "department_id.required" => "Nhập Phòng ban",
            "password.required" => "Nhập Mật khẩu",
            "password_confirmation.required" => "Mật khẩu xác nhận không bỏ trống",
            "password_confirmation.same" => "Mật khẩu xác nhận không khớp"
        ]);

        // Eloquent ORM (Lưu ý: Khai báo $fillable/ $guarded trong Models User)
        // Cách 1:
        User::create([
            "status_id" => $request["status_id"],
            "username" => $request["username"],
            "name" => $request["name"],
            "email" => $request["email"],
            "department_id" => $request["department_id"],
            "password" => bcrypt($request["password"])
        ]);
        return $this->sendResponse([], 200, 'Thêm thành công !');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return User::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = User::find($id);
        return $this->sendResponse($user, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            "status_id" => "required",
            "username" => "required|unique:users,username,".$id,
            "name" => "required|max:255",
            "email" => "required|unique:users,email,".$id."|email",
            "department_id" => "required"
        ], [
            "status_id.required" => "Nhập Tình trạng",
            "username.required" => "Nhập Tên Tài khoản",
            "username.unique" => "Tên Tài khoản đã tồn tại",
            "name.required" => "Nhập Họ và Tên",
            "name.max" => "Ký tự tối đa là 255",
            "email.required" => "Nhập Email",
            "email.email" => "Email không hợp lệ",
            "email.unique" => "Email đã tồn tại",
            "department_id.required" => "Nhập Phòng ban"
        ]);

        User::find($id)->update([
            "status_id" => $request["status_id"],
            "username" => $request["username"],
            "name" => $request["name"],
            "email" => $request["email"],
            "department_id" => $request["department_id"]
        ]);

        if($request["change_password"])
        {
            $validated = $request->validate([
                "password" => "required",
                "password_confirmation" => "required|same:password"
            ], [
                "password.required" => "Nhập Mật khẩu",
                "password_confirmation.required" => "Mật khẩu xác nhận không bỏ trống",
                "password_confirmation.same" => "Mật khẩu xác nhận không khớp"
            ]);

            User::find($id)->update([
                "password" => bcrypt($request["password"]),
            ]);
        }
        return $this->sendResponse([], 200, 'Sửa thành công !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
