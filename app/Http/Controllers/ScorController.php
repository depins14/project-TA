<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Scor;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ScorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $query = Scor::with(['user', 'course']);


            return DataTables::of($query)

                ->make();
        }

        $course = Course::all();


        return view('pages.dashboard.scor.index', compact('course'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Scor  $scor
     * @return \Illuminate\Http\Response
     */
    public function show(Scor $scor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Scor  $scor
     * @return \Illuminate\Http\Response
     */
    public function edit(Scor $scor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Scor  $scor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Scor $scor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Scor  $scor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Scor $scor)
    {
        //
    }
}
