@props(['data'])

{{--! ======================= MODAL EDIT SAMPLE LATIH ======================= --}}
<div class="modal fade" id="edit-s{{ $data->id }}" tabindex="-1" aria-labelledby="modalEditLatihLabel"
    aria-hidden="true" style="z-index: 9999;">
    <div class="modal-dialog modal-dialog-scrollable" style="z-index: 10000;">
        <div class="modal-content">
            <div class="modal-header bg-info text-light">
                <h1 class="modal-title fs-5" id="modalEditLatihLabel">Edit Data Sample Latih</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('dataSample.update', $data->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    @if ($data->data->count())
                        <h6 class="text-primary">Variabel</h6>

                        @foreach ($data->data->where('variabel.status', 'Variabel') as $index => $d)
                            <div class="mb-3">
                                <label for="edit_latih_{{ $d->id_variabel }}" class="form-label">
                                    {{ $d->variabel->variabel ?? 'Nama variabel tidak ditemukan' }}
                                </label>
                                <input type="hidden" name="id_data[]" value="{{ $d->id }}">
                                <input type="hidden" name="id_variabel[]" value="{{ $d->id_variabel }}">
                                <input type="number" step="any" class="form-control" id="edit_latih_{{ $d->id_variabel }}"
                                    name="nilai[]" value="{{ old('nilai.' . $index, $d->nilai) }}"
                                    placeholder="Contoh: 10 atau 1.5" required>
                            </div>
                        @endforeach

                        @php
                            $class = $data->data->last()?->class;
                        @endphp
                        <div class="mb-3">
                            <label class="form-label">Class</label>
                            <input type="text" class="form-control" name="class" value="{{ old('class', $class) }}"
                                required>
                        </div>
                    @else
                        <p class="text-muted">Tidak ada data untuk diedit.</p>
                    @endif

                    <div class="d-flex justify-content-end">
                        <button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{--! ======================= MODAL EDIT SAMPLE UJI ======================= --}}
<div class="modal fade" id="edit-su{{ $data->id }}" tabindex="-1" aria-labelledby="modalEditUjiLabel" aria-hidden="true"
    style="z-index: 9999;">
    <div class="modal-dialog modal-dialog-scrollable" style="z-index: 10000;">
        <div class="modal-content">
            <div class="modal-header bg-info text-light">
                <h1 class="modal-title fs-5" id="modalEditUjiLabel">Edit Data Sample Uji</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('dataSample.update', $data->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    @if ($data->data->count())
                        <h6 class="text-primary">Variabel Uji</h6>

                        @foreach ($data->data->where('variabel.status', 'Variabel Uji') as $index => $d)
                            <div class="mb-3">
                                <label for="edit_uji_{{ $d->id_variabel }}" class="form-label">
                                    {{ $d->variabel->variabel ?? 'Nama variabel tidak ditemukan' }}
                                </label>
                                <input type="hidden" name="id_data[]" value="{{ $d->id }}">
                                <input type="hidden" name="id_variabel[]" value="{{ $d->id_variabel }}">
                                <input type="number" step="any" class="form-control" id="edit_uji_{{ $d->id_variabel }}"
                                    name="nilai[]" value="{{ old('nilai.' . $index, $d->nilai) }}"
                                    placeholder="Contoh: 10 atau 1.5" required>
                            </div>
                        @endforeach

                        @php
                            $class = $data->data->last()?->class;
                        @endphp
                        <div class="mb-3">
                            <label class="form-label">Class</label>
                            <input type="text" class="form-control" name="class" value="{{ old('class', $class) }}"
                                required>
                        </div>
                    @else
                        <p class="text-muted">Tidak ada data untuk diedit.</p>
                    @endif

                    <div class="d-flex justify-content-end">
                        <button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
