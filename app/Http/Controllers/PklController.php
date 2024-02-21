<?php

namespace App\Http\Controllers;

use App\Models\Pkl;
use App\Models\Siswa;
use App\Models\Dudi;
use Illuminate\Http\Request;

class PklController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pkl = Pkl::latest()->paginate(5);

        return view('pkl.index', compact('pkl'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $siswa = Siswa::all();
        $dudi = Dudi::all();
        return view('pkl.create', compact('siswa', 'dudi'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Pkl $pkl)
    {
        $this->validate($request, [
            'id_siswa'   => 'required',
            'id_dudi'   => 'required',
            'tgl_masuk'   => 'required|date',
        ]);

        Pkl::create([
            'id_siswa'   => $request->input('id_siswa'),
            'id_dudi'   => $request->input('id_dudi'),
            'tgl_masuk'   => $request->input('tgl_masuk'),
        ]);

        return redirect()->route('pkl.index')->with(['success' => 'Pkl Berhasil Disimpan!']);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pkl $pkl)
    {
        $siswa = Siswa::all();
        $dudi = Dudi::all();
        return view('pkl.edit', compact('pkl'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pkl $pkl)
    {
        $this->validate($request, [
            'tgl_keluar'     => 'required',
        ]);

        $data = [
            'tgl_keluar' => $request->tgl_keluar,
        ];

        $pkl->update([
        'tgl_keluar'=>$request->input('tgl_keluar'),
        ]);

        //redirect to index
        return redirect()->route('pkl.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pkl $pkl)
    {
        $pkl->delete();

        return redirect()->route('pkl.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
