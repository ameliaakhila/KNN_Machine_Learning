@extends('layout')

@section('title', 'Dashboard')

@section('content')

    <div class="navbar-collapse" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
        <h2>Data Hasil Distance</h2>
    </div>

    <div class="card" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-delay="300">
        <div class="card-body">
            {{-- <div>
                <a data-bs-toggle="modal" data-bs-target="#create-s" class="btn btn-secondary m-1">Tambah Hasil</a>
            </div> --}}
            <div class="table-responsive mt-2">
                <div class="d-md-flex align-items-center">
                    @if ($dataHasil->isEmpty())
                        <div class="alert alert-danger mt-3 w-100 text-center">Data belum ada.</div>
                    @else
                        @php
                            // Ambil semua variabel unik dari dataHasil
                            $uniqueVariabel = $dataHasil->pluck('id_variabel')->unique()->values();

                            // Ambil informasi nama variabel jika tersedia
                            $variabelInfo = $dataHasil->pluck('variabel', 'id_variabel');
                        @endphp
                        <table class="table mb-0 text-nowrap varient-table align-middle fs-3">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    @foreach ($uniqueVariabel as $idVar)
                                        <th>{{ $variabelInfo[$idVar] ?? 'Variabel #' . $idVar }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @php $no = 1; @endphp
                                @foreach ($results as $r)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        @foreach ($dataHasil as $v)
                                            @php
                                                $data = $r['data']->firstWhere('id_variabel', (int) $v->id);
                                            @endphp
                                            <td>
                                                {{ $data['hasil_dist'] ?? '-' }}
                                            </td>
                                        @endforeach
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>

    @stack('modals')
@endsection
