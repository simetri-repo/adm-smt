<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;

class CareerController extends Controller
{
    public function datacareer()
    {
        $response = DB::table('tb_career')->select('*')->get();
        return view('admin.datacareer', compact('response'));
    }

    public function add_career(request $request)
    {
        // return $request->all();
        // return session('username');
        $tgl = Date('Y-m-d');

        //$this->validate($request, [
        //     'gambar_career' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
        // ]);


        // // menyimpan data file yang diupload ke variabel $file
        // $file = $request->file('gambar_career');
        // $nama_file = time() . "_" . $file->getClientOriginalName();

        // // isi dengan nama folder tempat kemana file diupload
        // $tujuan_upload = 'gambar_career/';
        // $file->move($tujuan_upload, $nama_file);

        // $path_mtools = $tujuan_upload . $nama_file;

        $response = DB::table('tb_career')->insert([

            // 'gambar_career' => $path_mtools,
            'nama_career' => $request->nama_career,
            'desc_career' => $request->desc_career,
            'require_career' => $request->require_career,
            'email_career' => $request->email_career,
            'status_career' => 9,
            'open' => 0,
            'created_by' => session('username'),
            'updated_at' => $tgl

        ]);

        return redirect('datacareer');
    }
    public function datacareer_id($id)
    {
        $response = DB::table('tb_career')
            ->select('*')
            ->where('id_career', $id)
            ->get();

        // dd($response);
        return view('admin.update_datacareer', compact('response'));
    }
    public function update_career(Request $request, $id)
    {
        // return $request->all();
        $tgl = Date('Y-m-d');
        // return $id;
        // $gambar_career_new = $request->gambar_career_new;
        $nama_career = $request->nama_career;
        $desc_career = $request->desc_career;
        $require_career = $request->require_career;
        $email_career = $request->email_career;
        $created_by_new = $request->created_by_new;
        $status_career = $request->status_career;


        $response = DB::table('tb_career')
            ->where('id_career', $id)
            ->update([
                'nama_career' => $nama_career,
                'status_career' => $status_career,
                'desc_career' => $desc_career,
                'require_career' => $require_career,
                'email_career' => $email_career,
                'created_by' => $created_by_new,
                'updated_at' => $tgl
            ]); {

            // // menyimpan data file yang diupload ke variabel $file
            // $file = $request->file('gambar_career_new');
            // $nama_file = time() . "_" . $file->getClientOriginalName();

            // // isi dengan nama folder tempat kemana file diupload
            // $tujuan_upload = 'gambar_career/';
            // $file->move($tujuan_upload, $nama_file);

            // $path_mtools = $tujuan_upload . $nama_file;
            $response = DB::table('tb_career')
                ->where('id_career', $id)
                ->update([

                    'nama_career' => $nama_career,
                    'desc_career' => $desc_career,
                    'require_career' => $require_career,
                    'status_career' => $status_career,
                    'email_career' => $email_career,
                    'created_by' => $created_by_new,
                    'updated_at' => $tgl
                ]);
        }

        return redirect('datacareer')->with('status_ok', 'Update Success!');
    }

    public function hapus_career($id)
    {
        $delete = DB::table('tb_career')
            ->where('id_career', $id)
            ->delete();

        return redirect('datacareer')->with('status_ok', 'Data berhasil dihapus.');
    }
}
