@extends('layouts.backend.master')

@section('title')
@endsection

@section('content')


<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <strong> Tambah Kategori</strong>
                </div>
                <div class="card-body">
                    <form action="{{route('kategori.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf



                        <div class="row mb-3">
                            <label for="keterangan" class="col-md-4 col-form-label text-md-end">{{ __('Keterangan') }}</label>

                            <div class="col-md-6">
                                <input id="keterangan" type="text" class="form-control @error('keterangan') is-invalid @enderror" name="keterangan" value="{{ old('keterangan') }}" required autocomplete="keterangan" autofocus>

                                @error('keterangan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>




                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Submit') }}
                                </button>

                                <button type="reset" class="btn btn-warning">Reset</button>




                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection