@props(['data'])

{{--! ======================= MODAL EDIT SAMPLE LATIH ======================= --}}
<div class="modal fade" id="edit-s{{ $data->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
    style="z-index: 9999;">
    <div class="modal-dialog modal-dialog-scrollable" style="z-index: 10000;">
        <div class="modal-content">
            <div class="modal-header bg-info text-light">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data Sample Variabel</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('dataSample.update', $data->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    @if ($data->data && $data->data->count())
                        {{--! Bagian Variabel --}}
                        <h6 class="text-primary" id="modalSubtitle{{ $data->id }}">Variabel</h6>
                        @foreach ($data->data->where('variabel.status', 'Variabel') as $index => $d)
                            <div class="mb-3">
                                <label for="variabel_{{ $d->id_variabel }}" class="form-label">
                                    {{ $d->variabel->variabel ?? 'Nama variabel tidak ditemukan' }}
                                </label>
                                <input type="hidden" name="id_data[]" value="{{ $d->id }}">
                                <input type="hidden" name="id_variabel[]" value="{{ $d->id_variabel }}">
                                <input type="number" step="any" class="form-control" id="variabel_{{ $d->id_variabel }}"
                                    name="nilai[]" value="{{ old('nilai.' . $index, $d->nilai) }}"
                                    placeholder="Masukkan angka, contoh: 10 atau 1.5" required>
                            </div>
                        @endforeach
                        @php
                            $class = $data->data->last()?->class;
                        @endphp
                        <label class="form-label mt-2">Class</label>
                        <input type="text" class="form-control" name="class" value="{{ old('class', $class) }}"
                            placeholder="Masukkan nama class" required>
                    @else
                        <p class="text-muted">Tidak ada data untuk diedit.</p>
                    @endif

                    <div class="d-flex justify-content-end">
                        <button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
{{--! ======================= MODAL EDIT SAMPLE LATIH ======================= --}}


{{--! ======================= MODAL EDIT SAMPLE UJI ======================= --}}
<div class="modal fade" id="edit-su{{ $data->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
    style="z-index: 9999;">
    <div class="modal-dialog modal-dialog-scrollable" style="z-index: 10000;">
        <div class="modal-content">
            <div class="modal-header bg-info text-light">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data Sample Variabel</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('dataSample.update', $data->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    @if ($data->data && $data->data->count())
                        {{--! Bagian Variabel Uji --}}
                        <h6 class="text-primary" id="editModalTitle{{ $data->id }}">Variabel Uji</h6>
                        @foreach ($data->data->where('variabel.status', 'Variabel Uji') as $index => $d)
                            <div class="mb-3">
                                <label for="variabel_{{ $d->id_variabel }}" class="form-label">
                                    {{ $d->variabel->variabel ?? 'Nama variabel tidak ditemukan' }}
                                </label>
                                <input type="hidden" name="id_data[]" value="{{ $d->id }}">
                                <input type="hidden" name="id_variabel[]" value="{{ $d->id_variabel }}">
                                <input type="number" step="any" class="form-control" id="variabel_{{ $d->id_variabel }}"
                                    name="nilai[]" value="{{ old('nilai.' . $index, $d->nilai) }}"
                                    placeholder="Masukkan angka, contoh: 10 atau 1.5" required>
                            </div>
                        @endforeach
                        @php
                            $class = $data->data->last()?->class;
                        @endphp
                        <label class="form-label mt-2">Class</label>
                        <input type="text" class="form-control" name="class" value="{{ old('class', $class) }}"
                            placeholder="Masukkan nama class" required>
                    @else
                        <p class="text-muted">Tidak ada data untuk diedit.</p>
                    @endif
                    <div class="d-flex justify-content-end">
                        <button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
{{--! ======================= MODAL EDIT SAMPLE UJI ======================= --}}