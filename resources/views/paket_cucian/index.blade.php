@extends('template/header')
@section('content')
    <div class="right_col" role="main">
        <div class="card">
            <div class="card-header">
                <h3 class="card-tittle">Data Pemasukan Paket Baru</h3>
            </div>
            <div class="card-body">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#formInputModal">Tambah
                    data</button>

                <a href="{{ route('export-Paket') }}" class="btn btn-success">
                    <i class="fa fa-file-excel"></i>Export
                </a>

                <button type="button" class="btn btn-warning text-light" data-toggle="modal"
                    data-target="#ModalImportPaket"><i class="fas fa-file-excel"></i>
                    Import
                </button>

                <!-- Modal -->
                <div class="modal fade" id="ModalImportPaket" data-backdrop="static" data-keyboard="false" tabindex="-1"
                    aria-labelledby="ModalImportPaketLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header text-dark">
                                <h3 class="modal-title" id="ModalImportPaketLabel">Import Data Paket</h3>
                                {{-- <button type="button" class="btn-close" data-dismiss="modal"
                                    aria-label="Close">x</button> --}}
                            </div>
                            <div class="modal-body text-dark">
                                <form action="{{ route('import-Paket') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="file" name="file" required>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-warning" style="color: white">Upload</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div style="margin-top:20px">

                    @if (session('success'))
                        <div class="alert alert-success" role="alert" id="success-alert">
                            {{ session('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <ul>
                                @foreach ($errors->all() as $errors)
                                    <li>
                                        {{ $errors }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div>

                        @include('paket_cucian/list-all')

                    </div>
                </div>
                <!--/card body-->

                <!--/card-->
                @include('paket_cucian/form')
            @endsection
            @push('script')
                <script>
                    $(function() {
                        //data table
                        $('#tbl-paket_cucian').DataTable()
                        //menghapus alert
                        $("#succsess-alert").fadeto(2000, 500).slideUp(500, function() {
                            $("#succsess-alert").slideUp(500);
                        });
                        $("#error-alert").fadeto(2000, 500).slideUp(500, function() {
                            $("#succsess-alert").slideUp(500);
                        });

                        //delete class
                        $('.delete_paket_cucian').click(function(e) {
                            e.preventDefault()
                            let data = $(this).closest('tr').find('td:eq(1)').text()
                            swal({
                                    title: "Apakah kamu yakin ?",
                                    text: "Data " + data + " akan di hapus ?",
                                    icon: "warning",
                                    buttons: true,
                                    dangerMode: true,
                                })
                                .then((req) => {
                                    if (req) $(e.target).closest('form').submit()
                                    else swal.close()
                                })
                        })
                    })
                    //   $('#formInputModal').on('show.bs.modal', function(event){

                    //  let button = $(event.relatedTarget)
                    //  console.log(button)
                    //  let id= button.data('id')
                    //  let nama= button.data('id_outlet')
                    //  let nama= button.data('nama_paket')
                    //  let alamat=button.data('jenis')
                    //  let tlp= button.data('harga')
                    //  let mode button.data('mode')
                    //  let modal $(this)

                    //   if(mode="edit"){
                    //   modal.find('.modal-title').text('Edit Data paket_cucian')
                    //   modal.find('.modal-body #id_outlett' ).val(id_outlet).
                    //   modal.find('.modal-body #nama_paket' ).val(nama_paket).
                    //    modal.find('.modal-body #jenis').val (jenis).change()
                    //    modal.find('.modal-body #harga' ).val(harga).change()
                    ///   modal.find('.modal-footer #btn-submit').text('Update')
                    //   modal.find('.modal-body #method').html('{{ method_field('patch') }}')
                    //    modal.find('.modal-body form').attr('action', 'paket_cucian/'+id)

                    //     }else{

                    //   modal.find('.modal-title').text('Input Data paket_cucian')
                    //    modal.find('.modal-body #id_outlet').val(id_outlet)
                    //    modal.find('.modal-body #nama_paket').val(nama_paket)
                    //    modal.find('.modal-body #jenis').val(jenis).change()
                    //    modal.find('.modal-body #harga').val(harga).change()
                    //    modal.find('.modal-body #method').html("")
                    //   modal.find('.modal-footer #btn-Submit').text('Submit')

                    }.
                </script>
            </div>
        @endpush
