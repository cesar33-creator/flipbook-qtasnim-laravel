<?php

namespace App\Http\Controllers;

use App\Models\ManagementRoles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ManagementRolesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Ambil query pencarian dari parameter URL
        $search = $request->get('search', ''); // Default ke string kosong jika tidak ada pencarian

        // Jika ada parameter pencarian, filter data berdasarkan nama 'roles'
        if ($search) {
            $roles = DB::table('roles')
                ->where('roles', 'like', "%{$search}%")
                ->get();
        } else {
            // Jika tidak ada pencarian, ambil semua data
            $roles = DB::table('roles')->get();
        }

        // Tampilkan view dengan data roles dan parameter pencarian
        return view('ManagementRoles.index', compact('roles'))->with('search', $search);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = DB::table('roles')->get();
        // dd('create');
        return view('ManagementRoles/create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input data
        try {
            $query = DB::table('roles')->insert([
                'id' => $request->id,
                'roles' => $request->roles,
            ]);


            return  redirect('ManagementRoles')->with('status', 'Data Roles berhasil ditambah..');
        } catch (\Illuminate\Database\QueryException $ex) {
            return  redirect('ManagementRoles')->with('status', $ex);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
        $roles = DB::table('roles')->get();
        return view('ManagementRoles.show', compact('roles'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $roles = DB::table('roles')->where('id', $id)->first();
        return  view('ManagementRoles/edit', compact('roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // dd('update');
        try {
            $affected = DB::table('roles')->where('id', $id)
                ->update([
                    'id' => $request->id,
                    'roles' => $request->roles
                ]);
            return  redirect('/ManagementRoles')->with('status', 'Data Roles Berhasil diubah..');
        } catch (\Illuminate\Database\QueryException $ex) {
            return  redirect('/ManagementRoles')->with('status', 'Data Roles Gagal diubah..');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $roles = DB::table('roles')->where('id', $id)->delete();
        return  redirect('/ManagementRoles')->with('status', 'Data Roles berhasil dihapus..');
    }
}
