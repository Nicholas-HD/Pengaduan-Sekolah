@extends('layouts.backend.master')

@section('content')

<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">List <span class="text-primary">Pelaporan</span></h4>
                </p>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th> No. </th>
                                <th> NISN </th>
                                <th> Kategori </th>
                                <th> Lokasi </th>
                                <th> Keterangan </th>
                                <th class="text-success"> Tanggapan </th>
                                <th class="text-danger"> Delete </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pelaporans as $key => $pelaporan)
                            <tr>
                                <td class="py-1">{{ $key + 1 }}</td>
                                <td>{{ $pelaporan->siswa->nisn }}</td>
                                <td>{{ $pelaporan->kategori->keterangan }}</td>
                                <td>{{ $pelaporan->lokasi }}</td>
                                <td>{{ $pelaporan->keterangan }}</td>

                                <td> <a href="{{ route('pelaporan.show', [$pelaporan->id]) }}"><button type="submit" class="btn btn-outline-success btn-fw">Beri Tanggapan</button></a></td>

                                <td>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-white" data-toggle="modal" data-target="#exampleModal{{ $pelaporan->id }}">
                                        <i class="fas fa-trash text-danger"></i>
                                    </button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal{{ $pelaporan->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <form action="{{ route('pelaporan.destroy', [$pelaporan->id]) }}" method="post">
                                                @csrf
                                                {{ method_field('DELETE') }}
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">
                                                            Modal
                                                            title</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Apakah Anda Yakin ingin menghapus data ini ?
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
    @endsection
    d