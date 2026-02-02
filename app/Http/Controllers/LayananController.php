<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\LayananData;

class LayananController extends Controller
{
    public function detail($id)
    {
        $layanan = LayananData::find($id);

        if (!$layanan) {
            abort(404);
        }

        return view('landing.detail', compact('layanan'));
    }
}
