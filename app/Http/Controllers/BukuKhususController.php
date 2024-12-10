<?php

namespace App\Http\Controllers;

use App\Models\BukuKhusus;
use Illuminate\Http\Request;

class BukuKhususController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('BukuKhusus');
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
    public function show(BukuKhusus $bukuKhusus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BukuKhusus $bukuKhusus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BukuKhusus $bukuKhusus)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BukuKhusus $bukuKhusus)
    {
        //
    }
}
