<div class="modal fade" id="edit{{ $u->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Data User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ url('user/' . $u->id) }}">
                    @csrf
                    @method('PUT')
                    <div id="method"></div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name"></label>
                            <input type="text" class="form-control col-sm-9" id="name" placeholder="Nama"
                                value="{{ $u->name }}" name="name">
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="form-group">
                            <label for="email"></label>
                            <input type="email" class="form-control col-sm-9" id="email" placeholder="Email"
                                name="email" value="{{ $u->email }}">
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="form-group">
                            <label for="role"></label>
                            <select name="role" class="form-control col-sm-9" id="role" placeholder="Role" name="role">
                                <option value="Admin">Admin</option>
                                <option value="Kasir">Kasir</option>
                                <option value="Owner">Owner</option>
                            </select>
                        </div>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                <button type="sumbit" class="btn btn-primary" id="btn-sumbit">Edit</button>
            </div>
        </div>
    </div>
    </form>
</div>
