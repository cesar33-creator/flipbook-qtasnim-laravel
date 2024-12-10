<?php

namespace App\Http\Controllers;

use App\Models\SOP;
use Illuminate\Http\Request;

class SOPController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('SOP');
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
    public function show(SOP $sOP)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SOP $sOP)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SOP $sOP)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SOP $sOP)
    {
        //
    }
}
