<div class="modal fade" id="formInputModal{{ $p->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Mengubah Data Paket</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form method="POST" action="{{ route('paket_cucian.update', $p->id) }}">
            @csrf @method('put')
            <div id="method"> </div>
            <div class="card-body">
                    <div class="form-group">
                        <label for="id_outlet"> ID OUTLET</label>
                        <input type="text" class="form-control " value="{{ $p->id_outlet }}" id="id_outlet" placeholder="ID OUTLET" name="id_outlet">
                    </div>

                    <div class="form-group">
                        <label for="jenis">Jenis</label>
                        <select class="form-control col-sm-5" id="jenis" name="jenis">
                            <option value="kiloan"> Kiloan</option>
                            <option value="selimut"> Selimut</option>
                            <option value="bed cover"> Bed Cover</option>
                            <option value="kaos"> Kaos</option>
                            <option value="lainnya">Lainnya</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="nama_paket"> Nama Paket</label>
                        <input type="text" class="form-control " value="{{ $p->nama_paket }}" id="nama_paket" placeholder="Nama Paket" name="nama_paket">
                    </div>

                     <div class="form-group">
                        <label for="harga"> Harga</label>
                        <input type="text" class="form-control " value="{{ $p->harga }}" id="harga" placeholder="Harga" name="harga">
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
