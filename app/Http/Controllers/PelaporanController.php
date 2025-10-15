<?php

namespace App\Http\Controllers;

use App\Models\Pelaporan;
use Illuminate\Http\Request;

class PelaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pelaporans = Pelaporan::latest()->get();
        return view('pelaporan.index', compact('pelaporans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pelaporan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'siswa_id' => 'required',
            'kategori_id' => 'required',
            'lokasi' => 'required',
            'keterangan' => 'required',

        ]);

        Pelaporan::create([
            'siswa_id' => $request->get('siswa_id'),
            'kategori_id' => $request->get('kategori_id'),
            'lokasi' => $request->get('lokasi'),
            'keterangan' => $request->get('keterangan'),
        ]);

        return redirect()->back()->with('message', 'Pelaporan berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pelaporan  $pelaporan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pelaporans = Pelaporan::find($id);
        return view('pelaporan.detail', compact('pelaporans'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pelaporan  $pelaporan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pelaporan = Pelaporan::find($id);
        return view('pelaporan.edit', compact('pelaporan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pelaporan  $pelaporan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'siswa_id' => 'required',
            'kategori_id' => 'required',
            'lokasi' => 'required',
            'keterangan' => 'required',
        ]);

        $pelaporan = Pelaporan::find($id);
        $pelaporan->siswa_id = $request->get('siswa_id');
        $pelaporan->kategrori_id = $request->get('kategori_id');
        $pelaporan->lokasi = $request->get('lokasi');
        $pelaporan->keterangan = $request->get('keterangan');
        $pelaporan->save();

        return redirect('pelporan')->with('message', 'Pelaporan berhasil ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pelaporan  $pelaporan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pelaporan = Pelaporan::find($id);
        $pelaporan->delete();

        return redirect()->route('pelaporan.index')->with('message', 'Pelaporan berhasil dihapus');
    }

    public function print()
    {
        $pelaporans = Pelaporan::get();
        return view('pelaporan.print', compact('pelaporans'));
    }
}
