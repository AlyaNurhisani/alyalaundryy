<table id="tbl-paket_cucian" class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>ID OUTLET</th>
            <th>Nama Paket</th>
            <th>Jenis Cucian</th>
            <th>Harga</th>
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

                <button type="submit" class="btn btn-outline-warning" data-toggle="modal" data-target="#formInputModal{{ $p->id }}">
                    Edit
                </button>
 

                <!--delete data-->
                <form method="POST" action="{{ route('paket_cucian.destroy', $p->id) }}" style="display:inline" class="d-inline">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button type="submit" class="text-secondary font-weight-bold text-xs border-5 btn delete-outlet" onclick="return confirm('Yakin ingin dihapus?')">
                        Hapus
                    </button>

                </form>
            </td>
        </tr>


    </tbody>
    @include('paket_cucian/edit')
    @endforeach
</table>
