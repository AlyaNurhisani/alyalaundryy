@extends('template/header')
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger" role="alert" id="error-alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (session()->has('succes'))
        <div class="alert alert-success" id="succes-alert" role="alert">
            {{ session('succes') }}
        </div>
    @endif
    <div class="card">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" id="nav-data" data-toggle="collapse" href="#dataLaundry" role="button"
                    aria-expanded="false" aria-controls="collapseExample">Data Laundry</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="nav-form" data-toggle="collapse" href="#formlaundry" role="button"
                    aria-axpanded="false" aria-cantrols="collapsetxample"><i
                        class="fas fa-plus nav-icon"></i>&nbsp;&nbsp;Cucian Baru</a>
            </li>
        </ul>
        @if (session('success'))
            <div class="alert alert-success" role="alert" id="success-alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
            </div>
        @endif
        <form action="/transaksi" method="POST">
            @csrf
            @include('transaksi.form')
            @include('transaksi.data')
            <input type="hidden" name="id_member" id="id_member">
        </form>

    @endsection
    @push('scripts')
        <script>
            //initialize
            let subtotal = total = 0;
            $(function() {
                $('#tblMember').DataTable();

            })
            //end of initialize

            //function pilih member
            function pilihMember(x) {
                const tr = $(x).closest('tr')
                const namaJK = tr.find('td:eq(1)').text() + "/" + tr.find('td:eq(2)').text()
                const biodata = tr.find('td:eq(4)').text() + "/" + tr.find('td:eq(3)').text()
                const idMember = tr.find('.idMember').val()
                $('#nama-pelanggan').text(namaJK)
                $('#biodata-pelanggan').text(biodata)
                $('#id_member').val(idMember)
            }
            //function pilih paket
            function pilihPaket(x) {
                const tr = $(x).closest('tr')
                const namaPaket = tr.find('td:eq(1)').text()
                const harga = tr.find('td:eq(2)').text()
                const idPaket = tr.find('.idPaket').val()

                let data = ''
                let tbody = $('#tblTransaksi tbody tr td').text()
                data += '<tr>'
                data += `<td> ${namaPaket} </td>`
                data += `<td> ${harga} </td>`;
                data += `<input type="hidden" name="id_paket[]" value="${idPaket}">`
                data += `<td><input type="number" value="1" min="1" class="qty" name="qty[]" size="2" style="width:40px"></td>`;
                data += `<td><label name="sub_total[]" class="subTotal">${harga}</label></td>`;
                data +=
                    `<td><button type="button" class="btnRemovePaket btn btn-danger">Hapus<span class="ni ni-basket btn-dark"></span></button></td>`;
                data += `</tr>`;

                if ($('#tblTransaksi tbody tr td').text() == 'Belum ada data') $('#tblTransaksi tbody tr').remove();

                $('#tblTransaksi tbody').append(data);

                subtotal += Number(harga)
                let pajak = 0.35 * Number(subtotal);
                $('#pajak-harga').text(pajak)
                $('#pajak-persen').val(pajak)
                total = subtotal + Number($('#pajak-harga').val()) + Number(pajak) + Number($('#biaya_tambahan').val())
                $('#subtotal').text(Number(subtotal))
                $('#total').text(total)
            }

            //actions
            //pemilihan member
            $('#tblMember').on('click', '.pilihMemberBtn', function() {
                console.log('modal')
                pilihMember(this)
                $('#modalMember').modal('hide')
            })
            //pemilihan paket
            $('#tblPaket').on('click', '.pilihPaketBtn', function() {
                console.log('modal')
                pilihPaket(this)
                $('#modalPaket').modal('hide')
            })
            //function hitung total
            function hitungTotalAkhir(a) {
                let qty = Number($(a).closest('tr').find('.qty').val());
                let harga = Number($(a).closest('tr').find('td:eq(1)').text());
                let subTotalAwal = Number($(a).closest('tr').find('.subTotal').text());
                let count = qty * harga;
                let pajak = 0.35 * Number(subtotal);
                subtotal = subtotal - subTotalAwal + count
                total = subtotal + Number($('#pajak-harga').val()) + Number(pajak) + Number($('#biaya_tambahan').val())
                $(a).closest('tr').find('.subTotal').text(count)
                $('#subtotal').text(subtotal)
                $('#total').text(total)
            }
            //
            //onchange qty
            $('#tblTransaksi').on('change', '.qty', function() {
                hitungTotalAkhir(this)
            })
            //
            //remove paket
            $('#tblTransaksi').on('click', '.btnRemovePaket', function() {
                let subTotalAwal = parseFloat($(this).closest('tr').find('.subTotal').text());
                subtotal -= subTotalAwal
                total -= subTotalAwal;

                $currentRow = $(this).closest('tr').remove();
                $('#subtotal').text(subtotal)
                $('#total').text(total)
            })
            //
            //pemilihan member
            $('#tblMember').on('click', '.pilihMemberBtn', function() {
                console.log('modal')
                pilihMember(this)
                $('#modalMember').modal('hide')
            })
            //

            //Script untuk #menu data dan form transaksi
            $('#dataLaundry').collapse('show')

            $('#dataLaundry').on('show.bs.collapse', function() {
                $('#formLaundry').collapse('hide');
                $('#nav-form').removeClass('active');
                $('#nav-data').addClass('active');

            })

            $('formLaundry').on(show.bs.collapse, function() {
                $('#dataLaundry').collapse('hide');
                $('#nav-data').removeClass('active');
                $('#nav-form').addClass('active');

            })
        </script>
        {{-- <script>
            //inisialisasi
            let subtotal = total = 0;
            $(function() {
                $('#tblMember').DataTable();
                $('#tblPaket').DataTable();
            })

            //pilih member
            $('#tblMember').on('click', '.pilihMember', function() {
                pilihMember(this)
                $('#modalMember').modal('hide')
            })
            //pilih paket
            $('#tblPaket').on('click', '.pilihPaket', function() {
                pilihPaket(this)
                $('#modalPaket').modal('hide')
            })

            //function pilih member
            function pilihMember(x) {
                const tr = $(x).closest('tr')
                const namaJK = tr.find('td:eq(1)').text() + "/" + tr.find('td:eq(3)').text()
                const biodata = tr.find('td:eq(2)').text() + "/" + tr.find('td:eq(4)').text()
                const idMember = tr.find('.idMember').val()
                $('#nama-pelanggan').text(namaJK)
                $('#biodata-pelanggan').text(biodata)
                $('#id_member').val(idMember)
            }

            //function pilih paket
            function pilihPaket(a) {
                const tr = $(a).closest('tr')
                const namaPaket = tr.find('td:eq(1)').text();
                const harga = tr.find('td:eq(3)').text();
                const idPaket = tr.find('.idPaket').val();

                let data = '';
                let tbody = $('#tblTransaksi tbody tr td').text()
                data += '<tr>'
                data += `<td> ${namaPaket} </td>`
                data += `<td> ${harga} </td>`;
                data += `<input type="hidden" name="id_paket[]" value="${idPaket}">`
                data += `<td><input type="number" value="1" min="1" class="qty" name="qty[]" size="2" style="width:40px"></td>`;
                data += `<td><label name="sub_total[]" class="subTotal">${harga}</label></td>`;
                data += `<td><button type="button" class="btnRemovePaket btn btn-danger">hapus</button></td>`;
                data += '</tr>'

                if (tbody == 'Belum ada data') $('#tblTransaksi tbody tr').remove();
                $('#tblTransaksi tbody').append(data);

                subtotal += Number(harga)
                total = subtotal - Number($('#diskon').val()) + Number($('#pajak-persen').val())
                $('#subtotal').val(subtotal)
                $('#total').val(total)
            }

            //function hitung total
            function hitungTotalAkhir(a) {
                let qty = Number($(a).closest('tr').find('.qty').val());
                let harga = Number($(a).closest('tr').find('td:eq(1)').text());
                let subTotalAwal = Number($(a).closest('tr').find('.subTotal').text());
                let count = qty * harga;
                subtotal = subtotal - subTotalAwal + count;
                let pajak = Number($('#pajak-persen').val()) / 100 * subtotal;
                total = subtotal - Number($('#diskon').val()) + Number($('#biaya-tambahan').val()) + pajak;
                $(a).closest('tr').find('.subTotal').text(count)
                // $('#pajak-harga').text(pajak)
                $('#subtotal').val(subtotal)
                $('#total').val(total)
            }

            //perubahan qty
            $('#tblTransaksi').on('change', '.qty', function() {
                hitungTotalAkhir(this)
            })

            //remove paket
            $('#tblTransaksi').on('click', '.btnRemovePaket', function() {
                let subTotalAwal = parseFloat($(this).closest('tr').find('.subTotal').text());
                subtotal -= subTotalAwal
                total -= subTotalAwal;
                $currentRow = $(this).closest('tr').remove();
                $('#subtotal').val(subtotal)
                $('#total').val(total)
            })
        </script> --}}
    @endpush
