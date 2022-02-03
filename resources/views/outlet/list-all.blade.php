<table id="tbl-outlet" class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Nama </th>
            <th>Alamat</th>
            <th>Telepon</th>
        </tr>
    </thead>
    <tbody>
    @foreach($outlet as $o)
    <tr>
        <td>{{ $o->nama }}</td>
        <td>{{ $o->alamat }}</td>
        <td>{{ $o->tlp }}</td>
        <td>
            <button type="submit" class="btn btn-outline-warning" data-toggle="modal" data-target="#formInputModal{{ $o->id }}">
                Edit
            </button>

           
            <!--delete data-->
            <form method="POST" action="{{ route('outlet.destroy', $o->id) }}" style="display:inline" class="d-inline">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <button type="submit" class="text-secondary font-weight-bold text-xs border-5 btn delete-outlet" onclick="return confirm('Yakin ingin dihapus?')">
                    Hapus
                </button>

            </form>
        </td>
    </tr>
    @include('outlet/edit')
    @endforeach
    </tbody>
</table>
