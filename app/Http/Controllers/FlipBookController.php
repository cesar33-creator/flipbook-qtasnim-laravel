<?php

namespace App\Http\Controllers;

use App\Models\FlipBook;
use Illuminate\Http\Request;

class FlipBookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function KodeEtik()
    {
        //
        return view('FlipBook.KodeEtik.KodeEtik');
    }


    /**
     * Display a listing of the resource.
     */
    public function SOP()
    {
        //
        return view('FlipBook.SOP.SOP');
    }


    /**
     * Display a listing of the resource.
     */
    public function Company()
    {
        //
        return view('FlipBook.Company.Company');
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
    public function show(FlipBook $flipBook)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FlipBook $flipBook)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FlipBook $flipBook)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FlipBook $flipBook)
    {
        //
    }
}
