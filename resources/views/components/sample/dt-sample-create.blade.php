@props(['dataVariabel'])

{{--! ===================== MODAL CREATE SAMPLE LATIH ===================== --}}
<div class="modal fade" id="create-sv" tabindex="-1" aria-labelledby="modalCreateLatih" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalCreateLatih">Tambah Data Sample Latih</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            @php
                $variabelLatih = collect($dataVariabel)->where('status', 'Variabel Latih');
            @endphp

            <div class="modal-body">
                @if ($variabelLatih->isEmpty())
                    <div class="alert alert-danger text-center">Belum ada data variabel latih.</div>
                @else
                    <form action="{{ route('dataSample.store') }}" method="POST">
                        @csrf
                        @foreach ($variabelLatih as $v)
                            <div class="mb-3">
                                <label for="variabel_{{ $v->id }}" class="form-label">{{ $v->variabel }}</label>
                                <input type="hidden" name="id_variabel[]" value="{{ $v->id }}">
                                <input type="hidden" name="id_data[]" value="{{ $v->id }}">
                                <input type="number" step="any" class="form-control" id="variabel_{{ $v->id }}" name="nilai[]"
                                    value="{{ old('nilai.' . $loop->index) }}" placeholder="Contoh: 10 atau 1.5" required>
                            </div>
                        @endforeach

                        <div class="mb-3">
                            <label class="form-label">Class</label>
                            <input type="text" class="form-control" name="class" placeholder="Masukkan nama class" required>
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                @endif
            </div>
        </div>
    </div>
</div>

{{--! ===================== MODAL CREATE SAMPLE UJI ===================== --}}
<div class="modal fade" id="create-su" tabindex="-1" aria-labelledby="modalCreateUji" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalCreateUji">Tambah Data Sample Uji</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            @php
                $variabelUji = collect($dataVariabel)->where('status', 'Variabel Uji');
            @endphp

            <div class="modal-body">
                @if ($variabelUji->isEmpty())
                    <div class="alert alert-danger text-center">Belum ada data variabel uji.</div>
                @else
                    <form action="{{ route('dataSample.store') }}" method="POST">
                        @csrf
                        @foreach ($variabelUji as $v)
                            <div class="mb-3">
                                <label for="uji_{{ $v->id }}" class="form-label">{{ $v->variabel }}</label>
                                <input type="hidden" name="id_variabel[]" value="{{ $v->id }}">
                                <input type="hidden" name="id_data[]" value="{{ $v->id }}">
                                <input type="number" step="any" class="form-control" id="uji_{{ $v->id }}" name="nilai[]"
                                    value="{{ old('nilai.' . $loop->index) }}" placeholder="Contoh: 10 atau 1.5" required>
                            </div>
                        @endforeach

                        <div class="mb-3">
                            <label class="form-label">Class</label>
                            <input type="text" class="form-control" name="class" placeholder="Masukkan nama class" required>
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                @endif
            </div>
        </div>
    </div>
</div>
