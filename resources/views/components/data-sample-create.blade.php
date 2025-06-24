@props(['data'])

<!-- Modal Create -->
<div class="modal fade" id="create-v" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Sample</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('dataSample.store') }}" method="POST">
                    @csrf
                    @foreach ($data as $v)
                        <div class="mb-3">
                            <label for="variabel_{{ $v->id }}" class="form-label">{{ $v->variabel }}</label>
                            <input type="hidden" name="sample_id[]" value="{{ $v->id }}">
                            <input type="number" class="form-control" id="variabel_{{ $v->id }}" name="nilai[]"
                                value="{{ old('nilai.' . $loop->index) }}"
                                placeholder="Masukan Format Angka/Decimal (10/1.10)" required>
                        </div>
                    @endforeach
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-md btn-primary me-3">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
{{-- End Modal Create --}}