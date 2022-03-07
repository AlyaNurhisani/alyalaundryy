<table id="tbl-outlet" class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Nama </th>
            <th>Alamat</th>
            <th>Telepon</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($outlet as $o)
            <tr>
                <td>{{ $o->nama }}</td>
                <td>{{ $o->alamat }}</td>
                <td>{{ $o->tlp }}</td>
                <td>
                    <button class="btn edit-outlet" type="submit" data-toggle="modal"
                        data-target="#formInputModal{{ $o->id }}" data-mode="edit">
                        <i class="fa fa-edit" style="color:orange"></i>
                    </button>


                    <!--delete data-->
                    <form method="POST" action="{{ route('outlet.destroy', $o->id) }}" style="display:inline"
                        class="d-inline">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button class="btn delete-member" type="submit"> <i class="fa fa-trash" style="color: red"
                                onclick="return confirm('Yakin ingin dihapus?')"> </i>
                        </button>

                    </form>
                </td>
            </tr>
            @include('outlet/edit')
        @endforeach
    </tbody>
</table>
