<div class="modal fade" id="formInputModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Menambah member Baru</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form method="POST" action="member">
            @csrf
            <div id="method"> </div>
            <div class="card-body">
                    <div class="form-group">
                        <label for="nama"> Nama</label>
                        <input type="text" class="form-control col-sm-10" id="nama" placeholder="Nama" name="nama">
                    </div>

                    <div class="form-group">
                        <label for="alamat"> Alamat</label>
                        <input type="text" class="form-control col-sm-10" id="alamat" placeholder="Alamat" name="alamat">
                    </div>

                    <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <select class="form-control col-sm-5" id="jenis_kelamin" name="jenis_kelamin">
                            <option value="L"> Laki Laki</option>
                            <option value="P"> Perempuan</option>

                        </select>
                    </div>

                     <div class="form-group">
                        <label for="tlp"> Telepon</label>
                        <input type="text" class="form-control col-sm-10" id="tlp" placeholder="Telepon" name="tlp">
                    </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" id="btn-submit">Submit</button>
        </div>
      </div>
    </div>
</form>
  </div>
