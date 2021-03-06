@extends('layouts.staff')

{{-- Content Header --}}
@section('staff_content_title')
    <button class="btn btn-warning"><h1 class="m-0 text-dark">Edit Penjualan</h1></button>
@endsection
@section('staff_content_breadcrumb')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ url('/staff') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ url('/penjualan') }}">Penjualan</a></li>
        <li class="breadcrumb-item active">Edit Penjualan</li>
    </ol>
@endsection{{-- Content Header --}}

{{--  Require CSS for this Page  --}}
@section('plugin_css')
    <link href="{{ asset('plugins/select2/select2.css') }}" rel="stylesheet">{{-- Select2 --}}
    <link href="{{ asset('plugins/iCheck/all.css') }}" rel="stylesheet">{{-- iCheck --}}
    <link href="{{ asset('plugins/datetimePicker/css/tempusdominus-bootstrap-4.css') }}" rel="stylesheet">{{-- dateTimePicker --}}
@endsection

@section('staff_content')
<form role="form" id="penjualanForm">
    <div class="card shadow">
        <div class="card-header no-border">
            <h3 class="card-title">
                <i class="fa fa-globe"></i> <span id="span_title">{{ '#'.$penjualan->penjualan_invoice }}</span>
            </h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-lg-4">{{-- Form Penjualan --}}
                    <div class="card bg-success shadow">
                        <div class="card-header no-border">
                            <h3 class="card-title"><i class="fa fa-th"></i> Form Penjualan</h3>
                        </div>

                        <div class="card-body">
                            

                            <div class="form-group" id="field-kostumer_id">{{-- Kostumer --}}
                                <label for="input-kostumer_id">Kostumer <i class="fa fa-question-circle-o" data-toggle="tooltip" data-placement="right" title="" data-original-title="Didn't find your Customer? Add it first with blue + Button"></i></label>
                                <select name="kostumer_id" class="form-control select2" id="input-kostumer_id">
                                    <option value="">- None -</option>
                                </select>
                            </div>{{-- /.Kostumer --}}

                            <div class="form-group" id="field-penjualan_tgl">{{-- Penjualan Tanggal --}}
                                <label for="input-penjualan_tgl">Tanggal Penjualan</label>
                                <input type="text" name="penjualan_tgl" class="form-control datetimepicker-input" id="input-penjualan_tgl" data-toggle="datetimepicker" data-target="#input-penjualan_tgl">
                            </div>{{-- /.Penjualan Tanggal --}}

                            <div class="form-group" id="field-penjualan_detail">{{-- Penjualan Detail --}}
                                <label for="input-penjualan_detail">Detail</label>
                                <textarea placeholder="Detail Penjualan" class="form-control" id="input-penjualan_detail" name="penjualan_detail">{{ $penjualan->penjualan_detail }}</textarea>
                                <label class="text-white mb-0"><small>*Catatan bisa dikosongi</small></label>
                            </div>{{-- Penjualan Detail --}}
                        </div>
                    </div>
                </div>{{-- /.Form Penjualan --}}

                <div class="col-12 col-lg-8">
                    <div class="card bg-success shadow">
                        <div class="card-header no-border">
                            <h3 class="card-title"><i class="fa fa-th"></i> Item Penjualan</h3>
                        </div>

                        <div class="card-body">
                            <div id="transaksi_wrapper">{{-- Item Penjualan --}}
                                @php $i = 1; @endphp
                                @foreach ($penjualan->penjualanItem as $item)
                                <div class="row">
                                    <div class="col-12 col-md-4">{{-- Nama Barang --}}
                                        <div class="form-group" id="field_{{ $i }}-barang_id">
                                            <label for="input_{{ $i }}-barang_id">Kode Barang</label>
                                            @if($item->paket_id != null)
                                            @php
                                                $kode = "[".$item->paket->paket_nama."]";
                                            @endphp
                                            @else
                                            @php
                                                $kode = $item->barang->kategori->kategori_kode.'-'.$item->barang->barang_kode;
                                            @endphp
                                            @endif
                                            <input type="hidden" name="barang_id[]" class="form-control" id="input_{{ $i }}-barang_id" value="{{ $item->barang_id }}" readonly>
                                            <input type="text" name="barang_nama" class="form-control" id="input_{{ $i }}-barang_nama" value="{{ $kode.' / '.$item->barang->barang_nama }}" readonly>
                                        </div>
                                    </div>{{-- Nama Barang --}}
                                    <div class="form-group" id="field_{{ $i }}-harga_beli">{{-- Harga Beli --}}
                                        <input type="hidden" name="harga_beli[]" class="form-control" id="input_{{ $i }}-harga_beli" min="0" value="{{ $item->harga_beli }}" placeholder="0">
                                    </div>{{-- /.Harga Beli --}}
                                    <div class="col-12 col-md-2">{{-- Harga Jual --}}
                                        <div class="form-group" id="field_{{ $i }}-harga_jual">
                                            <label for="input_{{ $i }}-harga_jual">Harga Jual</label>
                                            <input type="number" name="harga_jual[]" class="form-control" id="input_{{ $i }}-harga_jual" min="0" placeholder="0" value="{{ $item->harga_jual }}" onchange="itemSubTotal('{{ $i }}')">
                                        </div>
                                    </div>{{-- /.Harga Jual --}}
                                    <div class="col-12 col-md-2">{{-- Diskon --}}
                                        <div class="form-group" id="field_{{ $i }}-diskon">
                                            <label for="input_{{ $i }}-diskon">Diskon</label>
                                            <input type="number" name="diskon[]" class="form-control" id="input_{{ $i }}-diskon" min="0" value="{{ $item->diskon }}" placeholder="0" onchange="itemSubTotal('{{ $i }}')">
                                        </div>
                                    </div>{{-- /.Diskon --}}
                                    <div class="col-12 col-md-2">{{-- QTY --}}
                                        <div class="form-group" id="field_{{ $i }}-qty">
                                            <label for="input_{{ $i }}-qty">QTY</label>
                                            <input type="number" name="qty[]" class="form-control" id="input_{{ $i }}-qty" min="1" value="{{ $item->jual_qty }}" placeholder="0" onchange="itemSubTotal('{{ $i }}')">
                                        </div>
                                    </div>{{-- /.QTY --}}
                                    <div class="col-12 col-md-2">{{-- SubTotal --}}
                                        <div class="form-group" id="field_{{ $i }}-subTotal">
                                            <label for="input_{{ $i }}-subTotal">SubTotal</label>
                                            <input type="number" name="subTotal[]" class="form-control subTotal" id="input_{{ $i }}-subTotal" min="0" placeholder="0" readonly>
                                        </div>
                                    </div>{{-- /.SubTotal --}}
                                </div>
                                @php $i++; @endphp

                                <hr class="my-2">
                                @endforeach
                            </div>

                            @php
                                $biayaLain = 0;
                                $bayar = 0;
                            @endphp
                            @foreach ($penjualan->penjualanBayar as $log)
                                @php
                                    $biayaLain = $biayaLain + $log->biaya_lain;
                                    $bayar = $bayar + $log->bayar;
                                @endphp
                            @endforeach

                            {{-- Rincian Biaya --}}
                            <div class="offset-md-6">
                                <div class="form-group" id="field-pembayaran_tgl">{{-- Pembayaran Tanggal --}}
                                    <label for="input-pembayaran_tgl">Tanggal Pembayaran</label>
                                    <input type="text" name="pembayaran_tgl" class="form-control datetimepicker-input" id="input-pembayaran_tgl" data-toggle="datetimepicker" data-target="#input-pembayaran_tgl">
                                </div>{{-- /.Pembayaran Tanggal --}}

                                <div class="form-group" id="field-jumlah">{{-- Jumlah --}}
                                    <label for="input-jumlah">Jumlah</label>
                                    <input type="number" name="subTotal" class="form-control" id="input-jumlah" min="0" placeholder="0" readonly>
                                </div>{{-- /.Jumlah --}}

                                <div class="form-group" id="field-biaya_lain">{{-- Biaya Lain --}}
                                    <label for="input-biaya_lain">Biaya Lain</label>
                                    <input type="number" name="biaya_lain" class="form-control" id="input-biaya_lain" min="0" value="{{ $biayaLain }}" placeholder="0" onchange="hitungTotal()">
                                </div>{{-- /.Jumlah --}}

                                <div class="form-group" id="field-total">{{-- Total --}}
                                    <label for="input-total">Total</label>
                                    <input type="number" name="total" class="form-control" id="input-total" min="0" placeholder="0" readonly>
                                </div>{{-- /.Total --}}

                                <div class="form-group" id="field-bayar">{{-- Bayar --}}
                                    <label for="input-bayar">Bayar</label>
                                    <div class="input-group">
                                        <input type="number" name="bayar" class="form-control" id="input-bayar" min="0" value="{{ $bayar }}" placeholder="0" onchange="hitungKekurangan()">
                                        <div class="btn-group">
                                            <a onclick="bayar('dp')" class="btn btn-info text-white">DP 50%</a>
                                            <a onclick="bayar('lunas')" class="btn btn-primary text-white">Lunas</a>
                                        </div>
                                    </div>
                                </div>{{-- /.Total --}}

                                <div class="form-group" id="field-kekurangan">{{-- Kekurangan --}}
                                    <label for="input-kekurangan">Kekurangan</label>
                                    <input type="number" name="kekurangan" class="form-control" id="input-kekurangan" min="0" placeholder="0" readonly>
                                </div>{{-- /.Kekurangan --}}
                            </div>
                            {{-- /.Rincian Biaya --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card-footer">
        <div class="form-group text-right">
            <button type="reset" id="penjualanReset" class="btn btn-danger text-white">Reset</button>
            <button type="submit" class="btn btn-primary text-white">Submit</button>
        </div>
    </div>
</form>
@endsection

{{--  Require Js for this page  --}}
@section('plugins_js')
    <script src="{{ asset('plugins/select2/select2.js') }}"></script>{{-- select2 --}}
    <script src="{{ asset('plugins/iCheck/icheck.js') }}"></script>{{-- iCheck --}}
    <script src="{{ asset('plugins/datetimePicker/js/tempusdominus-bootstrap-4.js') }}"></script>{{-- dateTimePicker --}}
    <script src="{{ asset('plugins/ckeditor-classic/ckeditor.js') }}"></script>{{-- ckeditor 5 --}}
@endsection

@section('inline_js')
<script>
    //Set ckeditor
    ClassicEditor.create(
        document.querySelector( '#input-penjualan_detail' ), {
            removePlugins: [ "Image", "ImageCaption", "ImageStyle", "ImageToolbar", "ImageUpload" ]
        }
    ).then(
        newEditor => {ckeditor = newEditor;}
    ).catch(
        error => {console.error( error );}
    );

    $(document).ready(function(){
        document.title = "AnaPen | Edit Penjualan";
        $("#mn-penjualan").closest('li').addClass('menu-open');
        $("#mn-penjualan").addClass('active');

        //Init for datetimepicker
        $('#input-penjualan_tgl').datetimepicker({
            useCurrent: false,
            format: 'YYYY-MM-DD HH:mm:ss',
            defaultDate: '{{ $penjualan->penjualan_tgl }}',
            maxDate : '{{ date("Y-m-d H:i:00") }}'
        });
        $('#input-pembayaran_tgl').datetimepicker({
            useCurrent: false,
            format: 'YYYY-MM-DD HH:mm',
            defaultDate: '{{ date("Y-m-d H:i:00") }}',
            maxDate : '{{ date("Y-m-d H:i:00") }}'
        });

        //Set for iCheck
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
            checkboxClass: 'icheckbox_minimal-blue',
            radioClass   : 'iradio_minimal-blue'
        });
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
            checkboxClass: 'icheckbox_flat-blue',
            radioClass   : 'iradio_flat-blue'
        });

        //Set for Default Tipe Transaksi
        
        loadKostumerData("{{ $penjualan->kostumer_id }}");

        //Set subJumlah per item
        @php $i = 1; @endphp
        @foreach ($penjualan->penjualanItem as $item)
        itemSubTotal('{{ $i }}');
            @php  $i++; @endphp
        @endforeach
    });

    //This is for auto Calculation
    function itemSubTotal(item){
        var harga_jual = parseInt($("#input_"+item+"-harga_jual").val());
        var diskon = parseInt($("#input_"+item+"-diskon").val());
        var qty = parseInt($("#input_"+item+"-qty").val());

        var hitung = (harga_jual * qty) - diskon;
        //console.log("Hasil Hitung Item "+item+" : "+hitung);
        $("#input_"+item+"-subTotal").val(hitung);

        hitungJumlah();
    }
    function hitungJumlah(){
        var jumlah = 0;
        var jumlahAmount = $(".subTotal").length;
        //console.log("Jumlah Class Amount : "+$("input.amountHarga").length);
        $(".subTotal").each(function(){
            if (!Number.isNaN(parseInt(this.value, 10))){
                //console.log("Perhitungan dijalankan");
                jumlah += parseInt(this.value, 10);
                $("#input-jumlah").val(parseInt(jumlah));
            }
        });
        hitungTotal();
    }
    function hitungTotal(){
        var jumlah = parseInt($("#input-jumlah").val());
        var biayaLain = parseInt($("#input-biaya_lain").val());

        var total = jumlah + biayaLain;
        $("#input-total").val(total);
        hitungKekurangan();
    }
    function bayar(permintaan){
        var total = parseInt($("#input-total").val());
        if(permintaan == 'dp'){
            //DP 50%
            var bayar = 0.5 * total;
            $("#input-bayar").val(bayar);
        } else {
            //Lunas
            var bayar = total;
            $("#input-bayar").val(bayar);
        }
        hitungKekurangan();
    }
    function hitungKekurangan(){
        var total = parseInt($("#input-total").val());
        var bayar = parseInt($("#input-bayar").val());

        var kekurangan = total - bayar;
        $("#input-kekurangan").val(kekurangan);
    }
    //End of auto Calculation

    //This is for Transaction
    $("#penjualanForm").submit(function(e){ //Prevent default Action for Form
        e.preventDefault();
        penjualanAction();
    });
    function penjualanAction(){
        $("#input-penjualan_detail").val(editorData = ckeditor.getData());

        $(".error-block").remove();
        $(".form-control").removeClass('has-error');
        $(".input-group-text").removeClass('has-error');

        var formMethod = "PUT";
        var url_link = "{{ url('/staff/penjualan').'/'.$penjualan->id }}";

        $.ajax({
            method: formMethod,
            url: url_link,
            data: $("#penjualanForm").serialize(),
            cache: false,
            success: function(result){
                console.log(result);

                if(jQuery.inArray(true, result.isChanged) > -1){
                    showSuccess_redirect(result.message, "{{ url('/staff/penjualan') }}/"+result.invoice);
                } else {
                    if(!result.status){
                        showError(result.message);
                    } else {
                        showError('Nothing changed');
                    }
                }
                //ResetForm
                //formReset();
            },
            error: function( jqXHR, textStatus, errorThrown ) {
                ///console.log(jqXHR);

                //Print all error message
                $.each(jqXHR.responseJSON.errors, function(key, result) {
                    var field_id = "field-"+key;
                    var input_id = "input-"+key;
                    var input_group_id = "input_group-"+key;
                    //Append Error Field
                    $("#"+input_id).addClass('has-error');
                    $("#"+input_group_id).addClass('has-error');
                    //Append Error Message
                    $("#"+field_id).append("<div class='text-muted error-block'><span class='help-block'><small>"+result+"</small></span></div>");
                });
            }
        });
    }
    $("#penjualanReset").click(function(e){ //Prevent default Action for Form
        e.preventDefault();
        penjualanReset();
    });
    function penjualanReset(){
        if(confirm('Are you sure you want to reset form?')) {
            
            //Reset Kostumer
            $("#input-kostumer_id").val('{{ $penjualan->kostumer_id }}').change();

            //Reset Timepicker
            $('#input-penjualan_tgl').data('datetimepicker').date('{{ $penjualan->penjualan_tgl }}');
            $('#input-pembayaran_tgl').data('datetimepicker').date('{{ date("Y-m-d H:i:00") }}');

            //Reset detail
            $("#input-penjualan_detail").val(editorData = ckeditor.setData(unescapeHtml("{{ $penjualan->penjualan_detail }}")));
        }
    }
    //End of Transaction

    //This is for Kostumer
    function loadKostumerData(selected_kostumer){
        $.ajax({
            method: "GET",
            url: "{{ url('/list/kostumer') }}",
            cache: false,
            success: function(result){
                //console.log(result);

                if(result != null && $("#input-kostumer_id").children('option').length){
                    //console.log("Select2 terisi");
                    $.each(result.data, function(key, result){
                        //console.log("Result : "+JSON.stringify(result));
                        if(result['kostumer_kontak'] == "null" || result['kostumer_kontak'] == null || result['kostumer_kontak'] == ""){
                            var kontak = "";
                        } else {
                            var kontak = "/"+result['kostumer_kontak'];
                        }
                        var selectData = {
                            id: result['id'],
                            text: result['kostumer_nama']+kontak
                        };

                        //Cek apakah opsi sudah ada di select2
                        if(!$('#input-kostumer_id').find("option[value='" + result['id'] + "']").length){
                            //console.log(result['kategori_nama']+" belum ada");
                            var newOption = new Option(selectData.text, selectData.id, false, false);
                            $('#input-kostumer_id').append(newOption).trigger('change');
                        }
                    });
                } else {
                    //console.log("Select2 kosong");
                    $.each(result.data, function(key, result){
                        //console.log("Result : "+JSON.stringify(result));
                        if(result['kostumer_kontak'] == "null" || result['kostumer_kontak'] == null || result['kostumer_kontak'] == ""){
                            var kontak = "";
                        } else {
                            var kontak = "/"+result['kostumer_kontak'];
                        }
                        var selectData = {
                            id: result['id'],
                            text: result['kostumer_nama']+kontak
                        };
                        var newOption = new Option(selectData.text, selectData.id, false, false);
                        $('#input-kostumer_id').append(newOption).trigger('change');
                    });
                }

                //Untuk set sesuai data DB
                if(selected_kostumer != ""){
                    $('#input-kostumer_id').val(selected_kostumer).trigger('change');
                }
            }
        });
    }
    //End of Kostumer

    //This is for Toko
    
    //End for Toko
</script>
@endsection
