@props(['dataVariabel', 'dataSample', 'samplesVariabel', 'samplesUji'])

<!-- Modal Create -->
<div class="modal fade" id="create-sv" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Sample</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            @php
                $variabel = collect($dataVariabel)->where('status', 'Variabel');
                $samplesLatih = $dataSample->filter(function ($sample) use ($variabel) {
                    return $sample->data->pluck('id_variabel')->intersect($variabel->pluck('id'))->isNotEmpty();
                });
            @endphp
            <div class="modal-body">
                @if ($samplesLatih->isEmpty())
                    <div class="alert alert-danger mt-3 w-100 text-center">Data belum ada.</div>
                @else
                    <form action="{{ route('dataSample.store') }}" method="POST">
                        @csrf
                        @foreach ($variabel as $v)
                            <div class="mb-3">
                                <label for="variabel_{{ $v->id }}" class="form-label">{{ $v->variabel }}</label>
                                <input type="hidden" name="id_variabel[]" value="{{ $v->id }}">
                                <input type="number" class="form-control" id="variabel_{{ $v->id }}" name="nilai[]"
                                    value="{{ old('nilai.' . $loop->index) }}" placeholder="Masukkan angka, contoh: 10 atau 1.5"
                                    required>
                            </div>
                        @endforeach
                        <div class="d-flex justify-content-end">
                            <button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                @endif
            </div>
        </div>
    </div>
</div>
{{-- End Modal Create --}}


<!-- Modal Create -->
<div class="modal fade" id="create-su" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Sample</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            @php
                $variabelUji = $dataVariabel->where('status', 'Variabel Uji');
                $samplesUji = $dataSample->filter(function ($sample) use ($variabelUji) {
                    return $sample->data->pluck('id_variabel')->intersect($variabelUji->pluck('id'))->isNotEmpty();
                });
            @endphp
            <div class="modal-body">
                @if ($samplesUji->isEmpty())
                    <div class="alert alert-danger mt-3 w-100 text-center">Data belum ada.</div>
                @else
                    <form action="{{ route('dataSample.store') }}" method="POST">
                        @csrf
                        @foreach ($variabelUji as $v)
                            <div class="mb-3">
                                <label for="variabel_{{ $v->id }}" class="form-label">{{ $v->variabel }}</label>
                                <input type="hidden" name="id_variabel[]" value="{{ $v->id }}">
                                <input type="number" class="form-control" id="variabel_{{ $v->id }}" name="nilai[]"
                                    value="{{ old('nilai.' . $loop->index) }}" placeholder="Masukkan angka, contoh: 10 atau 1.5"
                                    required>
                            </div>
                        @endforeach
                        <div class="d-flex justify-content-end">
                            <button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                @endif
            </div>
        </div>
    </div>
</div>
{{-- End Modal Create --}}
