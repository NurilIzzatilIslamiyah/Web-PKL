<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $siswa = Siswa::latest()->paginate(5);

        return view('siswa.index', compact('siswa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('siswa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Siswa $siswa)
    {
        $this->validate($request, [
            'nama'     => 'required',
            'kelas'     => 'required',
   ]);


       $siswa->create([
           'nama'=>$request->nama,
           'kelas'=>$request->kelas,
       ]);

       // dd($Murid);

       //redirect to index
       return redirect()->route('siswa.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Siswa $siswa)
    {
        return view('siswa.edit', compact('siswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Siswa $siswa)
    {
        $this->validate($request, [
            'nama'     => 'required',
            'kelas'     => 'required',
        ]);

        $data = [
            'nama' => $request->nama,
            'kelas' => $request->kelas,
        ];

        $siswa->update([
        'nama'=>$request->input('nama'),
        'kelas'=>$request->input('kelas'),

        ]);

        //redirect to index
        return redirect()->route('siswa.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Siswa $siswa)
    {
        $siswa->delete();

        return redirect()->route('siswa.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
