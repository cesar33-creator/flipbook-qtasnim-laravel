<?php

namespace App\Http\Controllers;

use App\Models\ManagementUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ManagementUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $user = DB::table('users')->get();
        return view('ManagementUsers.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // dd('create');
        return view('ManagementUsers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd('store');
        try {
            $query = DB::table('users')->insert([
                'Name' => $request->name,
                'Email' => $request->email,
                // 'Roles' => $request->roles,
                // 'Photo' => $request->photo
            ]);


            return  redirect('/ManagamentUsers')->with('status', 'Data Users berhasil ditambah..');
        } catch (\Illuminate\Database\QueryException $ex) {
            return  redirect('/ManagementUsers')->with('status', $ex);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
        $user = DB::table('users')->get();
        return view('ManagementUsers.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $name)
    {
        //
        $user = DB::table('users')->where('Name', $name)->first();
        return  view('ManagementUsers/edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ManagementUsers $managementUsers)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ManagementUsers $managementUsers)
    {
        //
    }
}
