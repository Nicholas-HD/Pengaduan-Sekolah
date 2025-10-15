@extends('layouts.backend.master')

@section('title')
Data Siswa
@endsection

@section('content')

<div class="col-md-12">
    <div class="row justify-content-center">
        @if (Session::has('message'))
        <div class="alert alert-success">
            {{ Session::get('message') }}
        </div>
        @endif
    </div>
</div>


<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <strong> List Siswa</strong>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered " id="dataTable">

                            <thead>
                                <tr align="center">
                                    <th>No</th>
                                    <th>NISN</th>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr align="center">
                                    <th>No</th>
                                    <th>NISN</th>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>

                            <tbody>
                                @foreach ($siswas as $siswa )
                                <tr>
                                    <th scope="row">{{$siswa->id}}</th>
                                    <td>{{$siswa->nisn}}</td>
                                    <td>{{$siswa->nama}}</td>
                                    <td>{{$siswa->alamat}}</td>
                                    <td align="center"><a href="{{route('siswa.edit',[$siswa->id])}}" class="btn btn-warning">Edit</a>
                                        {{-- <a href="{{route('siswa.show',[$siswa->id])}}" class="btn btn-success">Detail</a> --}}
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal{{ $siswa->id }}">
                                            {{-- <i class="fas fa-trash text-danger"></i> --}}
                                            Delete
                                        </button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal{{ $siswa->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <form action="{{ route('siswa.destroy', [$siswa->id]) }}" method="post">
                                                    @csrf
                                                    {{ method_field('DELETE') }}
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">
                                                                Delete</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Apakah Anda Yakin ?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                                                            <button type="submit" class="btn btn-outline-danger">Delete</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                                @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection