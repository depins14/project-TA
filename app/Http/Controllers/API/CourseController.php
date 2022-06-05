<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function all(Request $request)
    {
        $id = $request->input('id');
        $limit = $request->input('limit', 6);

        if ($id) {
            $course = Course::with(['kd', 'questions'])->find($id);

            if ($course)
                return ResponseFormatter::success(
                    $course,
                    'Data materi berhasil diambil'
                );
            else
                return ResponseFormatter::error(
                    null,
                    'Data materi tidak ditemukan',
                    404
                );
        }

        $course = Course::with(['kd', 'questions']);

        return ResponseFormatter::success(
            $course->paginate($limit),
            'Data materi berhasil diambil'
        );
    }
}

