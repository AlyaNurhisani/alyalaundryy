<table id="tbl-paket_cucian" class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>ID OUTLET</th>
            <th>Nama Paket</th>
            <th>Jenis Cucian</th>
            <th>Harga</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($paket_cucian as $p)
            <tr>
                <td>{{ $p->id_outlet }}</td>
                <td>{{ $p->jenis }}</td>
                <td>{{ $p->nama_paket }}</td>
                <td>{{ $p->harga }}</td>
                <td>

                    <button class="btn edit-paket_cucian" type="submit" data-toggle="modal"
                        data-target="#formInputModal{{ $p->id }}" data-mode="edit">
                        <i class="fa fa-edit" style="color:orange"></i>
                    </button>


                    <!--delete data-->
                    <form method="POST" action="{{ route('paket_cucian.destroy', $p->id) }}" style="display:inline"
                        class="d-inline">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button class="btn delete-paket_cucian" type="submit"> <i class="fa fa-trash"
                                style="color: red" onclick="return confirm('Yakin ingin dihapus?')"> </i>
                        </button>

                    </form>
                </td>
            </tr>


    </tbody>
    @include('paket_cucian/edit')
    @endforeach
</table>
