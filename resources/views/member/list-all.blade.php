<table id="tbl-member" class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Nama member</th>
            <th>Alamat</th>
            <th>Jenis Kelamin</th>
            <th>Telepon member</th>
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

                <button type="submit" class="btn btn-outline-warning" data-toggle="modal" data-target="#formInputModal{{ $m->id }}">
                    Edit
                </button>


                <!--delete data-->
                <form method="POST" action="{{ route('member.destroy', $m->id) }}" style="display:inline" class="d-inline">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button type="submit" class="text-secondary font-weight-bold text-xs border-5 btn delete-member" onclick="return confirm('Yakin ingin dihapus?')">
                        Hapus
                    </button>

                </form>
            </td>
        </tr>


    </tbody>
    @include('member/edit')
    @endforeach
</table>
