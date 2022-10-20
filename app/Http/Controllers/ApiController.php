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

class ApiController extends Controller
{
    public function show_berita()
    {
        $response = DB::table('tb_berita')
        ->select('*')
            ->where('status_berita', 1)
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
}
