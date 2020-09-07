<?php

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    //
    private $admin;

    public function __construct(Admin $admin)
    {
        $this->admin = $admin;
    }

    public function showNhanVien()
    {
        $result = DB::table($this->admin->table)
            ->get(['id', 'username', 'phone_number', 'kind'])
            ->toArray();
        return $result;
    }

    /**
     * @param $adminId
     * @return array
     */
    public function show($adminId)
    {
        $result = DB::table($this->admin->table)
            ->where('id', $adminId)
            ->get(['id', 'username','password', 'phone_number', 'kind'])
            ->toArray();
        return $result;
    }

    /**
     * @param Request $request
     */
    public function store(Request $request)
    {
        if ($request->username != '' && $request->password != '' && $request->phone_number != '' && $request->kind != '') {
            $CheckExist = DB::table($this->admin->table)->where('username', $request->username)->count();
            if ($CheckExist != 0) {
                return response(["code" => 400, "message" => "Tên đăng nhập đã tồn tại"], 400);
            }
            $password_hash = password_hash($request->password, PASSWORD_DEFAULT);
            try {
                DB::beginTransaction();
                DB::table($this->admin->table)->insertOrIgnore([
                    'username' => $request->username,
                    'password' => $password_hash,
                    'phone_number' => $request->phone_number,
                    'kind' => $request->kind
                ]);
                DB::commit();
                return response(["code" => 400, "message" => "Thêm thành viên thành công"], 200);
            } catch (Exception $e) {
                DB::rollBack();
                return response(["code" => 400, "message" => "Thêm thành viên thất bại"], 400);
            }
        }
        return response(["code" => 400, "message" => "Bạn chưa nhập đủ dữ kiện"], 400);
    }

    /**
     * @param Request $request
     * @param $adminId
     * @return_json
     */
    public function update(Request $request, $adminId)
    {
        if ($request->phone_number != '' && $request->kind != '' && $request->password != '') {
            $result = DB::table($this->admin->table)->where('id', $adminId)->get(['password'])->toArray();

            foreach ($result as $value) {
            }
            $password_hash = $request->password;
            if ($value->password != $request->password) {
                $password_hash = password_hash($request->password, PASSWORD_DEFAULT);
            }

            try {

                DB::beginTransaction();
                DB::table($this->admin->table)->where('id', $adminId)->update([
                    'password' => $password_hash,
                    'phone_number' => $request->phone_number,
                    'kind' => $request->kind
                ]);
                DB::commit();
                return response(["code" => 200, "message" => "Cập nhật thành viên thành công"], 200);
            } catch (Exception $e) {
                DB::rollBack();
                return response(["code" => 400, "message" => "Cập nhật thành viên thất bại"], 400);
            }
        }
        return response(["code" => 400, "message" => "Bạn chưa nhập đủ dữ kiện"], 400);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function lock(Request $request)
    {
        $id = (int) $request->id;
        if (session('kind') == 0 && session('id') != $id) {
            try {
                DB::beginTransaction();
                DB::table($this->admin->table)->where('id', $request->id)->update([
                    'kind' => 2
                ]);
                DB::commit();
                return response(["code" => 200, "message" => "Khoá nhân viên thành công"], 200);
            } catch (Exception $e) {
                DB::rollBack();
                return response(["code" => 400, "message" => "Khoá nhân viên thất bại"], 400);
            }
        }
        return response(["code" => 400, "message" => "Bạn không đủ quyền"], 400);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function unlock(Request $request)
    {
        $id = (int) $request->id;
        if (session('kind') == 0 && session('id') != $id) {
            try {
                DB::beginTransaction();
                DB::table($this->admin->table)->where('id', $request->id)->update([
                    'kind' => 1
                ]);
                DB::commit();
                return response(["code" => 200, "message" => "Mở khoá nhân viên thành công"], 200);
            } catch (Exception $e) {
                DB::rollBack();
                return response(["code" => 400, "message" => "Mở khoá nhân viên thất bại"], 400);
            }
        }
        return response(["code" => 400, "message" => "Bạn không đủ quyền"], 400);
    }
}
