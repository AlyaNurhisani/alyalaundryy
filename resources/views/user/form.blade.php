<div class="modal fade" id="formInputModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="user">
                    @csrf
                    <div id="method"></div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name"></label>
                            <input type="text" class="form-control col-sm-9" id="name" placeholder="Nama" name="name">
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="form-group">
                            <label for="email"></label>
                            <input type="text" class="form-control col-sm-9" id="email" placeholder="email"
                                name="email">
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="id_outlet"></label>
                            <input type="text" class="form-control col-sm-9" id="id_outlet" placeholder=" id_outlet"
                                name="id_outlet">
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="password"></label>
                            <input type="text" class="form-control col-sm-9" id="password" placeholder=" password"
                                name="password">
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nama"></label>
                            <select name="role" class="form-control col-sm-9" id="role" placeholder="Role" name="role">
                                <option value="admin">admin</option>
                                <option value="Kasir">Kasir</option>
                                <option value="admin">Owner</option>
                            </select>
                        </div>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                <button type="sumbit" class="btn btn-primary" id="btn-sumbit">Tambah</button>
            </div>
        </div>
    </div>
    </form>
</div>
