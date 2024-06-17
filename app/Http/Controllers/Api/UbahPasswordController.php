<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Mail\PassMailSend;

class UbahPasswordController extends Controller
{
    public function ubahPassword(Request $request)
    {
        $data = $request->all();

        $user = User::where('email', $data['email'])->first();

        if (!$user) {
            return response([
                'message' => 'Email tidak terdaftar' // Custom error message for email not found
            ], 404);
        }

        if ($user) {
            $user->update([
                'password' => $data['password'],
            ]);
            return "Berhasil Ubah Password";
        }
        return "Gagal Ubah Password";
    }

    public function prosesUbahPW(Request $request)
    {
        $data = $request->all();
        $validate = Validator::make($data, [
            'email' => 'required|email:rfc.dns'
        ]);

        if ($validate->fails()) {
            return response([
                'message' => $validate->errors()->first()
            ], 400);
        }

        $user = User::where('email', $data['email'])->first();

        if (!$user) {
            return response([
                'message' => 'Email Tidak Terdaftar'
            ], 404);
        }

        $str = Str::random(70);

        $user->update([
            'verify_pass_key' => $str
        ]);

        $url = request()->getHttpHost() . "/verifGantiPW/{$str}";

        $details = [
            'nama' => $user['nama'],
            'username' => $user['username'],
            'email' => $request->email,
            'url' => $url
        ];

        Mail::to($request->email)->send(new PassMailSend($details));

        return response([
            'message' => 'Link Ubah Password Telah Dikirim ke Email Anda'
        ], 200);
    }

    public function index()
    {
        return view('viewChangePass');
    }

    public function verifGantiPW($verify_key)
    {
        $check = User::select('verify_pass_key')->where('verify_pass_key', $verify_key)->exists();

        if ($check) {
            $user = User::where('verify_pass_key', $verify_key)->first();
            $details['email'] = $user->email;
            // $detailUser = ([
            //     'username' => $user->username
            // ]);
            // $user->update([
            //     'aktivasi_ganti_password' => 1
            // ]);
            return view('viewChangePass', ['details' => $details]);
        } else {
            return
                "Key tidak valid";
        }
    }

}