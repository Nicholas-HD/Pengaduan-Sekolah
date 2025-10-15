<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Aspirasi;
use App\Models\Pelaporan;

class AspirasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aspirasis = Aspirasi::latest()->get();
        return view('aspirasi', compact('aspirasis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('aspirasi.create');
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
            'pelaporan_id' => 'required',
            'status' => 'required',
            'feedback' => 'required',
        ]);

        Aspirasi::create([
            'pelaporan_id' => $request->get('pelaporan_id'),
            'status' => $request->get('status'),
            'feedback' => $request->get('feedback'),
        ]);

        return redirect()->back()->with('message', 'Aspirasi berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pelaporan = Pelaporan::find($id);

        return view('aspirasi.create', compact('pelaporan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $aspirasi = Aspirasi::find($id);
        return view('aspirasi.edit', compact('aspirasi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'pelaporan_id' => 'required',
            'status' => 'required',
            'feedback' => 'required',
        ]);

        $aspirasi = Aspirasi::find($id);
        $aspirasi->pelaporan_id = $request->get('pelaporan_id');
        $aspirasi->status = $request->get('status');
        $aspirasi->feedback = $request->get('feedback');

        return redirect('pelaporan')->with('message', 'Aspirasi berhasil dibuat');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $aspirasi = Aspirasi::find($id);
        $aspirasi->delete();
        return redirect('pelaporan.detail')->with('message', 'Aspirasi berhasil di hapus');
    }
}
