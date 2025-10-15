@extends('layouts.backend.master')

@section('content')
<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tambah Aspirasi</div>
                <div class="card-body">
                    <form action="{{ route('aspirasi.store') }}" method="POST">
                        @csrf

                        <input type="hidden" name="pelaporan_id" class="form-controll @error('pelaporan_id') is-invalid @enderror" value="{{ $pelaporan->id }}">



                        <div class="row mb-3">
                            <label for="status" class="col-md-4 col-form-label text-md-end">{{ __('status') }}</label>

                            <div class="col-md-6">

                                <select name="status" id="" class="form-control">
                                    <option value="Pilih Status" selected disabled> Pilih Status</option>
                                    <option value="pending"> Pending</option>
                                    <option value="proses">Proses</option>
                                    <option value="selesai">Selesai</option>

                                </select>

                                @error('status')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="feedback" class="col-md-4 col-form-label text-md-end">{{ __('Feedback') }}</label>

                            <div class="col-md-6">
                                <textarea name="feedback" id="feedback" cols="45" rows="10">{{ old('feedback') }}</textarea>

                                @error('feedback')
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