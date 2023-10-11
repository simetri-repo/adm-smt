<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

//  berita
// display = 1 , notdisplay = 9, hot news = 3, top news = 2

// produk
// display = 1 , notdisplay = 9

// certificate
// display = 1 , notdisplay = 9

// career
// display = 1 , notdisplay = 9

class ApiController extends Controller
{
    public function show_berita()
    {
        $year = request('year');
        
        $response = DB::table('tb_berita')
            ->select('*')
            ->where('status_berita', 1)
            ->orderByDesc('update_rilis')
            ->whereYear('update_rilis', $year)
            ->paginate(10);

        // return $response;
        return response()->json($response);
    }
    
    public function show_tahun(Request $request)
    {
        $response = DB::table('tb_berita')
            ->select(DB::raw('YEAR(update_rilis) as tahun'), DB::raw('COUNT(id_berita) as total'))
            ->where('status_berita', 1)
            ->groupBy('tahun')
            ->orderBy('tahun', 'asc')
            ->get();

        // return $response;
        return response()->json($response);
    }
    
    public function show_berita_detail($id)
    {
        $response = DB::table('tb_berita')
            ->select('id_berita','gambar_berita','nama_berita','keterangan_berita','updated_at','update_rilis')
            ->where('id_berita', $id)
            // ->where('status_berita', 1)
            ->get();

        return $response;
    }

    public function show_berita_hot()
    {
        $response = DB::table('tb_berita')
            ->select('*')
            ->where('status_berita', 3)
            ->get();

        return $response;
    }

    public function show_berita_top()
    {
        $response = DB::table('tb_berita')
            ->select('*')
            ->where('status_berita', 2)
            ->get();

        return $response;
    }

    public function show_produk()
    {
        $response = DB::table('tb_produk')
            ->select('*')
            ->where('status_produk', 1)
            ->get();

        return $response;
    }

    public function show_certificate()
    {
        $response = DB::table('tb_certificate')
            ->select('*')
            ->where('status_certificate', 1)
            ->get();

        return $response;
    }

    public function show_career()
    {
        $response = DB::table('tb_career')
            ->select('*')
            ->where('status_career', 1)
            ->get();

        return $response;
        // $careerList = DB::table('tb_career')
        //     ->select('*')
        //     ->where('status_career', 1)
        //     ->get();

        // $response = [
        //     'message' => "List Career",
        //     'data' => $careerList
        // ];

        // return $response;
    }
}
