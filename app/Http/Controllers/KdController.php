<?php

namespace App\Http\Controllers;

use App\Http\Requests\KdRequest;
use App\Models\Kd;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class KdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $query = Kd::query();


            return DataTables::of($query)
                ->addColumn('action', function ($item) {
                    return '
                        <a class="inline-block border border-yellow-500 bg-yellow-500 text-white rounded-md px-2 py-1 m-1 transition duration-500 ease select-none hover:bg-yellow-800 focus:outline-none focus:shadow-outline" 
                            href="' . route('dashboard.kd.edit', $item->id) . '">
                            Edit
                        </a>
                        
                        <form class="inline-block" action="' . route('dashboard.kd.destroy', $item->id) . '" method="POST">
                        <button class="border border-red-500 bg-red-500 text-white rounded-md px-2 py-1 m-2 transition duration-500 ease select-none hover:bg-red-600 focus:outline-none focus:shadow-outline" >
                            Hapus
                        </button>
                            ' . method_field('delete') . csrf_field() . '
                        </form>
                        ';
                })
                ->rawColumns(['action'])
                ->make();
        }

        return view('pages.dashboard.kd.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.dashboard.kd.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KdRequest $request)
    {
        $data = $request->all();

        Kd::create($data);

        return redirect()->route('dashboard.kd.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kd  $kd
     * @return \Illuminate\Http\Response
     */
    public function show(Kd $kd)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kd  $kd
     * @return \Illuminate\Http\Response
     */
    public function edit(Kd $kd)
    {
        return view('pages.dashboard.kd.edit', ['item' => $kd]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kd  $kd
     * @return \Illuminate\Http\Response
     */
    public function update(KdRequest $request, Kd $kd)
    {
        $data = $request->all();

        $kd->update($data);

        return redirect()->route('dashboard.kd.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kd  $kd
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kd $kd)
    {
        $kd->delete();

        return redirect()->route('dashboard.kd.index');
    }
}
