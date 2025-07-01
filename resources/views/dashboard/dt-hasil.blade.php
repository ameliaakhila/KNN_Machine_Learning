@extends('layout')

@section('title', 'Dashboard')

@section('content')

    {{-- ! Hasil Nilai Jarak Eucilidean Distance --}}
    <div class="navbar-collapse" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
        <h2 class="fs-9 fw-bolder text-primary text-shadow">Data Hasil Distance</h2>
    </div>
    <div class="card" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-delay="300">
        <div class="card-body">
            @if (empty($results) || empty($samplesUji))
                <div class="alert alert-danger mt-3 text-center">
                    Data jarak belum tersedia. Pastikan variabel latih dan variabel uji sudah dimasukkan.
                </div>
            @else
                {{--! table --}}
                <div class="table-responsive fs-4 mt-2">
                    <div class="d-md-flex align-items-center">
                        @if (empty($samplesUji))
                            <div class="alert alert-danger mt-3 w-100 text-center">Data belum ada.</div>
                        @else
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="text-info">No</th>
                                        @foreach ($samplesUji as $latihId => $dataUji)
                                            <th class="text-info">Data Uji {{ $loop->iteration }}</th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($results as $latihId => $baris)
                                        <tr>
                                            <td>{{ $latihId + 1 }}</td>
                                            @foreach ($baris as $value)
                                                <td>{{ round($value, 6) }}</td>
                                            @endforeach
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
            @endif
        </div>

    </div>



    {{-- ! Hasil Klasifikasi Distance --}}
    <div class="navbar-collapse" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
        <h2 class="fs-9 fw-bolder text-primary text-shadow">Data Klasifikasi</h2>
    </div>

    {{-- <div class="card" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-delay="300">
        <div class="card-body">
            @if (empty($samplesUji) || empty($klasifikasi))
            <div class="alert alert-warning mt-3 text-center">
                Data klasifikasi belum tersedia. Silakan lakukan perhitungan klasifikasi.
            </div>
            @else
            {{-- tabel --}}
            {{-- <div class="table-responsive mt-2 fs-4">
                <div class="d-md-flex align-items-center">
                    @if (empty($samplesUji) || empty($results))
                    <div class="alert alert-danger mt-3 w-100 text-center">
                        Data klasifikasi belum tersedia. Silakan lakukan perhitungan klasifikasi.
                    </div>
                    @else
                    <table class="table table-warning table-striped mt-4">
                        <thead class="text-center align-middle">
                            <tr>
                                <th class="text-primary fw-bolder">No</th>
                                @foreach ($samplesUji as $ujiId => $dataUji)
                                <th class="text-primary fw-bolder">Data Uji {{ $loop->iteration }}</th>
                                @endforeach

                            </tr>
                        </thead>
                        <tbody class="text-center align-middle">
                            @foreach ($results as $latihIndex => $baris)
                            <tr>
                                <td class="text-primary fw-bolder"><strong>{{ $latihIndex + 1 }}</strong></td>
                                @foreach ($baris as $value)
                                <td class="text-info">{{ round($value, 6) }}</td>
                                @endforeach
                            </tr>
                            @endforeach
                            <tr>
                                <td class="text-primary fw-bolder"><strong>Hasil Klasifikasi</strong></td>
                                @foreach ($samplesUji as $ujiId => $dataUji)
                                <td class="text-primary fw-bolder">
                                    <strong>{{ $klasifikasi[$ujiId] ?? '-' }}</strong>
                                </td>
                                @endforeach
                            </tr>
                        </tbody>
                    </table>
                    @endif

                </div>
            </div>

            @php
            $filteredKlasifikasi = array_filter($klasifikasi, fn($value) => is_string($value) || is_int($value));
            $frekuensi = array_count_values($filteredKlasifikasi);
            $hasilTerbanyak = $frekuensi ? array_keys($frekuensi, max($frekuensi))[0] : '-';
            @endphp
            @if (!empty($frekuensi))
            <h4 class="text-center text-info mt-4">
                Hasil Klasifikasinya yang Paling Sering Muncul Adalah:
                <span class="badge bg-primary fs-5">{{ $hasilTerbanyak }}</span>
            </h4>
            @else
            <div class="alert alert-info text-center mt-4">Belum ada hasil klasifikasi untuk ditampilkan.</div>
            @endif
            @endif
        </div> --}}
        {{--
    </div> --}}

    <div class="card" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-delay="300">
        <div class="card-body">
            @if (empty($samplesUji) || empty($klasifikasi))
                <div class="alert alert-warning mt-3 text-center">
                    Data klasifikasi belum tersedia. Silakan lakukan perhitungan klasifikasi.
                </div>
            @else
                {{-- tabel --}}
                <div class="table-responsive mt-2 fs-4">
                    <div class="d-md-flex align-items-center">
                        @if (empty($samplesUji) || empty($results))
                            <div class="alert alert-danger mt-3 w-100 text-center">
                                Data klasifikasi belum tersedia. Silakan lakukan perhitungan klasifikasi.
                            </div>
                        @else

                            <table class="table table-warning table-striped mt-4">
                                <thead class="text-center align-middle">
                                    <tr>
                                        <th class="text-primary fw-bolder">No</th>
                                        @foreach ($samplesUji as $ujiId => $dataUji)
                                            <th class="text-primary fw-bolder">Data Uji {{ $loop->iteration }}</th>
                                        @endforeach
                                        @foreach ($samplesUji as $ujiId => $dataUji)
                                            <th class="text-success fw-bolder">Ranking ke Uji {{ $loop->iteration }}</th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody class="text-center align-middle">
                                    @foreach ($results as $latihIndex => $baris)
                                        <tr>
                                            <td class="text-primary fw-bolder"><strong>{{ $latihIndex + 1 }}</strong></td>
                                            {{-- Nilai Jarak --}}
                                            @foreach ($baris as $value)
                                                <td class="text-info">{{ round($value, 6) }}</td>
                                            @endforeach

                                            {{-- Urutan jarak --}}
                                            @foreach (range(0, count($samplesUji) - 1) as $ujiIndex)
                                                <td class="text-success">{{ $urutanJarak[$latihIndex][$ujiIndex] ?? '-' }}</td>
                                            @endforeach
                                        </tr>
                                    @endforeach

                                    {{-- Baris Hasil Klasifikasi --}}
                                    <tr>
                                        <td class="text-primary fw-bolder"><strong>Hasil Klasifikasi</strong></td>
                                        @foreach ($samplesUji as $ujiId => $dataUji)
                                            <td class="text-primary fw-bolder" colspan="1">
                                                <strong>{{ $klasifikasi[$ujiId] ?? '-' }}</strong>
                                            </td>
                                        @endforeach
                                        @foreach (range(0, count($samplesUji) - 1) as $ujiIndex)
                                            @php
            // Ambil urutan untuk semua data latih terhadap satu data uji
            $kolomUrutan = array_column($urutanJarak, $ujiIndex);
            // Cari index (baris latih) dengan urutan = 1
            $firstIndex = array_search(1, $kolomUrutan);
                                            @endphp
                                            <td class="text-success fw-bolder">No
                                                ({{ $firstIndex !== false ? $firstIndex + 1 : '-' }})
                                            </td>
                                        @endforeach
                                    </tr>
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>

                @php
    $filteredKlasifikasi = array_filter($klasifikasi, fn($value) => is_string($value) || is_int($value));
    $frekuensi = array_count_values($filteredKlasifikasi);
    $hasilTerbanyak = $frekuensi ? array_keys($frekuensi, max($frekuensi))[0] : '-';
                @endphp
                @if (!empty($frekuensi))
                    <h4 class="text-center text-info mt-4">
                        Hasil Klasifikasinya yang Paling Sering Muncul Adalah:
                        <span class="badge bg-primary fs-5">{{ $hasilTerbanyak }}</span>
                    </h4>
                @else
                    <div class="alert alert-info text-center mt-4">Belum ada hasil klasifikasi untuk ditampilkan.</div>
                @endif
            @endif
        </div>
    </div>

    @if (isset($persenAkurasi))
        <div class="navbar-collapse" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
            <h2 class="fs-9 fw-bolder text-primary text-shadow">📈 Evaluasi Klasifikasi</h2>
        </div>

        <div class="card" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-delay="300">
            <div class="card-body">
                <ul class="list-group list-group-flush fs-5">
                    <li class="list-group-item">
                        <h3 class="text-success">
                            <strong class="text-info">Akurasi:</strong> {{ $persenAkurasi }}%
                        </h3>
                    </li>
                    <li class="list-group-item">
                        <h3 class="text-success">
                            <strong class="text-info">Presisi:</strong> {{ $persenPresisi }}%
                        </h3>
                    </li>
                    <li class="list-group-item">
                        <h3 class="text-success">
                            <strong class="text-info">Recall:</strong> {{ $persenRecall }}%
                        </h3>
                    </li>
                </ul>
            </div>
        </div>
    @endif

    {{-- ! Diagram Hasil Klasifikasi Distance --}}
    <div class="navbar-collapse" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
        <h2 class="fs-9 fw-bolder text-primary text-shadow">Data Hasil Distance</h2>
    </div>

    <div class="card" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-delay="300">
        <div class="card-body">
            <div class="d-md-flex justify-content-between align-items-center mb-3">
                <div>
                    <h4 class="card-title fw-bolder mb-0">Jarak Data</h4>
                </div>
                <ul class="list-inline mb-0">
                    <li class="list-inline-item text-primary">
                        <span class="d-inline-block rounded-circle me-1 bg-primary"
                            style="width: 10px; height: 10px;"></span>
                        Jarak Data
                    </li>
                </ul>
            </div>
            @if (!empty($jumlahPerClass) && count($jumlahPerClass) > 0)
                <div id="overview" data-categories='@json(array_keys($jumlahPerClass))'
                    data-values='@json(array_values($jumlahPerClass))' class="mt-4" style="min-height: 300px;">
                </div>
            @else
                <div class="alert alert-danger text-center mt-4 mb-0" role="alert">
                    Data untuk chart <strong>Jarak Data</strong> belum tersedia.
                </div>
            @endif
        </div>
    </div>


    @stack('modals')
@endsection
