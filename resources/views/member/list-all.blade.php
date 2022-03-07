<table id="tbl-member" class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Nama member</th>
            <th>Alamat</th>
            <th>Jenis Kelamin</th>
            <th>Telepon member</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($member as $m)
            <tr>
                <td>{{ $m->nama }}</td>
                <td>{{ $m->alamat }}</td>
                <td>{{ $m->jenis_kelamin }}</td>
                <td>{{ $m->tlp }}</td>
                <td>

                    <button class="btn edit-member" type="submit" data-toggle="modal"
                        data-target="#formInputModal{{ $m->id }}" data-mode="edit">
                        <i class="fa fa-edit" style="color:orange"></i>
                    </button>


                    <!--delete data-->
                    <form method="POST" action="{{ route('member.destroy', $m->id) }}" style="display:inline"
                        class="d-inline">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button class="btn delete-member" type="submit"> <i class="fa fa-trash" style="color: red"
                                onclick="return confirm('Yakin ingin dihapus?')"> </i>
                        </button>

                    </form>
                </td>
            </tr>


    </tbody>
    @include('member/edit')
    @endforeach
</table>
