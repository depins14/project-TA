<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Scor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ScorController extends Controller
{
    public function all(Request $request)
    {
        $id = $request->input('id');
        $limit = $request->input('limit', 6);
        $materi_id = $request->input('materi_id');

        if ($id) {
            $scor = Scor::with(['course'])->find($id);

            if ($scor) {
                return ResponseFormatter::success(
                    $scor,
                    'Data nilai berhasil diambil'
                );
            } else {
                return ResponseFormatter::error(
                    null,
                    'Data nilai tidak ditemukan',
                    404
                );
            }
        }

        $scor = Scor::with(['course'])->where('user_id', Auth::user()->id);

        if ($materi_id) {
            $scor->where('materi_id', $materi_id);
        }

        return ResponseFormatter::success(
            $scor->paginate($limit),
            'Data nilai ditemukan'
        );
    }

    public function scor(Request $request)
    {
        $request->validate([
            'materi_id' => 'exists:courses,id',
            'nilai' => 'required',
        ]);

        $scor = Scor::create([
            'user_id' => Auth::user()->id,
            'materi_id' => $request->materi_id,
            'nilai' => $request->nilai,
        ]);

        return ResponseFormatter::success($scor->load('course'), 'Nilai ditambahkan');
    }
}
