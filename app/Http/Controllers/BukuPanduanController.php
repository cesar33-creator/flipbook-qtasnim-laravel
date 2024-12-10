<?php

namespace App\Http\Controllers;

use App\Models\BukuPanduan;
use Illuminate\Http\Request;

class BukuPanduanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('BukuPanduan');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(BukuPanduan $bukuPanduan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BukuPanduan $bukuPanduan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BukuPanduan $bukuPanduan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BukuPanduan $bukuPanduan)
    {
        //
    }
}
