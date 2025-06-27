@props(['data'])

{{--! ======================= MODAL DETAIL SAMPLE ======================= --}}
<div class="modal fade" id="detail-s{{ $data->id }}" tabindex="-1" aria-labelledby="showLabel{{ $data->id }}"
    aria-hidden="true" style="z-index: 9999;">
    <div class="modal-dialog modal-dialog-scrollable" style="z-index: 10000;">
        <div class="modal-content">
            <div class="modal-header bg-info text-white">
                <h5 class="modal-title" id="showLabel{{ $data->id }}">Detail Data Sample</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @if ($data->data && $data->data->count())
                    <h6 class="fw-bolder text-primary">Variabel</h6>
                    <ul class="list-group mb-2">
                        @foreach ($data->data as $d)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                {{ $d->variabel->variabel ?? 'Nama variabel tidak ditemukan' }}
                                <span class="badge bg-primary rounded-pill">{{ $d->nilai }}</span>
                            </li>
                        @endforeach
                        @php
                            $class = $data->data->last()?->class;
                        @endphp
                        <li
                            class="list-group-item fw-bolder text-primary  d-flex justify-content-between align-items-center">
                            Class :
                            <span class="text-info">{{ empty($class) ? 'Belum diisi' : $class }}</span>
                        </li>
                    </ul>
                @else
                    <p class="text-muted">Tidak ada data untuk ditampilkan.</p>
                @endif
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
{{--! ======================= END MODAL DETAIL SAMPLE ======================= --}}


{{--! ======================= MODAL DETAIL SAMPLE UJI ======================= --}}
<div class="modal fade" id="detail-su{{ $data->id }}" tabindex="-1" aria-labelledby="showLabelUji{{ $data->id }}"
    aria-hidden="true" style="z-index: 9999;">
    <div class="modal-dialog modal-dialog-scrollable" style="z-index: 10000;">
        <div class="modal-content">
            <div class="modal-header bg-secondary text-white">
                <h5 class="modal-title" id="showLabelUji{{ $data->id }}">Detail Variabel Uji Sample</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @php
                    $variabelUji = $data->data->where('variabel.status', 'Variabel Uji');
                @endphp

                @if ($variabelUji && $variabelUji->count())
                    <h6 class="text-primary">Variabel Uji</h6>
                    <ul class="list-group mb-3">
                        @foreach ($variabelUji as $d)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                {{ $d->variabel->variabel ?? 'Nama variabel tidak ditemukan' }}
                                <span class="badge bg-primary rounded-pill">{{ $d->nilai }}</span>
                            </li>
                        @endforeach
                        @php
                            $class = $data->data->last()?->class;
                        @endphp
                        <li
                            class="list-group-item fw-bolder text-primary  d-flex justify-content-between align-items-center">
                            Class :
                            <span class="text-info">{{ empty($class) ? 'Belum diisi' : $class }}</span>
                        </li>
                    </ul>

                @else
                    <p class="text-muted">Tidak ada variabel uji untuk ditampilkan.</p>
                @endif
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

{{--! ======================= END MODAL DETAIL SAMPLE UJI ======================= --}}
