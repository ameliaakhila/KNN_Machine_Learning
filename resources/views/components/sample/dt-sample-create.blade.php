@props(['dataVariabel', 'dataSample', 'samplesVariabel', 'samplesUji'])

{{--! ===================== MODAL CREATE SAMPLE LATIH ===================== --}}
<div class="modal fade" id="create-sv" tabindex="-1" aria-labelledby="modalCreateLatih" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalCreateLatih">Tambah Data Sample</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            @php
                $variabelLatih = collect($dataVariabel)->where('status', 'Variabel');
            @endphp

            <div class="modal-body">
                @if ($variabelLatih->isEmpty())
                    <div class="alert alert-danger mt-3 w-100 text-center">Data belum ada.</div>
                @else
                    <form action="{{ route('dataSample.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            @foreach ($variabelLatih as $v)
                                <label for="variabel_{{ $v->id }}" class="form-label">{{ $v->variabel }}</label>
                                <input type="hidden" name="id_variabel[]" value="{{ $v->id }}">
                                <input type="hidden" name="id_data[]" value="{{ $v->id }}">
                                <input type="number" class="form-control" id="variabel_{{ $v->id }}" name="nilai[]"
                                    value="{{ old('nilai.' . $loop->index) }}" placeholder="Masukkan angka, contoh: 10 atau 1.5"
                                    required>
                            @endforeach
                            <label class="form-label mt-2">Class</label>
                            <input type="text" class="form-control" name="class" placeholder="Masukkan nama class" required>
                        </div>
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
{{--! ===================== END MODAL CREATE SAMPLE LATIH ===================== --}}

{{--! ===================== MODAL CREATE SAMPLE UJI ===================== --}}
<div class="modal fade" id="create-su" tabindex="-1" aria-labelledby="modalCreateUji" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalCreateUji">Tambah Data Sample</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            @php
                $variabelUji = collect($dataVariabel)->where('status', 'Variabel Uji');
            @endphp

            <div class="modal-body">
                @if ($variabelUji->isEmpty())
                    <div class="alert alert-danger mt-3 w-100 text-center">Data belum ada.</div>
                @else
                    <form action="{{ route('dataSample.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            @foreach ($variabelUji as $v)
                                <label for="uji_{{ $v->id }}" class="form-label">{{ $v->variabel }}</label>
                                <input type="hidden" name="id_variabel[]" value="{{ $v->id }}">
                                <input type="hidden" name="id_data[]" value="{{ $v->id }}">
                                <input type="number" class="form-control" id="uji_{{ $v->id }}" name="nilai[]"
                                    value="{{ old('nilai.' . $loop->index) }}" placeholder="Masukkan angka, contoh: 10 atau 1.5"
                                    required>
                            @endforeach
                            <label class="form-label mt-2">Class</label>
                            <input type="text" class="form-control" name="class" placeholder="Masukkan nama class" required>
                        </div>
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
{{--! ===================== END MODAL CREATE SAMPLE UJI ===================== --}}