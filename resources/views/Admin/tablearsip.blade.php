<table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>Kode Klasifikasi Arsip</th>
        <th> Uraian Informasi Berkas</th>
        <th>Nomor Berkas</th>
        <th>Jumlah</th>
        <th>No Item Berkas</th>
        <th>Uraian/Isi</th>
        <th>Kurun Waktu</th>
        <th>File</th>
        <th>Keterangan/Jumlah</th>
        <th>Lokasi</th>
        <th>Aksi</th>
    </tr>

    @foreach ($dtarsip as $item => $items) 
    <tr>
        <td>{{ $dtarsip->firstItem() + $item }}</td>
        <td>{{ $items->kode_arsip}}</td>
        <td>{{ $items->informasi}}</td>
        <td>{{ $items->nomor}}</td>
        <td>{{ $items->jumlah_berkas}}</td>
        <td>{{ $items->no_item}}</td>
        <td>{{ $items->isi}}</td>
        <td>{{ $items->kurun_waktu}}</td>
        <td>
            {{ $items->file }}
            @if ($items->file)
                <a href="{{ url('download', $items->file) }}" class="btn btn-success" target="_blank">
                    <i class="fas fa-download"></i> Unduh
                </a>
            @endif
        </td>
        <td>{{ $items->keterangan}}</td>
        <td>{{ $items->lokasi}}</td>

        <td>
            <a href="{{ url('editarsip',$items->id) }}" class="btn btn-primary"> <i class="fas fa-pencil-alt"></i> Edit</a>
             
            {{-- <a href="{{ url('deletearsip',$items->id) }}" class="btn btn-danger">Delete</a> --}}
            @if (Auth::user()->level != 'admin')

            @else
            <a href="{{ url('deletearsip', $items->id) }}" class="btn btn-danger" data-confirm-delete="true"> <i class="fas fa-trash-alt"></i> Delete</a>
            @endif

        </td>
    </tr>
    @endforeach
</table>