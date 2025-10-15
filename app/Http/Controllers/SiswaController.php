<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Pelaporan;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siswas = Siswa::latest()->get();
        return view('siswa.index', compact('siswas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('siswa.create');
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
            'nisn' => 'required',
            'nama' => 'required',
            'alamat' => 'required',

        ]);

        Siswa::create([
            'nisn' => $request->get('nisn'),
            'nama' => $request->get('nama'),
            'alamat' => $request->get('alamat'),
        ]);
        return redirect('siswa')->with('message', 'Siswa berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        $nama=Siswa::find($id);
        $laporan = Pelaporan::where('siswa_id', $id)->get();
        return view('detail', compact('laporan','nama'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $siswa = Siswa::find($id);
        return view('siswa.edit', compact('siswa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nisn' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
        ]);
        $siswa = Siswa::find($id);
        $siswa->nisn = $request->get('nisn');
        $siswa->nama = $request->get('nama');
        $siswa->alamat = $request->get('alamat');
        $siswa->save();

        return redirect('siswa')->with('message', 'Siswa berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $siswa = Siswa::find($id);
        $siswa->delete();

        return redirect('siswa')->with('message', 'Siswa berhasil dihapus');
    }
}
