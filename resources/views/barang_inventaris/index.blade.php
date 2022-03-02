@extends('template/header')
@section('content')
<div class="right_col" role="main">
    <div class="card">
        <div class="card-header">
            <h3 class="card-tittle">Data Barang</h3>
        </div>

        <div class="card-body">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#formInputModal">Tambah data</button>

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

            @include('barang_inventaris/list-all')

        </div>
    </div>
 <!--/card body-->

<!--/card-->
@include('barang_inventaris/form')
@endsection
@push('script')
<script>
$(function(){
    //data table
    $('#tbl-barang_inventaris').DataTable()
    //menghapus alert
    $("#succsess-alert").fadeto(2000, 500).slideUp(500, function(){
        $("#succsess-alert").slideUp(500);
    });
    $("#error-alert").fadeto(2000, 500).slideUp(500, function(){
        $("#succsess-alert").slideUp(500);
    });

    //delete class
    $('.delete_barang_inventaris').click(function(e){
            e.preventDefault()
            let data = $(this).closest('tr').find('td:eq(1)').text()
            swal({
                title: "Apakah kamu yakin ?",
                text: "Data "+data+" akan di hapus ?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((req) => {
                if(req) $(e.target).closest('form').submit()
                else swal.close()
            })
    })
    })
    $('#formInputModal').on('show.bs.modal', function(event){
            let button = $(event.relatedTarget)
            console.log(button+"a")
            let id = button.data('id')
            let nama_barang = button.data('nama_barang')
            let merk_barang = button.data('merk_barang')
            let qty = button.data('qty')
            let kondisi = button.data('kondisi')
            let tanggal_pengadaan = button.data('tanggal_pengadaan')
            let mode = button.data('mode')
            console.log(nama_barang)
            let modal = $(this)
            if(mode == "edit"){
                modal.find('.modal-title').text('Edit Data Barang inventaris')
                modal.find('.modal-body #nama_barang').val(nama_barang)
                modal.find('.modal-body #merk_barang').val(merk_barang)
                modal.find('.modal-body #qty').val(qty)
                modal.find('.modal-body #kondisi').val(kondisi)
                modal.find('.modal-body #tanggal_pengadaan').val(tanggal_pengadaan)
                modal.find('.modal-footer #submit').text('Update')
                modal.find('.modal-body #method').html('{{ method_field('patch') }}')
                modal.find('.modal-body form').attr('action','barang_inventaris/'+id)
            }
            else{
                modal.find('.modal-title').text('Input Data outlet')
                modal.find('.modal-body #nama_barang').val('')
                modal.find('.modal-body #merk_barang').val('')
                modal.find('.modal-body #qty').val('')
                modal.find('.modal-body #kondisi').val('')
                modal.find('.modal-body #tanggal_pengadaan').val('')
                modal.find('.modal-body #method').html('')
                modal.find('.modal-footer #btn-submit').text('Submit')
            }
        })
 </script>
</div>
@endpush

