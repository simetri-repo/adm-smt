<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;


class UserController extends Controller
{
    public function datauser()
    {
        $response = DB::table('tb_user')
            ->select('*')
            ->get();

        return view('admin.datauser', compact('response'));
    }
    public function reset_password($id)
    {
        $pas_norm = Crypt::encrypt("simetri123");

        $reset_pass = DB::table('tb_user')
            ->where('id', $id)
            ->update([
                'password' => $pas_norm,
            ]);

        return redirect('datauser')->with('status_ok', 'password reset sukses.');
    }
    public function edit_user(Request $item, $id)
    {
        $response = DB::table('tb_user')
            ->where('id', $id)
            ->update([
                'role' => $item->role,
                'status' => $item->status
            ]);
        return redirect('datauser')->with('status_ok', 'Perubahan di simpan');
    }

    public function delete_user($id)
    {
        $delete = DB::table('tb_user')
            ->where('id', $id)
            ->delete();

        return redirect('datauser')->with('status_ok', 'data user telah dihapus.');
    }
}
