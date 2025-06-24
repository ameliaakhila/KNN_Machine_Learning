@props(['data'])

{{-- Modal Edit --}}
<div class="modal fade" id="edit{{ $data->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
    style="z-index: 9999;">
    <div class="modal-dialog" style="z-index: 10000;">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data Variabel</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('dataSample.update', $data->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    @if ($data->data)
                        @foreach ($data->data as $d)
                            <div class="mb-3">
                                <label for="variabel_{{ $d->id_variabel }}" class="form-label">
                                    {{ $d->variabel->variabel ?? 'Nama variabel tidak ditemukan' }}
                                </label>
                                <input type="hidden" name="id_variabel[]" value="{{ $d->id_variabel }}">
                                <input type="number" class="form-control" id="variabel_{{ $d->id_variabel }}" name="nilai[]"
                                    value="{{ old('nilai.' . $loop->index, $d->nilai) }}"
                                    placeholder="Masukkan angka, contoh: 10 atau 1.5" required>
                            </div>
                        @endforeach
                    @endif
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-md btn-primary me-3">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
{{-- End Modal Edit --}}