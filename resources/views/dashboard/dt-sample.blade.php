@extends('layout')

@section('title', 'Dashboard')

@section('content')

        <x-dtSampleCreate
        :dataVariabel="$dataVariabel"
        :dataSample="$dataSample"
        :samplesVariabel="$samplesVariabel"
        :samplesUji="$samplesUji"
        />

                                @foreach ($dataVariabel as $v)
                                    <x-dataSampleEdit :data="$v" />
                                @endforeach

                                <div class="navbar-collapse" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
                                    <h2>Data Sample</h2>
                                </div>

                                <!-- Tabel Sample dengan status "Variabel" -->
                                <div class="mb-3" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-delay="200">
                                    <a data-bs-toggle="modal" data-bs-target="#create-sv" class="btn btn-secondary m-1">Tambah Sample Variabel</a>
                                </div>
                                <div class="card mb-4" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-delay="300">
                                    <div class="card-body">
                                        <div class="table-responsive mt-2">
                                            <h4>Data Sample - Variabel</h4>
                                            @php
    $no = 1;
    $variabelLatih = $dataVariabel->where('status', 'Variabel');
    $samplesLatih = $dataSample->filter(function ($sample) use ($variabelLatih) {
        return $sample->data->pluck('id_variabel')->intersect($variabelLatih->pluck('id'))->isNotEmpty();
    });
                                            @endphp
                                            @if ($samplesLatih->isEmpty())
                                                <div class="alert alert-danger mt-3 w-100 text-center">Data belum ada.</div>
                                            @else
                                                <table class="table mb-0 text-nowrap varient-table align-middle fs-3">
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
                                                        @foreach ($samplesLatih as $sample)
                                                            <tr>
                                                                <td>{{ $no++ }}</td>
                                                                @foreach ($variabelLatih as $v)
                                                                    @php
                $data = $sample->data->firstWhere('id_variabel', $v->id);
                                                                    @endphp
                                                                    <td>
                                                                        {{ $data->nilai ?? '-' }}
                                                                    </td>
                                                                @endforeach
                                                                <td class="text-center">
                                                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                                        action="{{ route('dataSample.destroy', $sample->id) }}" method="POST">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <a href="{{ route('dataVariabel.show', $sample->id) }}"
                                                                            class="btn btn-sm btn-success"><i class="ti ti-eye"></i></a>
                                                                        <a class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                                                            data-bs-target="#edit{{ $sample->id }}"><i class="ti ti-edit"></i></a>
                                                                        <button type="submit" class="btn btn-sm btn-danger"><i class="ti ti-trash"></i></button>
                                                                    </form>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            @endif
                                        </div>
                                    </div>
                                </div>


                                <!-- Tabel Sample dengan status "Variabel Uji" -->
                                <div class="mb-3" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-delay="200">
                                    <a data-bs-toggle="modal" data-bs-target="#create-su" class="btn btn-secondary m-1">Tambah Sample Uji</a>
                                </div>
                                <div class="card" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-delay="300">
                                    <div class="card-body">
                                        <h4>Data Sample - Variabel Uji</h4>
                                        <div class="table-responsive mt-2">
                                            @php
    $no = 1;
    $variabelUji = $dataVariabel->where('status', 'Variabel Uji');
    $samplesUji = $dataSample->filter(function ($sample) use ($variabelUji) {
        return $sample->data->pluck('id_variabel')->intersect($variabelUji->pluck('id'))->isNotEmpty();
    });
                                            @endphp
                                            @if ($samplesUji->isEmpty())
                                                <div class="alert alert-warning mt-3 w-100 text-center">Data belum ada.</div>
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
                                                        @foreach ($samplesUji as $sample)
                                                            <tr>
                                                                <td>{{ $no++ }}</td>
                                                                @foreach ($variabelUji as $v)
                                                                    @php
                $data = $sample->data->firstWhere('id_variabel', $v->id);
                                                                    @endphp
                                                                    <td>
                                                                        {{ $data->nilai ?? '-' }}
                                                                    </td>
                                                                @endforeach
                                                                <td class="text-center">
                                                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                                        action="{{ route('dataSample.destroy', $sample->id) }}" method="POST">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <a href="{{ route('dataVariabel.show', $sample->id) }}"
                                                                            class="btn btn-sm btn-success"><i class="ti ti-eye"></i></a>
                                                                        <a class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                                                            data-bs-target="#edit{{ $sample->id }}"><i class="ti ti-edit"></i></a>
                                                                        <button type="submit" class="btn btn-sm btn-danger"><i class="ti ti-trash"></i></button>
                                                                    </form>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                @stack('modals')
@endsection
