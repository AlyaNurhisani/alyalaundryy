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
                <td>{{ $b->kondisi }}</td>
                <td>{{ $b->tanggal_pengadaan }}</td>
                <td>

                    <button class="btn edit-barang_inventaris" type="submit" data-toggle="modal"
                        data-target="#formInputModal{{ $b->id }}" data-mode="edit">
                        <i class="fa fa-edit" style="color:orange"></i>
                    </button>


                    <!--delete data-->
                    <form method="POST" action="{{ route('barang_inventaris.destroy', $b->id) }}"
                        style="display:inline" class="d-inline">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button class="btn delete-member" type="submit"> <i class="fa fa-trash" style="color: red"
                                onclick="return confirm('Yakin ingin dihapus?')"> </i>
                        </button>

                    </form>
                </td>
            </tr>


    </tbody>
    @include('barang_inventaris/edit')
    @endforeach
</table>
