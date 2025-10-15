@extends('layouts.backend.master')

@section('content')
<div class="container">
    {{-- @if (Session::has('message'))
            <div class="alert alert-success">
                {{ Session::get('message') }}
</div>
@endif --}}

<div class="row justify-content-center mt-5">
    <div class="col-md 8">



        <div class="container">
            <div class="row justify-content-center mt-5">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <b>Detail pelaporans</b>
                        </div>

                        <div class="card-body">
                            <div class="form-group">

                                Isi pelaporans : <b>{{ $pelaporans->siswa->nisn }}</b><br>
                                Nama Pelapor : <b>{{ $pelaporans->siswa->nama }}</b><br>
                                NIK : <b>{{ $pelaporans->kategori->keterangan }}</b><br>
                                Tanggal pelaporans : <b>{{ $pelaporans->keterangan }}</b><br>
                                Status :
                                @if (empty(App\Models\Aspirasi::where('pelaporan_id',$pelaporans->id)->latest()->first()->status))
                                <b></b>

                                @else
                                <b>{{App\Models\Aspirasi::where('pelaporan_id',$pelaporans->id)->latest()->first()->status}}</b>

                                @endif
                                <br>
                                @foreach (App\Models\Aspirasi::where('pelaporan_id',$pelaporans->id)->get() as $aspirasi )

                                aspirasi :<b>{{$aspirasi->created_at}} _ {{$aspirasi->feedback}}</b>
                                <br>


                                @endforeach

                                <a href="{{route('aspirasi.show',[$pelaporans->id])}}" class="btn btn-primary">beri Aspirasi</a>


                            </div>


                        </div>
                    </div>
                </div>
            </div>

        </div>
        @endsection