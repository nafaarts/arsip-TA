<?php

namespace App\Http\Controllers;

use App\Models\TugasAkhir;
use Illuminate\Http\Request;

class TugasAkhirController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tugasAkhir = TugasAkhir::filter()->latest()->paginate(8)->withQueryString();
        // dd($tugasAkhir);
        return view('tugas-akhir.index', compact('tugasAkhir'));
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
     * @param  \App\Models\TugasAkhir  $tugasAkhir
     * @return \Illuminate\Http\Response
     */
    public function show(TugasAkhir $tugasAkhir)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TugasAkhir  $tugasAkhir
     * @return \Illuminate\Http\Response
     */
    public function edit(TugasAkhir $tugasAkhir)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TugasAkhir  $tugasAkhir
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TugasAkhir $tugasAkhir)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TugasAkhir  $tugasAkhir
     * @return \Illuminate\Http\Response
     */
    public function destroy(TugasAkhir $tugasAkhir)
    {
        //
    }
}
