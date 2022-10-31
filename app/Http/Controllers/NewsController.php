<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    public function datanews()
    {
        $response = DB::table('tb_berita')->select('*')->get();
        return view('admin.datanews', compact('response'));
    }

    public function add_berita(request $request)
    {
        // return $request->all();
        // return session('username');
        $tgl = Date('Y-m-d');

        $this->validate($request, [
            'gambar_berita' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
        ]);


        // menyimpan data file yang diupload ke variabel $file
        $file = $request->file('gambar_berita');
        $nama_file = time() . "_" . $file->getClientOriginalName();

        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'gambar_berita/';
        $file->move($tujuan_upload, $nama_file);

        $path_mtools = $tujuan_upload . $nama_file;

        $response = DB::table('tb_berita')->insert([

            'gambar_berita' => $path_mtools,
            'nama_berita' => $request->nama_berita,
            'keterangan_berita' => $request->keterangan_berita,
            'status_berita' => 9,
            'created_by' => session('username'),
            'updated_at' => $tgl

        ]);

        return redirect('datanews');
    }
    public function datanews_id($id)
    {
        $response = DB::table('tb_berita')
            ->select('*')
            ->where('id_berita', $id)
            ->get();

        // dd($response);
        return view('admin.update_datanews', compact('response'));
    }
    public function update_berita(Request $request, $id)
    {
        // return $request->all();
        $tgl = Date('Y-m-d');
        // return $id;

        $gambar_berita_new = $request->gambar_berita_new;
        $nama_berita = $request->nama_berita;
        $keterangan_berita = $request->keterangan_berita;
        $created_by_new = $request->created_by_new;
        $status_berita = $request->status_berita;

        if ($gambar_berita_new == "") {
            $response = DB::table('tb_berita')
                ->where('id_berita', $id)
                ->update([
                    'nama_berita' => $nama_berita,
                    'keterangan_berita' => $keterangan_berita,
                    'status_berita' => $status_berita,
                    'created_by' => $created_by_new,
                    'updated_at' => $tgl
                ]);
        } else {

            // menyimpan data file yang diupload ke variabel $file
            $file = $request->file('gambar_berita_new');
            $nama_file = time() . "_" . $file->getClientOriginalName();

            // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = 'gambar_berita/';
            $file->move($tujuan_upload, $nama_file);

            $path_mtools = $tujuan_upload . $nama_file;
            $response = DB::table('tb_berita')
                ->where('id_berita', $id)
                ->update([
                    'gambar_berita' => $path_mtools,
                    'nama_berita' => $nama_berita,
                    'keterangan_berita' => $keterangan_berita,
                    'status_berita' => $status_berita,
                    'created_by' => $created_by_new,
                    'updated_at' => $tgl
                ]);
        }

        return redirect('datanews')->with('status_ok', 'Update Success!');
    }

    public function delete_news($id)
    {
        $delete = DB::table('tb_berita')
            ->where('id_berita', $id)
            ->delete();
        return redirect('datanews')->with('status_ok', 'Data berhasil dihapus.');
    }
}
