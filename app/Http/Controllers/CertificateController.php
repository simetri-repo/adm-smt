<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;

class CertificateController extends Controller
{
    public function datacertificate()
    {
        $response = DB::table('tb_certificate')->select('*')->get();
        return view('admin.datacertificate', compact('response'));
    }

    public function add_certificate(request $request)
    {
        // return $request->all();
        // return session('username');
        $tgl = Date('Y-m-d');

        $this->validate($request, [
            'gambar_certificate' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
        ]);


        // menyimpan data file yang diupload ke variabel $file
        $file = $request->file('gambar_certificate');
        $nama_file = time() . "_" . $file->getClientOriginalName();

        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'gambar_certificate/';
        $file->move($tujuan_upload, $nama_file);

        $path_mtools = $tujuan_upload . $nama_file;

        $response = DB::table('tb_certificate')->insert([

            'gambar_certificate' => $path_mtools,
            'nama_certificate' => $request->nama_certificate,
            'status_certificate' => 9,
            'created_by' => session('username'),
            'updated_at' => $tgl

        ]);

        return redirect('datacertificate');
    }
    public function datacertificate_id($id)
    {
        $response = DB::table('tb_certificate')
            ->select('*')
            ->where('id_certificate', $id)
            ->get();

        // dd($response);
        return view('admin.update_datacertificate', compact('response'));
    }
    public function update_certificate(Request $request, $id)
    {
        // return $request->all();
        $tgl = Date('Y-m-d');
        // return $id;
        $gambar_certificate_new = $request->gambar_certificate_new;
        $nama_certificate = $request->nama_certificate;
        $created_by_new = $request->created_by_new;
        $status_certificate = $request->status_certificate;

        if ($gambar_certificate_new == "") {
            $response = DB::table('tb_certificate')
                ->where('id_certificate', $id)
                ->update([
                    'nama_certificate' => $nama_certificate,
                    'status_certificate' => $status_certificate,
                    'created_by' => $created_by_new,
                    'updated_at' => $tgl
                ]);
        } else {

            // menyimpan data file yang diupload ke variabel $file
            $file = $request->file('gambar_certificate_new');
            $nama_file = time() . "_" . $file->getClientOriginalName();

            // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = 'gambar_certificate/';
            $file->move($tujuan_upload, $nama_file);

            $path_mtools = $tujuan_upload . $nama_file;
            $response = DB::table('tb_certificate')
                ->where('id_certificate', $id)
                ->update([
                    'gambar_certificate' => $path_mtools,
                    'nama_certificate' => $nama_certificate,
                    'status_certificate' => $status_certificate,
                    'created_by' => $created_by_new,
                    'updated_at' => $tgl
                ]);
        }

        return redirect('datacertificate')->with('status_ok', 'Update Success!');
    }

    public function hapus_cert($id)
    {

        $delete = DB::table('tb_certificate')
            ->where('id_certificate', $id)
            ->delete();

        return redirect('datacertificate')->with('status_ok', 'Data berhasil dihapus.');
    }
}
