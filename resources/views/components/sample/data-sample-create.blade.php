@props(['data'])

{{--! Modal Create --}}
<div class="modal fade" id="create-v" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            {{--! Header Modal --}}
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="createModalLabel">Tambah Data Sample</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            {{--! Body Modal --}}
            <div class="modal-body">
                <form action="{{ route('dataSample.store') }}" method="POST">
                    @csrf

                    @foreach ($data as $v)
                        <div class="mb-3">
                            <label for="variabel_{{ $v->id }}" class="form-label">
                                {{ $v->variabel }}
                            </label>

                            <input type="hidden" name="sample_id[]" value="{{ $v->id }}">

                            <input
                                type="number"
                                class="form-control"
                                id="variabel_{{ $v->id }}"
                                name="nilai[]"
                                value="{{ old('nilai.' . $loop->index) }}"
                                placeholder="Masukkan format angka/desimal (10 / 1.10)"
                                required
                            >
                        </div>
                    @endforeach

                    <div class="d-flex justify-content-end mt-4">
                        <button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
{{--! End Modal Create --}}
