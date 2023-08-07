<?php

namespace App\Http\Controllers;

use App\Models\LowonganPekerjaan;
use App\Http\Requests\StoreLowonganPekerjaanRequest;
use App\Http\Requests\UpdateLowonganPekerjaanRequest;
use Illuminate\Http\Request;

class LowonganPekerjaanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:loker.index')->only('index');
        $this->middleware('permission:loker.create')->only('create', 'store');
        $this->middleware('permission:loker.edit')->only('edit', 'update');
        $this->middleware('permission:loker.destroy')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('loker.index');
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
     * @param  \App\Http\Requests\StoreLowonganPekerjaanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLowonganPekerjaanRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LowonganPekerjaan  $lowonganPekerjaan
     * @return \Illuminate\Http\Response
     */
    public function show(LowonganPekerjaan $lowonganPekerjaan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LowonganPekerjaan  $lowonganPekerjaan
     * @return \Illuminate\Http\Response
     */
    public function edit(LowonganPekerjaan $lowonganPekerjaan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLowonganPekerjaanRequest  $request
     * @param  \App\Models\LowonganPekerjaan  $lowonganPekerjaan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLowonganPekerjaanRequest $request, LowonganPekerjaan $lowonganPekerjaan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LowonganPekerjaan  $lowonganPekerjaan
     * @return \Illuminate\Http\Response
     */
    public function destroy(LowonganPekerjaan $lowonganPekerjaan)
    {
        //
    }
}
