<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function dataproduct()
    {
        $response = DB::table('tb_produk')
            ->select('*')
            ->get();
        return view('admin.dataproduct', compact('response'));
    }

    public function add_produk(request $request)
    {
        // return $request->all();
        // return session('username');
        $tgl = Date('Y-m-d');

        $this->validate($request, [
            'gambar_produk' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
        ]);


        // menyimpan data file yang diupload ke variabel $file
        $file = $request->file('gambar_produk');
        $nama_file = time() . "_" . $file->getClientOriginalName();

        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'gambar_produk/';
        $file->move($tujuan_upload, $nama_file);

        $path_mtools = $tujuan_upload . $nama_file;

        $response = DB::table('tb_produk')->insert([

            'gambar_produk' => $path_mtools,
            'nama_produk' => $request->nama_produk,
            'keterangan_produk' => $request->keterangan_produk,
            'status_produk' => 9,
            'created_by' => session('username'),
            'updated_at' => $tgl

        ]);

        return redirect('dataproduct')->with('status_ok', 'Input Success!');
    }

    public function dataproduct_id($id)
    {
        $response = DB::table('tb_produk')
            ->select('*')
            ->where('id_produk', $id)
            ->get();

        // dd($response);
        return view('admin.update_dataproduct', compact('response'));
    }
    public function update_produk(Request $request, $id)
    {
        // return $request->all();
        $tgl = Date('Y-m-d');
        // return $id;

        $gambar_produk_new = $request->gambar_produk_new;
        $nama_produk = $request->nama_produk;
        $keterangan_produk = $request->keterangan_produk;
        $created_by_new = $request->created_by_new;
        $status_produk = $request->status_produk;

        if ($gambar_produk_new == "") {
            $response = DB::table('tb_produk')
                ->where('id_produk', $id)
                ->update([
                    'nama_produk' => $nama_produk,
                    'keterangan_produk' => $keterangan_produk,
                    'status_produk' => $status_produk,
                    'created_by' => $created_by_new,
                    'updated_at' => $tgl
                ]);
        } else {

            // menyimpan data file yang diupload ke variabel $file
            $file = $request->file('gambar_produk_new');
            $nama_file = time() . "_" . $file->getClientOriginalName();

            // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = 'gambar_produk/';
            $file->move($tujuan_upload, $nama_file);

            $path_mtools = $tujuan_upload . $nama_file;
            $response = DB::table('tb_produk')
                ->where('id_produk', $id)
                ->update([
                    'gambar_produk' => $path_mtools,
                    'nama_produk' => $nama_produk,
                    'keterangan_produk' => $keterangan_produk,
                    'status_produk' => $status_produk,
                    'created_by' => $created_by_new,
                    'updated_at' => $tgl
                ]);
        }

        return redirect('dataproduct')->with('status_ok', 'Update Success!');
    }

    public function delete_product($id)
    {
        $delete = DB::table('tb_produk')
            ->where('id_produk', $id)
            ->delete();

        return redirect('dataproduct')->with('status_ok', 'Data berhasil dihapus.');
    }
}
