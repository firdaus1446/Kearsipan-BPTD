<table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>Kode Arsip</th>
        <th>Informasi</th>
        <th>Nomor Berkas</th>
        <th>Jumlah</th>
        <th>No Item</th>
        <th>Isi</th>
        <th>Kurun Waktu</th>
        <th>File</th>
        <th>Keterangan</th>
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
        <td>{{ $items->file}}</td>
        <td>{{ $items->keterangan}}</td>
        <td>{{ $items->lokasi}}</td>

        <td>
            <a href="{{ url('editarsip',$items->id) }}" class="btn btn-primary">Edit</a>
             
            <a href="{{ url('deletearsip',$items->id) }}" class="btn btn-danger">Delete</a>
        </td>
    </tr>
    @endforeach
</table>