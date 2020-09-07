<?php

namespace App\Http\Controllers;

use App\Login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    //
    private $login;

    public function __construct(Login $login, Request $request)
    {
        $this->login = $login;
    }

    /**
     * @param Request $request
     * Return Kết quả đăng nhập
     */
    public function Login(Request $request)
    {
        if ($request->username == '' || $request->password == '') {
            return response(["code" => 200, "message" => "Bạn cần phải điền thông tin đầy đủ"], 400);
        }
        /**
         * Lấy thông tin user từ database
         */
        $result = DB::table($this->login->table)->where('username', $request->username)->get(['id', 'username', 'password', 'kind'])->toArray();

        foreach ($result as $value) {
        }

        // kiểm tra tài khoản có bị khoá hay không
        if ($value->kind != 0 && $value->kind != 1) {
            return response(["code" => 200, "message" => "Tài khoản của bạn bị khoá"], 400);
        }

        if (($request->username == $value->username) && (password_verify($request->password, $value->password)) && $value->kind != 2) {
            if ($request->session()->has('id')) {
                return response(["code" => 400, "message" => "Pạn đã đăng nhập, Pạn phải đăng xuất trước"], 400);
            }
            /**
             *  set session khi đăng nhập thành công
             */
            session(["id" => $value->id]);
            session(["username" => $value->username]);
            session(["kind" => $value->kind]);

            /**
             *  trả kết quả khi đăng nhập thành công
             */
            return response(["code" => 200, "message" => "Đăng nhập thành công"], 200);
        }
        /**
         *  trả kết quả khi đăng nhập thất bại
         */
        http_response_code(400);
        return response(["code" => 400, "message" => "Đăng nhập thất bại"], 400);
    }

    /**
     * return đăng xuất người dùng (xoá session)
     */
    public function Logout()
    {
        /**
         *  xoá session người dùng hiện tại
         */
        session()->forget(['id', 'username', 'password']);
        session()->save();
        /**
         *  trả kết quả khi đăng xuất thành công
         */
        return redirect()->route('login');
    }
}
