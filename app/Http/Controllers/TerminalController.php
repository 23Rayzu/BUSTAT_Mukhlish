<?php

namespace App\Http\Controllers;

use App\Models\Terminal; // Impor model Terminal
use Illuminate\Http\Request;

class TerminalController extends Controller
{
    // Method untuk menampilkan halaman Beranda
    public function beranda()
    {
        return view('beranda'); // Akan mengarah ke resources/views/beranda.blade.php
    }

    // Method untuk menampilkan halaman Peta
    public function peta()
    {
        return view('peta'); // Akan mengarah ke resources/views/peta.blade.php
    }

    // Method untuk menampilkan halaman Tabel Informasi
    public function tabel()
    {
        // Ambil semua data dari model Terminal
        $terminals = Terminal::all();

        // Kirim data ke view
        return view('tabel', ['terminals' => $terminals]); // Akan mengarah ke resources/views/tabel.blade.php
    }

        public function json()
    {
        // Ambil semua data dari model Terminal
        $terminals = Terminal::all();

        // Kembalikan sebagai response JSON dengan format yang disukai DataTables
        return response()->json(['data' => $terminals]);
    }

    // Di dalam file App\Http\Controllers\TerminalController.php

public function geojson()
{
    $terminals = \App\Models\Terminal::all();

    $geojson = [
        'type'      => 'FeatureCollection',
        'features'  => []
    ];

    foreach ($terminals as $terminal) {
        $feature = [
            'type'      => 'Feature',
            'geometry'  => [
                'type'        => 'Point',
                'coordinates' => [$terminal->longitude, $terminal->latitude] // Format: [lng, lat]
            ],
            'properties' => [
                'nama_terminal' => $terminal->nama_terminal,
                'alamat'        => $terminal->alamat,
                'kabupaten'     => $terminal->kabupaten,
            ]
        ];
        array_push($geojson['features'], $feature);
    }

    return response()->json($geojson);
}
}
