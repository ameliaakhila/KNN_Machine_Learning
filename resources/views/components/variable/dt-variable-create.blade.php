<!-- Modal Create -->
<div class="modal fade" id="dt-create-v" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Variabel</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('dataVariabel.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="variabel" class="form-label">Variabel</label>
                        <input type="text" class="form-control" id="variabel" name="variabel"
                            value="{{ old('variabel') }}" placeholder="Masukkan Nama Variabel" required>
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-select" name="status" id="status" required>
                            <option value="" disabled {{ old('status') ? '' : 'selected' }}>Pilih Status</option>
                            <option value="Variabel Latih" {{ old('status') == 'Variabel Latih' ? 'selected' : '' }}>Variabel Latih</option>
                            <option value="Variabel Uji" {{ old('status') == 'Variabel Uji' ? 'selected' : '' }}>Variabel Uji</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="keterangan" class="form-label">Keterangan</label>
                        <input type="text" class="form-control" id="keterangan" name="keterangan"
                            value="{{ old('keterangan') }}" placeholder="Masukkan Kategori Variabel" required>
                    </div>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-md btn-primary me-3">Save</button>
                </form>

            </div>
        </div>
    </div>
</div>
{{-- End Modal Create --}}
