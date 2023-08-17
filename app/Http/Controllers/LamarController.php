<?php

namespace App\Http\Controllers;

use App\Models\lamar;
use App\Http\Requests\StorelamarRequest;
use App\Http\Requests\UpdatelamarRequest;
use Illuminate\Http\Request;

class LamarController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:pelamarkerja.index')->only('index');
        $this->middleware('permission:pelamarkerja.create')->only('create', 'store');
        $this->middleware('permission:pelamarkerja.edit')->only('edit', 'update');
        $this->middleware('permission:pelamarkerja.destroy')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('lamar.index');
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
     * @param  \App\Http\Requests\StorelamarRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorelamarRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\lamar  $lamar
     * @return \Illuminate\Http\Response
     */
    public function show(lamar $lamar)
    {
        return view('lamar.detail');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\lamar  $lamar
     * @return \Illuminate\Http\Response
     */
    public function edit(lamar $lamar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatelamarRequest  $request
     * @param  \App\Models\lamar  $lamar
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatelamarRequest $request, lamar $lamar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\lamar  $lamar
     * @return \Illuminate\Http\Response
     */
    public function destroy(lamar $lamar)
    {
        //
    }
}
