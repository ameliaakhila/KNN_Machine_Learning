@extends('layout')

@section('title', 'Dashboard')

@section('content')

<x-dtVariableCreate/>

@foreach ($variabels as $row)
    <x-dtVariableEdit :data="$row" />
@endforeach

<div class="navbar-collapse" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
    <h2 class="fs-9 fw-bolder text-primary text-shadow">Data Variabel</h2>
</div>

<div class="card" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-delay="300">
    <div class="card-body">
        <div>
            <a data-bs-toggle="modal" data-bs-target="#dt-create-v" class="btn btn-secondary m-1">Tambah Data</a>
        </div>
        <div class="table-responsive mt-2">
            <div class="d-md-flex align-items-center">
                @if ($variabels->isEmpty())
                    <div class="alert alert-danger mt-3">Data belum ada.</div>
                    @else
                    <table class="table mb-0 text-nowrap varient-table align-middle fs-3">
                        <thead>
                            <tr>
                                <th scope="col" class="px-0 text-muted">No</th>
                                <th scope="col" class="px-0 text-muted">variabel</th>
                                <th scope="col" class="px-0 text-muted">Status</th>
                                <th scope="col" class="px-0 text-muted">Kategori</th>
                                <th scope="col" class="px-0 text-muted text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($variabels as $row)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $row->variabel }}</td>
                                    <td>{{ $row->status }}</td>
                                    <td>{!! $row->keterangan !!}</td>
                                    <td class="text-center">
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                        action="{{ route('dataVariabel.destroy', $row->id) }}" method="POST">
                                        <a class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#edit{{ $row->id }}"><i class="ti ti-edit"></i></a>
                                        @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger"><i class="ti ti-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5">
                                        <div class="alert alert-danger text-center m-0">
                                            Data belum ada.
                                        </div>
                                    </td>
                                </tr>
                            @endempty
                        </tbody>
                    </table>
                    {{ $variabels->links() }}
                @endif
            </div>
        </div>
    </div>
    @stack('modals')
@endsection
