@extends('layout')

@section('title', 'Dashboard')

@section('content')
    {{--! Komponen Form Tambah Sample --}}
    <x-dtSampleCreate :dataVariabel="$dataVariabel" :dataSample="$dataSample" :samplesVariabel="$samplesVariabel"
        :samplesUji="$samplesUji" />

    {{--! Komponen Detail Sample --}}
    @foreach ($dataSample as $row)
        <x-dtSampleDetail :data="$row" />
    @endforeach

    {{--! Komponen Edit Sample --}}
    @foreach ($dataSample as $row)
        <x-dtSampleEdit :data="$row" />
    @endforeach

    <div class="navbar-collapse" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
        <h2 class="fs-9 fw-bolder text-primary text-shadow">Data Sample</h2>
    </div>

    {{--! ======================= TABEL VARIABEL LATIH ======================= --}}
    <div class="card shadow-sm mb-4" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-delay="300">
        <div class="card-body">
            <div class="table-responsive mt-2">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="mb-0 fw-bolder text-info">Data Sample - Variabel Latih</h4>
                    <a data-bs-toggle="modal" data-bs-target="#create-sv" class="btn btn-secondary">
                        Tambah Sample Variabel Latih
                    </a>
                </div>

                @php
                    $no = 1;
                    $variabelLatih = $dataVariabel->where('status', 'Variabel');
                    $samplesLatih = $dataSample->filter(function ($sample) use ($variabelLatih) {
                        return $sample->data->pluck('id_variabel')->intersect($variabelLatih->pluck('id'))->isNotEmpty();
                    });
                @endphp

                @if ($variabelLatih->isEmpty())
                    <tr>
                        <td colspan="{{ $variabelLatih->count() + 2 }}">
                            <div class="alert alert-danger mt-2 text-center mb-0">Data belum ada.</div>
                        </td>
                    </tr>
                @else
                    <table class="table mb-0 text-nowrap varient-table align-middle fs-3 shadow">
                        <thead>
                            <tr>
                                <th>No</th>
                                @foreach ($variabelLatih as $v)
                                    <th>{{ $v->variabel }}</th>
                                @endforeach
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($samplesLatih->isEmpty())
                                <tr>
                                    <td colspan="{{ $variabelLatih->count() + 2 }}">
                                        <div class="alert alert-danger mt-2 text-center mb-0">Data belum ada.</div>
                                    </td>
                                </tr>
                            @else
                                @foreach ($samplesLatih as $sample)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        @foreach ($variabelLatih as $v)
                                            @php
                                                $data = $sample->data->firstWhere('id_variabel', $v->id);
                                            @endphp
                                            <td>{{ $data->nilai ?? '-' }}</td>
                                        @endforeach
                                        <td class="text-center">
                                            <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                action="{{ route('dataSample.destroy', $sample->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')

                                                <a class="btn btn-sm btn-success" data-bs-toggle="modal"
                                                    data-bs-target="#detail-s{{ $sample->id }}">
                                                    <i class="ti ti-eye"></i>
                                                </a>

                                                <a class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                                    data-bs-target="#edit-s{{ $sample->id }}">
                                                    <i class="ti ti-edit"></i>
                                                </a>

                                                <button type="submit" class="btn btn-sm btn-danger">
                                                    <i class="ti ti-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>

    {{--! ======================= TABEL VARIABEL UJI ======================= --}}
    <div class="card shadow-sm" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-delay="300">
        <div class="card-body">
            <div class="table-responsive mt-2">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="mb-0 fw-bolder text-info">Data Sample - Variabel Uji</h4>
                    <a data-bs-toggle="modal" data-bs-target="#create-su" class="btn btn-secondary">
                        Tambah Sample Variabel Uji
                    </a>
                </div>

                @php
                    $noUji = 1;
                    $variabelUji = $dataVariabel->where('status', 'Variabel Uji');
                    $samplesUji = $dataSample->filter(function ($sample) use ($variabelUji) {
                        return $sample->data->pluck('id_variabel')->intersect($variabelUji->pluck('id'))->isNotEmpty();
                    });
                @endphp

                @if ($variabelUji->isEmpty())
                    <tr>
                        <td colspan="{{ $variabelUji->count() + 2 }}">
                            <div class="alert alert-danger mt-2 text-center mb-0">Data belum ada.</div>
                        </td>
                    </tr>
                @else
                    <table class="table mb-0 text-nowrap varient-table align-middle fs-3">
                        <thead>
                            <tr>
                                <th>No</th>
                                @foreach ($variabelUji as $v)
                                    <th>{{ $v->variabel }}</th>
                                @endforeach
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($samplesUji->isEmpty())
                                <tr>
                                    <td colspan="{{ $variabelUji->count() + 2 }}">
                                        <div class="alert alert-danger mt-2 text-center mb-0">Data belum ada.</div>
                                    </td>
                                </tr>
                            @else
                                @foreach ($samplesUji as $sample)
                                    <tr>
                                        <td>{{ $noUji++ }}</td>
                                        @foreach ($variabelUji as $v)
                                            @php
                                                $data = $sample->data->firstWhere('id_variabel', $v->id);
                                            @endphp
                                            <td>{{ $data->nilai ?? '-' }}</td>
                                        @endforeach
                                        <td class="text-center">
                                            <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                action="{{ route('dataSample.destroy', $sample->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')

                                                <a class="btn btn-sm btn-success" data-bs-toggle="modal"
                                                    data-bs-target="#detail-su{{ $sample->id }}">
                                                    <i class="ti ti-eye"></i>
                                                </a>

                                                <a class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                                    data-bs-target="#edit-su{{ $sample->id }}">
                                                    <i class="ti ti-edit"></i>
                                                </a>

                                                <button type="submit" class="btn btn-sm btn-danger">
                                                    <i class="ti ti-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>

    {{--! Stack untuk modal dinamis --}}
    @stack('modals')
@endsection