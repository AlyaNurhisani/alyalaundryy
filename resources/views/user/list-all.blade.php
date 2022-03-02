<!-- Table -->
<div class="row">
    <div class="col">
        <div class="card shadow">
            <div class="card-header border-0">
                <h3 class="mb-0">Tabel Data Paket</h3>
            </div>
            <div class="table-responsive">
                <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                        <tr>

                            <th scope="col">No</th>
                            <th scope="col">nama</th>
                            <th scope="col">Email</th>
                            <th scope="col">role</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user as $u)
                            <tr>

                                <td>{{ $u->id }}</td>
                                <td>{{ $u->name }}</td>
                                <td>{{ $u->email }}</td>
                                <td>{{ $u->role }}</td>
                                <td>
                                    {{-- button --}}
                                    <button type="button" class="btn btn-" data-toggle="modal"
                                        data-target="#edit{{ $u->id }}">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    @include('user.update')
                                    <form action="{{ url('user/' . $u->id) }}" method="post" class="d-inline">
                                        @csrf
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button class="badge bg-primary border-0"
                                            onclick="return confirm('yakin mau di hapus?')"><i
                                                class="ni ni-basket"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
