@extends('layouts.staff')

{{--  Require CSS for this Page  --}}
@section('plugin_css')
    <link href="{{ asset('plugins/dataTables/datatables.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/datetimePicker/css/tempusdominus-bootstrap-4.css') }}" rel="stylesheet">{{-- dateTimePicker --}}
@endsection

{{-- Content Header --}}
@section('staff_content_title')
    <button class="btn btn-warning"><h1 class="m-0 text-dark">Analisa Penjualan</h1></button>
@endsection
@section('staff_content_breadcrumb')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ url('/staff') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ url('/staff/analisa') }}">Analisa</a></li>
        <li class="breadcrumb-item active">Apriori</li>
    </ol>
@endsection{{-- Content Header --}}

@if($apriori)
    @php
        $min_support = $apriori->min_support;
        $min_confidence = $apriori->min_confidence;
    @endphp
@else
    @php
        $min_support = 50;
        $min_confidence = 70;
    @endphp
@endif

@section('staff_content')
<div class="card shadow">
    <div class="card-header bg-success no-border">
        <h3 class="card-title"><i class="fa fa-th"></i> Analisa Penjualan</h3>
    </div>

    <div class="card-body">
        <form id="aprioriForm" role="form">
            <div class="row">
                <div class="col-12 col-lg-6">{{-- Tanggal Mulai --}}
                    <div class="form-group">
                        <label for="input-tanggal_mulai">Tanggal Mulai</label>
                        <input type="text" name="tanggal_mulai" class="form-control datetimepicker-input" id="input-tanggal_mulai" data-toggle="datetimepicker" data-target="#input-tanggal_mulai">
                    </div>
                </div>{{-- /.Tanggal Mulai --}}

                <div class="col-12 col-lg-6">{{-- Tanggal Akhir --}}
                    <div class="form-group">
                        <label for="input-tanggal_akhir">Tanggal Akhir</label>
                        <input type="text" name="tanggal_akhir" class="form-control datetimepicker-input" id="input-tanggal_akhir" data-toggle="datetimepicker" data-target="#input-tanggal_akhir">
                    </div>
                </div>{{-- /.Tanggal Akhir --}}

                <div class="col-12 col-lg-6">{{-- Minimal Support --}}
                    <div class="form-group">
                        <label for="input-tanggal_akhir">Min. Support</label>
                        <div class="input-group">
                            <input type="number" name="min_support" class="form-control" value="{{ $min_support }}" min="0" id="input-min_support">
                            <input type="hidden" name="old-min_support" class="form-control" value="{{ $min_support }}" min="0" id="old_input-min_support">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    %
                                </span>
                            </div>
                        </div>
                    </div>
                </div>{{-- /.Minimal Support --}}

                <div class="col-12 col-lg-6">{{-- Minimal Conf --}}
                    <div class="form-group">
                        <label for="input-tanggal_akhir">Min. Confidence</label>
                        <div class="input-group">
                            <input type="number" name="min_confidence" class="form-control" value="{{ $min_confidence }}" min="0" id="input-min_confidence">
                            <input type="hidden" name="old-min_confidence" class="form-control" value="{{ $min_confidence }}" id="old_input-min_confidence">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    %
                                </span>
                            </div>
                        </div>
                    </div>
                </div>{{-- /.Minimal Conf --}}
            </div>

            <div class="form-group text-center text-md-right">
                <div class="btn-group mt-2">
                    <button class="btn btn-info" id="btn-default">Default</button>
                    <button class="btn btn-danger" type="reset" id="btn-reset">Reset</button>
                    <button class="btn btn-success" id="btn-save" disabled>Save</button>
                    <button class="btn btn-primary" type="submit" id="btn-submit">Submit</button>
                </div>
            </div>
        </form>

        <hr>

        <div class="row">
            <div class="col-12 col-xl-6">{{-- 1 Itemset --}}
                <div class="card shadow">
                    <div class="card-header bg-success">
                        <h5 class="card-title">I-1 (Itemset 1)</h5>
                    </div>
                    <div class="card-body">
                        <div class="callout callout-warning mx-2 d-none" id="alert-itemsetSatu">
                            <h5>Not Enough Data</h5>
                            <p>Sorry, the data needed is not enough.</p>
                        </div>

                        <table class="table table-striped table-responsive-sm table-hover table-bordered" id="itemsetSatu">
                            <thead>
                                <tr class="bg-primary">
                                    <th>No</th>
                                    <th>Item</th>
                                    <th>Jumlah</th>
                                    <th>Support</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>{{-- /.1 Itemset --}}
            <div class="col-12 col-xl-6">{{-- 2 Itemset --}}
                <div class="card shadow">
                    <div class="card-header bg-success">
                        <h5 class="card-title">I-2 (Itemset 2)</h5>
                    </div>
                    <div class="card-body">
                        <div class="callout callout-warning mx-2 d-none" id="alert-itemsetDua">
                            <h5>Not Enough Data</h5>
                            <p>Sorry, the data needed is not enough.</p>
                        </div>

                        <table class="table table-striped table-hover table-responsive-sm table-bordered" id="itemsetDua">
                            <thead>
                                <tr class="bg-primary">
                                    <th>No</th>
                                    <th>Item</th>
                                    <th>Jumlah</th>
                                    <th>Support</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>{{-- /.3 Itemset --}}
            <div class="col-12 col-xl-6">{{-- 3 Itemset --}}
                <div class="card shadow">
                    <div class="card-header bg-success">
                        <h5 class="card-title">I-3 (Itemset 3)</h5>
                    </div>
                    <div class="card-body">
                        <div class="callout callout-warning mx-2 d-none" id="alert-itemsetTiga">
                            <h5>Not Enough Data</h5>
                            <p>Sorry, the data needed is not enough.</p>
                        </div>

                        <table class="table table-striped table-responsive-sm table-hover table-bordered" id="itemsetTiga">
                            <thead>
                                <tr class="bg-primary">
                                    <th>No</th>
                                    <th>Item</th>
                                    <th>Jumlah</th>
                                    <th>Support</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>{{-- /.3 Itemset --}}
        </div>

        <div class="row">
            <div class="col-12 col-xl-6">{{-- Confidence --}}
                <div class="card shadow">
                    <div class="card-header bg-success">
                        <h5 class="card-title">Confidence Item Set 2</h5>
                    </div>
                    <div class="card-body">
                        <div class="callout callout-warning mx-2 d-none" id="alert-confTwo">
                            <h5>Not Enough Data</h5>
                            <p>Sorry, the data needed is not enough.</p>
                        </div>

                        <table class="table table-striped table-responsive-sm table-hover table-bordered" id="confTwo">
                            <thead>
                                <tr class="bg-primary">
                                    <th>No</th>
                                    <th>Item</th>
                                    <th>Support X U Y</th>
                                    <th>Support X</th>
                                    <th>Confidence</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>{{-- /.Confidence --}}
            <div class="col-12 col-xl-6">{{-- Confidence --}}
                <div class="card shadow">
                    <div class="card-header bg-success">
                        <h5 class="card-title">Confidence Item Set 3</h5>
                    </div>
                    <div class="card-body">
                        <div class="callout callout-warning mx-2 d-none" id="alert-confThree">
                            <h5>Not Enough Data</h5>
                            <p>Sorry, the data needed is not enough.</p>
                        </div>

                        <table class="table table-striped table-responsive-sm table-hover table-bordered" id="confThree">
                            <thead>
                                <tr class="bg-primary">
                                    <th>No</th>
                                    <th>Item</th>
                                    <th>Support X U Y</th>
                                    <th>Support X</th>
                                    <th>Confidence</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>{{-- /.Confidence --}}
            <div class="col-12 col-xl-6">{{-- Penempatan --}}
                <div class="card shadow">
                    <div class="card-header bg-success">
                        <h5 class="card-title">Penempatan Barang</h5>
                    </div>
                    <div class="card-body">
                        <div class="callout callout-warning mx-2 d-none" id="alert-penempatanBarang">
                            <h5>Not Enough Data</h5>
                            <p>Sorry, the data needed is not enough.</p>
                        </div>

                        <table class="table table-striped table-responsive-sm table-hover table-bordered" id="penempatanBarang">
                            <thead>
                                <tr class="bg-primary">
                                    <th>No Penempatan</th>
                                    <th>Barang</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>{{-- /.Penempatan --}}
        </div>
    </div>
</div>
@endsection

{{--  Require Js for this page  --}}
@section('plugins_js')
    <script src="{{ asset('plugins/dataTables/datatables.js') }}"></script>
    <script src="{{ asset('plugins/dataTables/Responsive-2.2.1/js/dataTables.responsive.js') }}"></script>
    <script src="{{ asset('plugins/datetimePicker/js/tempusdominus-bootstrap-4.js') }}"></script>{{-- dateTimePicker --}}
    <script src="{{ asset('plugins/select2/select2.js') }}"></script>{{-- select2 --}}
@endsection

@section('inline_js')
<script>
    $(document).ready(function(){
        document.title = "AnaPen | Apriori";
        $("#mn-apriori").addClass('active');

        //Timepicker
        $('#input-tanggal_mulai').datetimepicker({
            useCurrent: false,
            format: 'YYYY-MM-DD HH:mm',
            //defaultDate: moment('{{ date("Y-m-1 00:00:00") }}', 'YYYY-MM-DD HH:mm'),
            defaultDate: moment('{{ date("Y-m-1 00:00:00") }}', 'YYYY-MM-DD HH:mm'),
            maxDate : moment('{{ date("Y-m-d H:i:00") }}', 'YYYY-MM-DD HH:mm')
        });
        $('#input-tanggal_akhir').datetimepicker({
            useCurrent: false,
            format: 'YYYY-MM-DD HH:mm',
            defaultDate: moment('{{ date("Y-m-d H:i:s") }}', 'YYYY-MM-DD HH:mm'),
            minDate : moment('{{ date("Y-m-1 00:00:00") }}', 'YYYY-MM-DD HH:mm'),
            maxDate : moment('{{ date("Y-m-d H:i:s") }}', 'YYYY-MM-DD HH:mm')
        });

        var tSatu = $("#itemsetSatu").DataTable({
            responsive: true,
            processing: true,
            autoWidth: true,
            ajax: {
                method: "POST",
                data: function(d){
                    var tgl_mulai = $("#input-tanggal_mulai").val();
                    var tgl_akhir = $("#input-tanggal_akhir").val();
                    var reqData = { tanggal_mulai: tgl_mulai, tanggal_akhir: tgl_akhir };
                    return reqData;
                },
                url: "{{ url('penjualan/apriori') }}",
            },
            drawCallback: function(settings) {
                $.ajax({
                    method: "POST",
                    data: {
                        'tanggal_mulai': $("#input-tanggal_mulai").val(),
                        'tanggal_akhir': $("#input-tanggal_akhir").val(),
                    },
                    url: "{{ url('penjualan/apriori') }}",
                    cache: false,
                    success: function(result){
                        //console.log(result);
                        if(result.recordsTotal == 0){
                            $("#alert-itemsetSatu").slideDown(function(){
                                $(this).removeClass('d-none');
                                $(this).addClass('d-block');
                            });
                        } else {
                            $("#alert-itemsetSatu").slideDown(function(){
                                $(this).addClass('d-none');
                                $(this).removeClass('d-block');
                            });
                        }
                    }
                });
            },
            columns: [
                { data: null },
                { data: 'barang_nama' },
                { data: 'jumlah' },
                { data: null },
            ],
            columnDefs: [
                {
                    targets: [0],
                    searchable: false,
                    orderable: false,
                }, {
                    targets: [3],
                    render: function(data, type, row) {
                        var jumlah = parseFloat(data.jumlah);
                        var total = parseFloat(data.total);

                        var support = Math.round(jumlah * 100)/total;
                        return support.toFixed(2)+"%";
                    }
                },
            ],
            pageLength: 5,
            aLengthMenu:[5,10,15,25,50],
            order: [3, 'desc'],
            responsive: {
                details: {
                    type: 'column',
                    target: 'tr'
                }
            },
            createdRow: function( row, data, dataIndex ) {
                //console.log(JSON.stringify(data));
                var jumlah = parseFloat(data.jumlah);
                var total = parseFloat(data.total);
                var support = Math.round(jumlah * 100)/total;

                var minsupport = parseFloat($("#input-min_support").val());

                //console.log("Total Item Set 1 : "+total);

                if(support >= minsupport){
                    $(row).addClass('bg-success');
                }
            }
        });
        tSatu.on( 'order.dt search.dt', function () {
            tSatu.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                cell.innerHTML = i+1;
            } );
        }).draw();

        var tDua = $("#itemsetDua").DataTable({
            responsive: true,
            processing: true,
            autoWidth: true,
            ajax: {
                method: "POST",
                data: function(d){
                    var tgl_mulai = $("#input-tanggal_mulai").val();
                    var tgl_akhir = $("#input-tanggal_akhir").val();
                    var min_supp = $("#input-min_support").val();
                    var reqData = { tanggal_mulai: tgl_mulai, tanggal_akhir: tgl_akhir, min_support: min_supp };
                    return reqData;
                },
                url: "{{ url('penjualan/apriori/dua') }}",
            },
            drawCallback: function(settings) {
                $.ajax({
                    method: "POST",
                    data: {
                        'tanggal_mulai': $("#input-tanggal_mulai").val(),
                        'tanggal_akhir': $("#input-tanggal_akhir").val(),
                        'min_support': $("#input-min_support").val(),
                    },
                    url: "{{ url('penjualan/apriori/dua') }}",
                    cache: false,
                    success: function(result){
                        //console.log(result);
                        if(result.recordsTotal == 0){
                            $("#alert-itemsetDua").slideDown(function(){
                                $(this).removeClass('d-none');
                                $(this).addClass('d-block');
                            });
                        } else {
                            $("#alert-itemsetDua").slideDown(function(){
                                $(this).addClass('d-none');
                                $(this).removeClass('d-block');
                            });
                        }
                    }
                });
            },
            columns: [
                { data: null },
                { data: 'item' },
                { data: 'jumlah' },
                { data: null },
                { data: null },
            ],
            columnDefs: [
                {
                    targets: [0],
                    searchable: false,
                    orderable: false,
                },
                {
                    targets: [3],
                    render: function(data, type, row) {
                        var jumlah = parseFloat(data.jumlah);
                        var total = parseFloat(data.total);

                        var support = Math.round(jumlah * 100)/total;

                        //console.log("Total Item Set 2 : "+total);
                        //console.log("Jumlah : "+jumlah);
                        return support.toFixed(2)+"%";
                    }
                }, {
                    targets: [4],
                    render: function(data, type, row) {
                        var form = "'paketFormDua'";
                        return generateButton(data.id_barang.id_satu, data.id_barang.id_dua, data.id_barang.id_tiga, form);
                    }
                },
            ],
            pageLength: 5,
            aLengthMenu:[5,10,15,25,50],
            order: [2, 'desc'],
            responsive: {
                details: {
                    type: 'column',
                    target: 'tr'
                }
            },
            createdRow: function( row, data, dataIndex ) {
                //console.log(JSON.stringify(data));
                var jumlah = parseFloat(data.jumlah);
                var total = parseFloat(data.total);
                var support = Math.round(jumlah * 100)/total;

                var minsupport = parseFloat($("#input-min_support").val());

                if(support >= minsupport){
                    $(row).addClass('bg-success');
                }
            }
        });
        tDua.on( 'order.dt search.dt', function () {
            tDua.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                cell.innerHTML = i+1;
            } );
        }).draw();

        var tTiga = $("#itemsetTiga").DataTable({
            responsive: true,
            processing: true,
            autoWidth: true,
            ajax: {
                method: "POST",
                data: function(d){
                    var tgl_mulai = $("#input-tanggal_mulai").val();
                    var tgl_akhir = $("#input-tanggal_akhir").val();
                    var min_supp = $("#input-min_support").val();
                    var reqData = { tanggal_mulai: tgl_mulai, tanggal_akhir: tgl_akhir, min_support: min_supp };
                    return reqData;
                },
                url: "{{ url('penjualan/apriori/tiga') }}",
            },
            drawCallback: function(settings) {
                $.ajax({
                    method: "POST",
                    data: {
                        'tanggal_mulai': $("#input-tanggal_mulai").val(),
                        'tanggal_akhir': $("#input-tanggal_akhir").val(),
                        'min_support': $("#input-min_support").val(),
                    },
                    url: "{{ url('penjualan/apriori/tiga') }}",
                    cache: false,
                    success: function(result){
                        //console.log(result);
                        if(result.recordsTotal == 0){
                            $("#alert-itemsetTiga").slideDown(function(){
                                $(this).removeClass('d-none');
                                $(this).addClass('d-block');
                            });
                        } else {
                            $("#alert-itemsetTiga").slideDown(function(){
                                $(this).addClass('d-none');
                                $(this).removeClass('d-block');
                            });
                        }
                    }
                });
            },
            columns: [
                { data: null },
                { data: 'item' },
                { data: 'jumlah' },
                { data: null },
                { data: null },
            ],
            columnDefs: [
                {
                    targets: [0],
                    searchable: false,
                    orderable: false,
                },
                {
                    targets: [3],
                    render: function(data, type, row) {
                        var jumlah = parseFloat(data.jumlah);
                        var total = parseFloat(data.total);

                        var support = Math.round(jumlah * 100)/total;
                        //var support = jumlah/total;
                        return support.toFixed(2)+"%";
                    }
                }, {
                    targets: [4],
                    render: function(data, type, row) {
                        var form = "'paketForm'";
                        return generateButton(data.id_barang.id_satu, data.id_barang.id_dua, data.id_barang.id_tiga, form);
                    }
                },
            ],
            pageLength: 5,
            aLengthMenu:[5,10,15,25,50],
            order: [2, 'desc'],
            responsive: {
                details: {
                    type: 'column',
                    target: 'tr'
                }
            },
            createdRow: function( row, data, dataIndex ) {
                //console.log(JSON.stringify(data));
                var jumlah = parseFloat(data.jumlah);
                var total = parseFloat(data.total);
                var support = Math.round(jumlah * 100)/total;

                var minsupport = parseFloat($("#input-min_support").val());

                if(support >= minsupport){
                    $(row).addClass('bg-success');
                }
            }
        });
        tTiga.on( 'order.dt search.dt', function () {
            tTiga.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                cell.innerHTML = i+1;
            } );
        }).draw();

        var tConf = $("#confTwo").DataTable({
            responsive: true,
            processing: true,
            autoWidth: true,
            ajax: {
                method: "POST",
                data: function(d){
                    var tgl_mulai = $("#input-tanggal_mulai").val();
                    var tgl_akhir = $("#input-tanggal_akhir").val();
                    var min_supp = $("#input-min_support").val();
                    var min_confidence = $("#input-min_confidence").val();
                    var reqData = { tanggal_mulai: tgl_mulai, tanggal_akhir: tgl_akhir, min_support: min_supp, min_conf: min_confidence };
                    return reqData;
                },
                url: "{{ url('penjualan/apriori/conf_dua') }}",
            },
            drawCallback: function(settings) {
                $.ajax({
                    method: "POST",
                    data: {
                        'tanggal_mulai': $("#input-tanggal_mulai").val(),
                        'tanggal_akhir': $("#input-tanggal_akhir").val(),
                        'min_support': $("#input-min_support").val(),
                        'min_conf': $("#input-min_confidence").val()
                    },
                    url: "{{ url('penjualan/apriori/conf_dua') }}",
                    cache: false,
                    success: function(result){
                        console.log(result);
                        if(result.recordsTotal == 0){
                            $("#alert-confTwo").slideDown(function(){
                                $(this).removeClass('d-none');
                                $(this).addClass('d-block');
                            });

                            $("#cm_confTwo").slideDown(function(){
                                $(this).removeClass('d-block');
                                $(this).addClass('d-none');
                            });
                            $("#cm_confTwo-accuracy").val(0);
                            $("#cm_confTwo-recall").val(0);
                            $("#cm_confTwo-precision").val(0);
                        } else {
                            $("#alert-confTwo").slideDown(function(){
                                $(this).addClass('d-none');
                                $(this).removeClass('d-block');
                            });

                            $("#cm_confTwo").slideDown(function(){
                                $(this).removeClass('d-none');
                                $(this).addClass('d-block');
                            });

                            var accuracy = ((result.TP + result.TN)/(result.TP + result.TN + result.FP + result.FN)) * 100;
                            var recall = (result.TP/(result.TP + result.FN)) * 100;
                            var precision = (result.TP/(result.TP + result.FP)) * 100;

                            // console.log("Akurasi 2 Itemset : "+accuracy.toFixed(2));

                            if(isNaN(recall)){
                                if(result.TP == 0){
                                    recall = 0;
                                }
                            }

                            $("#cm_confTwo-accuracy").val(accuracy.toFixed(2));
                            $("#cm_confTwo-recall").val(recall.toFixed(2));
                            $("#cm_confTwo-precision").val(precision.toFixed(2));
                        }
                    }
                });
            },
            columns: [
                { data: null },
                { data: 'item' },
                { data: null },
                { data: null },
                { data: null },
            ],
            columnDefs: [
                {
                    targets: [0],
                    searchable: false,
                    orderable: false,
                }, {
                    targets: [2],
                    render: function(data, type, row) {
                        return parseFloat(data.support_xuy).toFixed(2)+"%";
                    }
                }, {
                    targets: [3],
                    render: function(data, type, row) {
                        return parseFloat(data.support_x).toFixed(2)+"%";
                    }
                }, {
                    targets: [4],
                    render: function(data, type, row) {
                        return parseFloat(data.conf).toFixed(2)+"%";
                    }
                },
            ],
            pageLength: 5,
            aLengthMenu:[5,10,15,25,50],
            order: [4, 'desc'],
            responsive: {
                details: {
                    type: 'column',
                    target: 'tr'
                }
            },
            createdRow: function( row, data, dataIndex ) {
                //console.log(JSON.stringify(data));

                var support = data.support_xuy;
                var minsupport = parseFloat($("#input-min_support").val());
                var conf = data.conf;
                var min_confidence = parseFloat($("#input-min_confidence").val());

                if(conf >= min_confidence){
                    $(row).addClass('bg-danger');
                }
            }
        });
        tConf.on( 'order.dt search.dt', function () {
            tConf.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                cell.innerHTML = i+1;
            } );
        }).draw();

        var tConfThree = $("#confThree").DataTable({
            responsive: true,
            processing: true,
            autoWidth: true,
            ajax: {
                method: "POST",
                data: function(d){
                    var tgl_mulai = $("#input-tanggal_mulai").val();
                    var tgl_akhir = $("#input-tanggal_akhir").val();
                    var min_supp = $("#input-min_support").val();
                    var min_confidence = $("#input-min_confidence").val();
                    var reqData = { tanggal_mulai: tgl_mulai, tanggal_akhir: tgl_akhir, min_support: min_supp, min_conf: min_confidence };
                    return reqData;
                },
                url: "{{ url('penjualan/apriori/conf_tiga') }}",
            },
            drawCallback: function(settings) {
                $.ajax({
                    method: "POST",
                    data: {
                        'tanggal_mulai': $("#input-tanggal_mulai").val(),
                        'tanggal_akhir': $("#input-tanggal_akhir").val(),
                        'min_support': $("#input-min_support").val(),
                        'min_conf': $("#input-min_confidence").val()
                    },
                    url: "{{ url('penjualan/apriori/conf_tiga') }}",
                    cache: false,
                    success: function(result){
                        //console.log(result);
                        if(result.recordsTotal == 0){
                            $("#alert-confThree").slideDown(function(){
                                $(this).removeClass('d-none');
                                $(this).addClass('d-block');
                            });

                            $("#cm_confThree").slideDown(function(){
                                $(this).removeClass('d-block');
                                $(this).addClass('d-none');
                            });
                            $("#cm_confThree-accuracy").val(0);
                            $("#cm_confThree-recall").val(0);
                            $("#cm_confThree-precision").val(0);
                        }else {
                            $("#alert-confThree").slideDown(function(){
                                $(this).addClass('d-none');
                                $(this).removeClass('d-block');
                            });

                            $("#cm_confThree").slideDown(function(){
                                $(this).removeClass('d-none');
                                $(this).addClass('d-block');
                            });

                            var accuracy = ((result.TP + result.TN)/(result.TP + result.TN + result.FP + result.FN)) * 100;
                            var recall = (result.TP/(result.TP + result.FN)) * 100;
                            var precision = (result.TP/(result.TP + result.FP)) * 100;

                            if(isNaN(recall)){
                                if(result.TP == 0){
                                    recall = 0;
                                }
                            }

                            // console.log("Akurasi 3 Itemset: "+accuracy.toFixed(2));

                            $("#cm_confThree-accuracy").val(parseFloat(accuracy).toFixed(2));
                            $("#cm_confThree-recall").val(parseFloat(recall).toFixed(2));
                            $("#cm_confThree-precision").val(parseFloat(precision).toFixed(2));
                        }
                    }
                });
            },
            columns: [
                { data: null },
                { data: 'item' },
                { data: null },
                { data: null },
                { data: null },
            ],
            columnDefs: [
                {
                    targets: [0],
                    searchable: false,
                    orderable: false,
                }, {
                    targets: [2],
                    render: function(data, type, row) {
                        return parseFloat(data.support_xuy).toFixed(2)+"%";
                    }
                }, {
                    targets: [3],
                    render: function(data, type, row) {
                        return parseFloat(data.support_x).toFixed(2)+"%";
                    }
                }, {
                    targets: [4],
                    render: function(data, type, row) {
                        return parseFloat(data.conf).toFixed(2)+"%";
                    }
                },
            ],
            pageLength: 5,
            aLengthMenu:[5,10,15,25,50],
            order: [4, 'desc'],
            responsive: {
                details: {
                    type: 'column',
                    target: 'tr'
                }
            },
            createdRow: function( row, data, dataIndex ) {
                //console.log(JSON.stringify(data));

                var support = data.support_xuy;
                var minsupport = parseFloat($("#input-min_support").val());
                var conf = data.conf;
                var min_confidence = parseFloat($("#input-min_confidence").val());

                if(conf >= min_confidence){
                    $(row).addClass('bg-danger');
                }
            }
        });
        tConfThree.on( 'order.dt search.dt', function () {
            tConfThree.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                cell.innerHTML = i+1;
            } );
        }).draw();

        var tPenempatan = $("#penempatanBarang").DataTable({
            responsive: true,
            processing: true,
            autoWidth: true,
            ajax: {
                method: "POST",
                data: function(d){
                    var tgl_mulai = $("#input-tanggal_mulai").val();
                    var tgl_akhir = $("#input-tanggal_akhir").val();
                    var min_supp = $("#input-min_support").val();
                    var min_confidence = $("#input-min_confidence").val();
                    var reqData = { tanggal_mulai: tgl_mulai, tanggal_akhir: tgl_akhir, min_support: min_supp, min_conf: min_confidence };
                    return reqData;
                },
                url: "{{ url('penjualan/apriori/penempatan') }}",
            },
            columns: [
                {
                    data: 'level',
                    render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },
                { data: 'barang' },
            ],
            pageLength: 5,
            aLengthMenu:[5,10,15,25,50],
        });

        //Linked 2 datetimepicker
        $("#input-tanggal_mulai").on("change.datetimepicker", function (e) {
            $('#input-tanggal_akhir').datetimepicker('minDate', e.date);
            $("#itemsetSatu").DataTable().ajax.reload();
            tDua.ajax.reload();
            tTiga.ajax.reload();
            tConf.ajax.reload();
            tConfThree.ajax.reload();
            tPenempatan.ajax.reload();
        });
        $("#input-tanggal_akhir").on("change.datetimepicker", function (e) {
            $('#input-tanggal_mulai').datetimepicker('maxDate', e.date);
            tSatu.ajax.reload();
            tDua.ajax.reload();
            tTiga.ajax.reload();
            tConf.ajax.reload();
            tConfThree.ajax.reload();
            tPenempatan.ajax.reload();
        });

        $("#input-min_support").on('change', function(e){
            if(($("#input-min_confidence").val() != $("#old_input-min_confidence").val()) || ($("#input-min_support").val() != $("#old_input-min_support").val())){
                $("#btn-save").prop('disabled', false);
            } else {
                $("#btn-save").prop('disabled', true);
            }
        });
        $("#input-min_confidence").on('change', function(e){
            if(($("#input-min_confidence").val() != $("#old_input-min_confidence").val()) || ($("#input-min_support").val() != $("#old_input-min_support").val())){
                $("#btn-save").prop('disabled', false);
            } else {
                $("#btn-save").prop('disabled', true);
            }
        });
        //On Form Submit
        $("#aprioriForm").submit(function(e){
            e.preventDefault();
            tSatu.ajax.reload();
            tDua.ajax.reload();
            tTiga.ajax.reload();
            tConf.ajax.reload();
            tConfThree.ajax.reload();
            tPenempatan.ajax.reload();
        });
        $("#btn-save").click(function(){
            var formMethod = "PUT";
            var url_link = "{{ url('/staff/analisa/apriori').'/1' }}";

            $.ajax({
                method: formMethod,
                url: url_link,
                data: $("#aprioriForm").serialize(),
                cache: false,
                success: function(result){
                    //console.log(result);
                    $("#old_input-min_support").val(result.old_support);
                    $("#old_input-min_confidence").val(result.old_confidence);
                    $("#btn-save").prop('disabled', true);
                    //Show alert
                    topright_notify(result.message);

                    tSatu.ajax.reload();
                    tDua.ajax.reload();
                    tTiga.ajax.reload();
                    tConf.ajax.reload();
                    tConfThree.ajax.reload();
                    tPenempatan.ajax.reload();
                },
                error: function( jqXHR, textStatus, errorThrown ) {
                    console.log(jqXHR);
                }
            });
        });
        $("#btn-default").click(function(e){
            var formMethod = "delete";
            var url_link = "{{ url('/staff/analisa/apriori').'/1' }}";

            $.ajax({
                method: formMethod,
                url: url_link,
                data: $("#aprioriForm").serialize(),
                cache: false,
                success: function(result){
                    //console.log(result);
                    $("#input-min_support").val(result.old_support);
                    $("#old_input-min_support").val(result.old_support);
                    $("#input-min_confidence").val(result.old_confidence);
                    $("#old_input-min_confidence").val(result.old_confidence);
                    $("#btn-save").prop('disabled', true);
                    //Show alert
                    topright_notify(result.message);

                    tSatu.ajax.reload();
                    tDua.ajax.reload();
                    tTiga.ajax.reload();
                    tConf.ajax.reload();
                    tConfThree.ajax.reload();
                    tPenempatan.ajax.reload();
                },
                error: function( jqXHR, textStatus, errorThrown ) {
                    console.log(jqXHR);
                }
            });
        });
        $("#btn-reset").click(function(e){
            e.preventDefault();

            $("#input-min_support").val('{{ $min_support }}');
            $("#input-min_confidence").val('{{ $min_confidence }}');

            tSatu.ajax.reload();
            tDua.ajax.reload();
            tTiga.ajax.reload();
            tConf.ajax.reload();
            tConfThree.ajax.reload();
            tPenempatan.ajax.reload();
        });
    });

    function generateButton(id_satu, id_dua, id_tiga, form){
        var satu = "'"+id_satu+"'";
        var dua = "'"+id_dua+"'";
        var tiga = "'"+id_tiga+"'";
        return '<a onclick="buatPaket('+satu+', '+dua+', '+tiga+', '+form+')" class="btn btn-primary btn-sm text-white"><i class="fa fa-plus"></i></a>';
    }

    function buatPaket(id_satu, id_dua, id_tiga, form){
        $("#modal_"+form).modal({
            show: true
        });
        loadDataBarang(id_satu, id_dua, id_tiga, form);
    }
    function loadDataBarang(id_satu, id_dua, id_tiga, form){
        var data_id = [id_satu, id_dua, id_tiga];

        $.ajax({
            method: "POST",
            url: "{{ url('/data/barang/apriori') }}",
            data: {id: data_id},
            success: function(result){
                //console.log(result);

                $.each(result, function(key, result) {
                    console.log("Key : "+key+" / Result : "+result.barang_nama);

                    $("#"+form+"_input_"+key+"-barang_nama").val(result.barang_nama);
                    $("#"+form+"_input_"+key+"-barang_id").val(result.barang_id);
                    $("#"+form+"_input_"+key+"-harga_asli").val(result.harga_jual);
                    $("#"+form+"_input_"+key+"-harga_item").val(result.harga_jual);
                });
                hitungHargaPaket(form);
            }
        });
        console.log('id_tiga : '+id_tiga);
    }
    $("#modal_paketForm").on('hide.bs.modal', function(){
        $("#alert-paketForm").removeClass('d-block');
        $("#alert-paketForm").addClass('d-none');

        $("#alert-paketForm p").text("");
    });
    $("#paketForm").submit(function(e){
        e.preventDefault();

        var form = 'paketForm';
        paketAction(form);
    });
    $("#paketFormDua").submit(function(e){
        e.preventDefault();

        var form = 'paketFormDua';
        paketAction(form);
    });
    function paketAction(form){
        $(".error-block").remove();
        $(".form-control").removeClass('has-error');
        $(".input-group-text").removeClass('has-error');

        $.ajax({
            method: "POST",
            url: "{{ url('/data/paket/apriori') }}",
            data: $("#"+form).serialize(),
            success: function(result){
                console.log(result);

                if(result.message.includes('Exists')){
                    $("#alert-"+form).addClass('d-block');
                    $("#alert-"+form).removeClass('d-none');

                    $("#alert-"+form+" p").text(result.message);
                } else {
                    topright_notify(result.message);
                }
            },
            error: function( jqXHR, textStatus, errorThrown ) {
                console.log(jqXHR);

                //Print all error message
                $.each(jqXHR.responseJSON.errors, function(key, result) {
                    var field_id = form+"_field-"+key;
                    var input_id = form+"_input-"+key;
                    var input_group_id = form+"_input_group-"+key;
                    //Append Error Field
                    $("#"+input_id).addClass('has-error');
                    $("#"+input_group_id).addClass('has-error');
                    //Append Error Message
                    $("#"+field_id).append("<div class='text-muted error-block'><span class='help-block'><small>"+result+"</small></span></div>");
                });
            }
        });
    }
    {{--  Fungsi untuk perhitungan otomatis  --}}
    function hitungHargaPaket(form){
        var jumlah = 0;
        var jumlah_asli = 0;
        var harga_item = $('.harga_item').length;

        $(".harga_item").each(function(){
            if (!Number.isNaN(parseInt(this.value, 10))){
                //console.log("Perhitungan dijalankan");
                jumlah += parseInt(this.value, 10);
                $("#"+form+"_input-harga_paket").val(parseInt(jumlah));
            }
        });
        $(".harga_asli").each(function(){
            if (!Number.isNaN(parseInt(this.value, 10))){
                //console.log("Perhitungan dijalankan");
                jumlah_asli += parseInt(this.value, 10);
                $("#"+form+"_input-harga_paket_asli").val(parseInt(jumlah_asli));
            }
        });

        console.log(form);
    }
    {{--  /.Fungsi untuk perhitungan otomatis  --}}
</script>
@endsection
