<?php

namespace App\Http\Controllers;

use App\Models\ManagementUsers;
use App\Models\ManagementRoles;
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
        // $roles = ManagementRoles::all(); // Menyaring semua roles dari tabel roles

        $roles = DB::table('roles')->get();
        return view('ManagementUsers.create', compact('roles')); // Kirim data roles ke view
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'foto' => 'required|file|mimes:jpg,png,jpeg',
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'idroles' => 'required|exists:roles,id',
            'gender' => 'required|in:Pria,Wanita',
            'phone_number' => 'required|numeric',
            'bio' => 'nullable|string|max:500',
        ]);

        // Upload foto jika ada
        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('photos', 'public');
            $validatedData['foto'] = $path;
        }

        // Hash password sebelum menyimpan
        $validatedData['password'] = bcrypt($validatedData['password']);

        // Simpan data ke database
        ManagementUsers::create($validatedData);

        return redirect('ManagementUsers')->with('status', 'Data berhasil disimpan.');
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
        $roles = DB::table('roles')->get();

        $user = DB::table('users')->where('name', $name)->first();
        return  view('ManagementUsers/edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $name)
    {
        // Validasi input data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,',
            'idroles' => 'required|exists:roles,id', // Update untuk kolom roles
            'gender' => 'required|in:Pria,Wanita', // Validasi gender
            'phone_number' => 'required|numeric',
            'bio' => 'nullable|string|max:500',
            'foto' => 'nullable|file|mimes:jpg,png,jpeg|max:2048', // Validasi untuk foto
        ]);

        try {
            // Ambil data pengguna berdasarkan ID menggunakan Eloquent
            $user = ManagementUsers::findOrFail($name);

            // Jika foto diupload, lakukan proses upload
            if ($request->hasFile('foto')) {
                // Hapus foto lama jika ada
                if ($user->foto && file_exists(public_path('storage/photos/' . $user->foto))) {
                    unlink(public_path('storage/photos/' . $user->foto));
                }

                // Simpan foto baru
                $fotoName = time() . '.' . $request->foto->getClientOriginalExtension();
                $request->foto->storeAs('photos', $fotoName, 'public');
                $validatedData['foto'] = $fotoName; // Menyimpan nama file foto yang baru
            }

            // Update data pengguna di database
            $user->update([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'idroles' => $validatedData['idroles'],
                'gender' => $validatedData['gender'],
                'phone_number' => $validatedData['phone_number'],
                'bio' => $validatedData['bio'],
                'foto' => $validatedData['foto'] ?? $user->foto, // Jika tidak ada foto baru, tetap menggunakan foto lama
            ]);

            // Redirect dengan pesan sukses
            return redirect('ManagementUsers')->with('status', 'Data Users berhasil diperbarui.');
        } catch (\Exception $ex) {
            // Redirect dengan pesan error
            return redirect('ManagementUsers')->with('status', 'Gagal memperbarui data: ' . $ex->getMessage());
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($name)
    {
        try {
            // Ambil data pengguna berdasarkan name
            $user = DB::table('users')->where('name', $name)->first();

            // Pastikan data pengguna ditemukan
            if (!$user) {
                return redirect('/ManagementUsers')->with('status', 'Data pengguna tidak ditemukan.');
            }

            // Hapus foto jika ada
            if (!empty($user->photo) && file_exists(public_path('storage/photos/' . $user->photo))) {
                unlink(public_path('storage/photos/' . $user->photo));
            }

            // Hapus data pengguna dari database
            DB::table('users')->where('name', $name)->delete();

            // Redirect dengan pesan sukses
            return redirect('/ManagementUsers')->with('status', 'Data pengguna berhasil dihapus.');
        } catch (\Exception $ex) {
            // Redirect dengan pesan error
            return redirect('/ManagementUsers')->with('status', 'Gagal menghapus data: ' . $ex->getMessage());
        }
    }
}
