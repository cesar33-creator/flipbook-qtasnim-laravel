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
        // Validasi input data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        try {
            // Menyimpan data ke database
            DB::table('users')->insert([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password), // Enkripsi password
                'Roles' => $request->roles, // Uncomment jika ingin menambahkan kolom roles
                'Photo' => $request->photo // Uncomment jika ingin menambahkan kolom photo
            ]);

            // Redirect dengan pesan sukses
            return redirect('/ManagementUsers')->with('status', 'Data Users berhasil ditambahkan.');
        } catch (\Exception $ex) {
            // Redirect dengan pesan error
            return redirect('/ManagementUsers')->with('status', 'Gagal menambahkan data: ' . $ex->getMessage());
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
