<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\MasterBidang;
use App\Models\MasterKategori;
use App\Models\MasterProfesi;
use Illuminate\Http\Request;

class MasterController extends Controller
{
    public function kategori()
    {
        $kategori = MasterKategori::latest()->get();
        return $kategori;
    }

    public function bidang()
    {
        $bidang = MasterBidang::latest()->get();
        return $bidang;
    }

    public function profesi()
    {
        $profesi = MasterProfesi::latest()->get();
        return $profesi;
    }
}
