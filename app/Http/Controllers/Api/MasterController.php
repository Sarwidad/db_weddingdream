<?php

namespace App\Http\Controllers;

use App\Models\MasterBidang;
use App\Models\MasterKategori;
use App\Models\MasterProfesi;
use Illuminate\Http\Request;

class MasterController extends Controller
{
    public function kategori()
    {
        $kategori = MasterKategori::latest();
        return $kategori;
    }

    public function bidang()
    {
        $bidang = MasterBidang::latest();
        return $bidang;
    }

    public function profesi()
    {
        $profesi = MasterProfesi::latest();
        return $profesi;
    }
}
