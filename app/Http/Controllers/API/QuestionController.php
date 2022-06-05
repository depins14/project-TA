<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function all(Request $request)
    {
        $id = $request->input('id');
        $limit = $request->input('limit', 6);

        if ($id) {
            $course = Course::with(['questions'])->find($id);

            if ($course)
                return ResponseFormatter::success(
                    $course,
                    'Data soal berhasil diambil'
                );
            else
                return ResponseFormatter::error(
                    null,
                    'Data soal tidak ditemukan',
                    404
                );
        }

        $course = Course::with(['questions']);

        return ResponseFormatter::success(
            $course->paginate($limit),
            'Data soal berhasil diambil'
        );
    }
}
