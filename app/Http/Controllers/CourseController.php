<?php

namespace App\Http\Controllers;

use App\Http\Requests\CourseRequest;
use App\Models\Course;
use App\Models\Kd;
use App\Models\Question;
use App\Models\Scor;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $query = Course::with(['kd']);

            return DataTables::of($query)
                ->addColumn('action', function ($item) {
                    return '
                        <a class="inline-block border border-gray-700 bg-gray-700 text-white rounded-md px-2 py-1 m-1 transition duration-500 ease select-none hover:bg-gray-800 focus:outline-none focus:shadow-outline" 
                            href="' . route('dashboard.course.edit', $item->id) .
                        '">
                            Edit
                        </a> 

                        <form class="inline-block" action="' . route('dashboard.course.destroy', $item->id) . '" method="POST">
                        <button class="border border-red-500 bg-red-500 text-white rounded-md px-2 py-1 m-2 transition duration-500 ease select-none hover:bg-red-600 focus:outline-none focus:shadow-outline" >
                            Hapus
                        </button>
                            ' . method_field('delete') . csrf_field() . '
                        </form>

                        <a class="inline-block border border-blue-500 bg-blue-500 text-white rounded-md px-2 py-1 m-1 transition duration-500 ease select-none hover:bg-blue-800 focus:outline-none focus:shadow-outline" target="_blank"
                            href="' . $item->soal . '">
                            Question
                        </a> 

                        ';
                })
                ->editColumn('materi', function ($item) {
                    return '<a class="py-2 px-7 bg-red-500 rounded-md text-white hover:bg-red-800"  href="' . '/storage/' .  $item->materi . '">View</a>';
                })
                ->editColumn('thumbnail', function ($item) {
                    return '<img style="max-width: 150px;" src="' . '/storage/' .  $item->thumbnail . '"/>';
                })
                ->rawColumns(['action', 'materi', 'thumbnail'])
                ->make();
        }

        return view('pages.dashboard.course.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kd = Kd::all();

        return view('pages.dashboard.course.create', compact('kd'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'kd_id' => 'required|exists:kds,id',
            'judul' => 'required|max:255',
            'ringkasan_materi' => 'required',
            'materi' => 'required|file',
            'video' => 'required',
            'soal' => 'required',
            'thumbnail' => 'required|image|file|max:2048'
        ]);


        $validateData['materi'] = $request->file('materi')->store('public/materi');

        $validateData['thumbnail'] = $request->file('thumbnail')->store('public/thumbnail');


        Course::create($validateData);

        return redirect()->route('dashboard.course.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        if (request()->ajax()) {
            $query =
                Question::with(['course'])->where('materi_id', $course->id);


            return DataTables::of($query)
                ->make();
        }

        return view('pages.dashboard.course.show', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        $kds = Kd::all();
        return view('pages.dashboard.course.edit', [
            'item' => $course,
            'kds' => $kds
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(CourseRequest $request, Course $course)
    {
        $data = $request->all();

        $course->update($data);

        return redirect()->route('dashboard.course.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        $course->delete();

        return redirect()->route('dashboard.course.index');
    }
}
