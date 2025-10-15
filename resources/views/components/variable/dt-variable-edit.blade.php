@props(['data'])

{{-- Modal Edit Variabel --}}
<div class="modal fade" id="edit{{ $data->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $data->id }}"
    aria-hidden="true" style="z-index: 9999;">
    <div class="modal-dialog" style="z-index: 10000;">
        <div class="modal-content">

            {{-- Modal Header --}}
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel{{ $data->id }}">Edit Data Variabel</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            {{-- Modal Body --}}
            <div class="modal-body">
                <form action="{{ route('dataVariabel.update', $data->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    {{-- Input Variabel --}}
                    <div class="mb-3">
                        <label for="variabel{{ $data->id }}" class="form-label">Variabel</label>
                        <input type="text" class="form-control" id="variabel{{ $data->id }}" name="variabel"
                            value="{{ old('variabel', $data->variabel) }}" placeholder="Masukkan Nama Variabel"
                            required>
                    </div>

                    {{-- Input Status --}}
                    <div class="mb-3">
                        <label for="status{{ $data->id }}" class="form-label">Status</label>
                        <select class="form-select" id="status{{ $data->id }}" name="status" required>
                            <option value="" disabled {{ old('status', $data->status) ? '' : 'selected' }}>Pilih Status
                            </option>
                            <option value="Variabel Latih" {{ old('status', $data->status) == 'Variabel Latih' ? 'selected' : '' }}>
                                Variabel Latih
                            </option>
                            <option value="Variabel Uji" {{ old('status', $data->status) == 'Variabel Uji' ? 'selected' : '' }}>
                                Variabel Uji
                            </option>
                        </select>
                    </div>

                    {{-- Input Keterangan --}}
                    <div class="mb-3">
                        <label for="keterangan{{ $data->id }}" class="form-label">Keterangan</label>
                        <input type="text" class="form-control" id="keterangan{{ $data->id }}" name="keterangan"
                            value="{{ old('keterangan', $data->keterangan) }}" placeholder="Masukkan Kategori Variabel"
                            required>
                    </div>

                    {{-- Modal Footer --}}
                    <div class="d-flex justify-content-end">
                        <button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
{{-- End Modal Edit Variabel --}}
