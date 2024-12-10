<?php

namespace App\Http\Controllers;

use App\Models\dashboardKhusus;
use Illuminate\Http\Request;

class dashboardKhususController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('dashboardKhusus');
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
    public function show(dashboardKhusus $dashboardKhusus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(dashboardKhusus $dashboardKhusus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, dashboardKhusus $dashboardKhusus)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(dashboardKhusus $dashboardKhusus)
    {
        //
    }
}
