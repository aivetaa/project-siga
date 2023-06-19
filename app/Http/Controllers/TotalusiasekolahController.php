<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tb_usiasekolah;
use App\Models\Opd;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;


class TotalusiasekolahController extends Controller
{
    public function index()
    {
        return view('visitors.page.totalusiasekolah');
    }

    public function getTotalusiasekolah(Request $request)
    {
        $data = Opd::all();
        return Datatables::of($data)
            ->addColumn('jk_lk_sds', function ($item) {
                $item1 = $item->tb_usiasekolah?->jk_lk_sds;
                return $item1;
            })
            ->addColumn('jk_pr_sds', function ($item) {
                $item2 = $item->tb_usiasekolah?->jk_pr_smps;
                return $item2;
            })
            ->addColumn('sum', function ($item) {
                $sum = $item->tb_usiasekolah?->jk_lk_sds + $item->tb_usiasekolah?->jk_pr_smps;
                return $sum;
            })
            ->addIndexColumn()
            ->make(true);
    }
}