<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;



class MainController extends Controller
{
    function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:5|max:12',
        ]);

        $email = $request->email;
        $pass = $request->password;
        $cek_user = DB::table('tb_user')
            ->select('*')
            ->where('username', $email)
            ->count();
        if ($cek_user == 0) {
            return redirect('/')->with('status_bad', 'Account Tidak Ditemukan');
        } else {

            $cek_valid = DB::table('tb_user')
                ->select('*')
                ->where('username', $email)
                ->get();

            if ($cek_valid[0]->status == "9") {
                return redirect('/')->with('status_bad', 'Account tidak dapat digunakan, harap hubungi admin!');
            } else {
                $kk = $cek_valid[0]->password;
                $pass2 = Crypt::decrypt($kk);

                session::put('username', $cek_valid[0]->username);
                session::put('role', $cek_valid[0]->role);


                if ($pass2 == $pass) {
                    return redirect('dashboard');
                } else {
                    return redirect('/')->with('status_bad', 'Cek Kembali Password Anda.');
                }
            }
        }


        // return $pass2;
    }
    function register()
    {
        return view('auth.Register');
    }
    function regist_save(Request $request)
    {
        $tgl = Date('Y-m-d');
        $check_email = DB::table('tb_user')
            ->select('username')
            ->where('username', $request->email)
            ->count();
        if ($check_email == 1) {
            return redirect('datauser')->with('status_bad', 'Akun ' . $request->email . ' sudah tersedia.');
        } else {

            $pass = Crypt::encrypt($request->password);
            // return $pass;
            $save = DB::table('tb_user')
                ->insert([

                    'username' => $request->email,
                    'password' => $pass,
                    'role' => $request->role,
                    'created_by' => session('username'),
                    'updated_at' => $tgl,
                    'status' => 9,

                ]);

            return redirect('datauser')->with('status_ok', 'Akun Berhasil Dibuat.');
        }

        // dd($check_email);
    }

    public function logout()
    {
        session::forget('username');
        return redirect('/');
    }
}
