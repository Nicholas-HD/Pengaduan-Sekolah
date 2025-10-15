@extends('layouts.backend.master')

@section('content')
<div class="container">
    <div class="row justify-content-center mt-8">
        <div class="col-md-8">
            <div class="card shadow mb-4 my-5">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Tambah Data</h6>
                </div>

                <form action="{{ route('siswa.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">

                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

                            <div class="mb-4 mt-5">
                                <label for="nisn">nisn</label>
                                <input id="nisn" type="text" name="nisn" class="form-control @error('nisn') is-invalid @enderror">

                                @error('nisn')
                                <span>{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="isi">nama</label>
                                <input id="isi" name="nama" class="form-control @error('nama') is-invalid @enderror" cols="30" rows="1"></textarea>

                                @error('nama')
                                <span>{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="alamat">alamat</label>
                                <textarea id="alamat" name="alamat" class="form-control @error('alamat') is-invalid @enderror" cols="10" rows="5"></textarea>

                                @error('alamat')
                                <span>{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- <div class="mb-4">
                            <label>Foto</label>
                            <input type="file" name="foto" class="form-control @error('foto') is-invalid @enderror">

                            @error('foto')
                                <span>{{ $message }}</span>
                            @enderror
                        </div> -->

                            <button type="submit" class="btn btn-primary">Submit</button>
                            <button type="reset" class="btn btn-danger">Reset</button>


                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection