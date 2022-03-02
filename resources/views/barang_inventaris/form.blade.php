<div class="modal fade" id="formInputModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Menambah barang Baru</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form method="POST" action="barang_inventaris">
            @csrf
            <div id="method"> </div>
            <div class="card-body">
                    <div class="form-group">
                        <label for="nama_barang"> Nama barang</label>
                        <input type="text" class="form-control col-sm-10" id="nama_barang" placeholder="Nama_barang" name="nama_barang">
                    </div>

                    <div class="form-group">
                        <label for="merk_barang"> merk_barang</label>
                        <input type="text" class="form-control col-sm-10" id="merk_barang" placeholder="merk_barang" name="merk_barang">
                    </div>

                    <div class="form-group">
                        <label for="qty"> qty</label>
                        <input type="number" class="form-control col-sm-10" id="qty" placeholder="qty" name="qty">
                    </div>

                    <div class="form-group">
                        <label for="kondisi">Kondisi</label>
                        <select class="form-control col-sm-5" id="kondisi" name="kondisi">
                            <option value="layak_pakai"> Layak pakai</option>
                            <option value="rusak_ringan"> Rusak Ringan</option>
                            <option value="rusak_berat"> Rusak Berat</option>

                        </select>
                    </div>


                    <div class="form-group">
                        <label for="date">Tanggal pengadaan</label>
                        <input type="date" class="form-control col-sm-10" id="tanggal_pengadaan" placeholder="tanggal" name="tanggal_pengadaan">
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
