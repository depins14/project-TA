<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Kd;
use Illuminate\Http\Request;

class KdController extends Controller
{
    public function all(Request $request)
    {
        $id = $request->input('id');
        $limit = $request->input('limit', 6);

        if ($id) {
            $kd = Kd::query()->find($id);

            if ($kd)
                return ResponseFormatter::success(
                    $kd,
                    'Data KD berhasil diambil'
                );
            else
                return ResponseFormatter::error(
                    null,
                    'Data KD tidak ditemukan',
                    404
                );
        }

        $kd = Kd::query();

        return ResponseFormatter::success(
            $kd->paginate($limit),
            'Data KD ditemukan'
        );
    }
}
