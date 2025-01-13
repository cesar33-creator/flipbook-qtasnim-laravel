<?php

namespace App\Http\Controllers;

use App\Models\UploadFile;
use Illuminate\Http\Request;

class UploadFinanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = UploadFile::where('kategori', 'Finance')->latest()->get();
        return  view('Finance.Finance', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('Finance.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_buku' => ['required', 'max:99',],
            'file_buku' => ['required', 'file'],
            'image_buku' => ['required', 'image', 'file', 'max:5024'],
            'deskripsi_buku' => ['required', 'min:5'],
        ]);

        if ($request->hasFile('file_buku') && $request->hasFile('image_buku')) {
            $file_buku = $request->file('file_buku');
            $file_image = $request->file('image_buku');
            $newFileNameBuku = time() . '-' . $file_buku->getClientOriginalName();
            $newFileNameImage = time() . '-' . $file_image->getClientOriginalName();
            $newFilePathBuku = $file_buku->storeAs('img-store/file', $newFileNameBuku, 'public');
            $newFilePathImage = $file_image->storeAs('img-store/image', $newFileNameImage, 'public');
            $validatedData['file_buku'] = $newFilePathBuku;
            $validatedData['image_buku'] = $newFilePathImage;
        }

        $validatedData['kategori'] = 'Finance'; // Tambahkan kategori

        // try{
        //     UploadFile::create($validatedData);
        //     return redirect('/Finance')->with("Sukses", "File Terkirim Sukses");
        // }
        // catch(\Exception $e){
        //     return redirect('/Finance')->with("Gagal", "File Gagal Terkirim");
        // }
        UploadFile::create($validatedData);
        return redirect('/Finance')->with("Sukses", "File Terkirim Sukses");
    }

    /**
     * Display the specified resource.
     */
    /**
     * Tampilkan detail buku.
     *
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        // Ambil data buku dari database berdasarkan ID
        $data = UploadFile::findOrFail($id);

        // Path lengkap file PDF di storage
        $filePath = storage_path('app/public/' . $data->file_buku);

        // Cek apakah file ada atau tidak
        if (file_exists($filePath)) {
            // Hitung ukuran file dan konversi ke KB, MB, atau GB
            $fileSize = $this->formatSizeUnits(filesize($filePath));
        } else {
            $fileSize = 'File not found';
        }

        // Kirim data ke view
        return view('Finance.show', compact('data', 'fileSize'));
    }

    /**
     * Fungsi untuk mengonversi ukuran file ke B, KB, MB, atau GB.
     *
     * @param int $bytes
     * @param int $precision
     * @return string
     */
    private function formatSizeUnits($bytes, $precision = 2)
    {
        $units = ['B', 'KB', 'MB', 'GB', 'TB'];

        // Hitung eksponen untuk menentukan satuan (KB, MB, dll.)
        $pow = $bytes > 0 ? floor(log($bytes, 1024)) : 0;

        // Konversi ukuran ke satuan yang sesuai
        $bytes /= (1024 ** $pow);

        return round($bytes, $precision) . ' ' . $units[$pow];
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $idbuku)
    {
        //
        $data = UploadFile::findOrFail($idbuku);

        $data->delete();

        return redirect('/Finance')->with('success', 'Data Berhasil Dihapus!');
    }
}
