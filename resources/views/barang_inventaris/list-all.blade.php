<table id="tbl-barang_inventaris" class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Nama Barang</th>
            <th>Merk barang</th>
            <th>qty</th>
            <th>kondisi</th>
            <th>Tanggal pengadaan</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($barang_inventaris as $b)
        <tr>
            <td>{{ $b->nama_barang }}</td>
            <td>{{ $b->merk_barang }}</td>
            <td>{{ $b->qty }}</td>
            <td>{{ $b->kondisi}}</td>
            <td>{{ $b->tanggal_pengadaan}}</td>
            <td>

                <button type="submit" class="btn btn-outline-warning" data-toggle="modal" data-target="#formInputModal{{ $b->id }}">
                    Edit
                </button>


                <!--delete data-->
                <form method="POST" action="{{ route('barang_inventaris.destroy', $b->id) }}" style="display:inline" class="d-inline">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button type="submit" class="text-secondary font-weight-bold text-xs border-5 btn delete-barang_inventaris" onclick="return confirm('Yakin ingin dihapus?')">
                        Hapus
                    </button>

                </form>
            </td>
        </tr>


    </tbody>
    @include('barang_inventaris/edit')
    @endforeach
</table>


