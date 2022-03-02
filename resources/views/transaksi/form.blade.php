<div class="collapse" id="formlaundry">
    <div class="card-body">
        <div class="row" class="col-12">
            <div class="form-group row col-6">
                <label for="staticEmail" class="col-sm-4 col-form-label">Tanggal transaksi</label>
                <div class="col-sm-6">
                    <input type="date" name="tgl" class="form-control" value="{{ date('Y-m-d') }}">

                </div>
            </div>
            <div class="form-group row col-6">
                <label for="inputPassword" class="col-4 col-form-label">Estimasi Selesai</label>
                <div class="col-6 ml-auto">
                    <input type="date" class="form-control ml-auto"
                        value="{{ date('Y-m-d', strtotime(date('Y-m-d') . '+3 day')) }}" name="batas_waktu">
                </div>
            </div>
        </div>

        <div class="row" class="col-12">
            <div class="form-grup row col-6">
                <label for="" class="col-sm-4 col-form-label">
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalMember">
                        <li class="fa fa-circle"></li>
                    </button>
                    NamaPelanggan
                    <!-- Button trigger modal -->
                </label>
                <label class="col-sm-6 col-form-label" id="nama-pelanggan" style="font-weight:normal">
                    -
                </label>
            </div>
            {{-- <div class="form-group row col-6">
    <label for=""class="col-sm-4- col-form-label">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalMember">
    <i class="far fa-circle nav-icon"></i>
    </button>
    <label> NamaPelanggan</label>
    <div class = "col-6 ml-auto" id="nama-pelanggan">

</div>
</div> --}}
            <div class="form-group row col-6">
                <label for="" class="col-sm-4 col-form-label">Biodata</label>
                <div class="col-6 ml-auto" id="biodata-pelanggan" style="font-weight normal">
                    -
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Button trigger modal -->

<!--data paket-->
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-4">
                <button type="button" class="btn btn-primary" id="tambahPaketBtn" data-toggle="modal"
                    data-target="#modalPaket">Tambah cucian</button>
            </div>
        </div>
        <div class="clearfix">&nbsp;</div>
        <div class="row">
            <table id="tblTransaksi" class="table table-striped table-bordered bulk_action">
                <thead>
                    <tr>
                        <th>Nama Paket</th>
                        <th> Harga</th>
                        <th>Qty</th>
                        <th>Total</th>
                        <th width="15%">action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="5" style="text-align:center;font-style:italic">Belum ada data</td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr valign="bottom">
                        <td width="" colspan="3" align="right"> jumlah bayar </td>
                        <td><span id="subtotal">0</span></td>
                        <td rowspan="4">
                            <label for="">pembayaran</label>
                            <input type="text" class="form-control" name="bayar" id="" style="width:170px" value="0">
                            <div>
                                <button type="submit" class="btn btn-primary" style="margin-top:10px;width:170px">bayar
                                </button>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td colspan="3" align="right">Diskon</td>
                        <td><input type="number" value="0" id="diskon" name="diskon" style="width:140px"></td>
                    </tr>

                    <td colspan="3" align="right"> Pajak<input type="hidden" value="0" min="0" class="qty"
                            name="pajak" id="pajak-persen" size="2" style="width:40px"></td>
                    <td><span id="pajak-harga">0</span></td>

                    <tr>
                        <td colspan="3" align="right">Biaya Tambahan</td>
                        <td><input type="number" name="biaya_tambahan" style="width:140px" value="0"></td>
                    </tr>
                    <tr style="background:black;color:white;font-weight:bold;font-size:lem">
                        <td colspan="3" align="right">Total bayar akhir</td>
                        <td><span id="total">0</span></td>
                    </tr>
                </tfoot>


            </table>
        </div>
    </div>
</div>
</div>
<!--end  data paket-->

<!-- Modal member-->
<div class="modal fade" id="modalMember" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Pilih Pelanggan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>

            </div>
            <div class="modal-body">
                <table id="tblMember" class="table table-stripped table-compact">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>JK</th>
                            <th>No.HP</th>
                            <th>Alamat</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($member as $b)
                            <tr>
                                <td>{{ $i = !isset($i) ? 1 : ++$i }}
                                    <input type="hidden" class="idMember" name="id_Member"
                                        value="{{ $b->id }}">
                                </td>
                                <td> {{ $b->nama }} </td>
                                <td> {{ $b->jenis_kelamin }} </td>
                                <td> {{ $b->tlp }} </td>
                                <td> {{ $b->alamat }} </td>
                                <td><button class="pilihMemberBtn" type="button">Pilih</button></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!--end of modal member-->

<!-- Modal paket-->
<div class="modal fade" id="modalPaket" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">pilih paket</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table id='tblPaket' class="table table-stripped table-compact">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama paket</th>
                            <th>Harga</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($paket_cucian as $b)
                            <tr>
                                <td>{{ $j = !isset($j) ? 1 : ++$j }}
                                    <input type="hidden" class="idPaket" value="{{ $b->id }}">
                                </td>
                                <td> {{ $b->nama_paket }} </td>
                                <td> {{ $b->harga }} </td>
                                <td><button class="pilihPaketBtn btn btn-primary" type="button">Pilih</button></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!--end of modal paket-->
