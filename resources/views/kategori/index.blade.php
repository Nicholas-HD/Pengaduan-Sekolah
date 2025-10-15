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
                                    <th>Keterangan</th>
                                    <th>aksi</th>

                                </tr>
                            </thead>
                            <tfoot>
                                <tr align="center">
                                    <th>No</th>
                                    <th>keterangan</th>
                                    <th>aksi</th>

                                </tr>
                            </tfoot>

                            <tbody>
                                @foreach ($kategoris as $kategori )
                                <tr>
                                    <th scope="row">{{$kategori->id}}</th>
                                    <td>{{$kategori->keterangan}}</td>

                                    <td align="center"><a href="{{route('kategori.edit',[$kategori->id])}}" class="btn btn-warning">Edit</a>
                                        {{-- <a href="{{route('kategori.show',[$kategori->id])}}" class="btn btn-success">Detail</a> --}}
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal{{ $kategori->id }}">
                                            {{-- <i class="fas fa-trash text-danger"></i> --}}
                                            Delete
                                        </button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal{{ $kategori->id }}" tabindex="1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <form action="{{ route('kategori.destroy', [$kategori->id]) }}" method="post">
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