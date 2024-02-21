<?php

namespace App\Http\Controllers;

use App\Models\Dudi;
use App\Models\Siswa;
use Illuminate\Http\Request;

class DudiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dudi = Dudi::latest()->paginate(5);

        return view('dudi.index', compact('dudi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dudi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Dudi $dudi)
    {
        $this->validate($request, [
            'nama'     => 'required',
            'alamat'     => 'required',
   ]);


       $dudi->create([
           'nama'=>$request->nama,
           'alamat'=>$request->alamat,
       ]);

       // dd($Murid);

       //redirect to index
       return redirect()->route('dudi.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dudi $dudi)
    {
        return view('dudi.edit', compact('dudi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dudi $dudi)
    {
        $this->validate($request, [
            'nama'     => 'required',
            'alamat'     => 'required',
        ]);

        $data = [
            'nama' => $request->nama,
            'alamat' => $request->alamat,
        ];

        $dudi->update([
        'nama'=>$request->input('nama'),
        'alamat'=>$request->input('alamat'),

        ]);

        //redirect to index
        return redirect()->route('dudi.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dudi $dudi)
    {
        $dudi->delete();

        return redirect()->route('dudi.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
