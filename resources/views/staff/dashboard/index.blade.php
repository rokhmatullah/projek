@extends('layouts.staff')

{{--  Require CSS for this Page  --}}
@section('plugin_css')
    <link href="{{ asset('plugins/dataTables/datatables.css') }}" rel="stylesheet">
@endsection

{{-- Content Header --}}
@section('staff_content_title')
    <button class="btn btn-warning"><h1 class="m-0 text-dark">Dashboard</h1></button>
@endsection
@section('staff_content_breadcrumb')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ url('/staff') }}">Home</a></li>
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>
@endsection{{-- Content Header --}}

{{--  Require Js for this page  --}}
@section('plugins_js')
    <script src="{{ asset('plugins/dataTables/datatables.js') }}"></script>
    <script src="{{ asset('plugins/dataTables/Responsive-2.2.1/js/dataTables.responsive.js') }}"></script>
@endsection

@section('staff_content')
    

    @if (session('confirmation-success'))
        <div class="alert alert-success">
            {{ session('confirmation-success') }}
        </div>
    @endif

    <div class="row">

        <div class="col-12">
            <div class="card collapsed-card shadow">
                <div class="card-header bg-success">
                    <h3 class="card-title">List Barang (Stok < 5)</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-widget="collapse">
                            <i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="table_barang-stok" class="table table-striped table-bordered" style="width:100%;">
                        <thead>
                            <tr class="bg-primary">
                                <th style="white-space: nowrap;">No</th>
                                <th class="desktop">Kode</th>
                                <th class="desktop">ID</th>
                                <th class="all">Nama Barang</th>
                                <th class="desktop">Harga Jual</th>
                                <th class="all">Stok</th>
                            </tr>
                        </thead>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>

            <div class="card shadow">
                <div class="card-header bg-success">
                    <h3 class="card-title">List Barang</h3>
                </div>
                <div class="card-body">
                    <table id="table_barang" class="table table-striped table-bordered" style="width:100%;">
                        <thead>
                            <tr class="bg-primary">
                                <th>No</th>
                                <th class="desktop">Kode</th>
                                <th class="desktop">ID</th>
                                <th class="all">Nama Barang</th>
                                <th class="desktop">Harga Beli</th>
                                <th class="desktop">Harga Jual</th>
                                <th class="all">Stok</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('inline_js')
<script>
    $(document).ready(function(){
        $("#mn-dashboard").addClass('active');

        var tbarang = $("#table_barang").DataTable({
            responsive: true,
            processing: true,
            autoWidth: true,
            ajax: {
                method: "GET",
                url: "{{ url('list/barang') }}",
            },
            columns: [
                { data: null },
                { data: null },
                { data: null },
                { data: 'barang_nama' },
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
                    targets: [1],
                    render: function(data, type, row) {
                        return data.kategori['kategori_kode'];
                    }
                },
                {
                    targets: [2],
                    render: function(data, type, row) {
                        return data['barang_kode'];
                    }
                },{
                    targets: [4],
                    render: function(data, type, row) {
                        var angka = parseInt(data['barang_hBeli']);
                        return idr_curr(angka);
                    }
                }, {
                    targets: [5],
                    render: function(data, type, row) {
                        var angka = parseInt(data['barang_hJual']);
                        return idr_curr(angka);
                    }
                }, {
                    targets: [6],
                    render: function(data, type, row) {
                        if(data['barang_stokStatus'] == "Aktif"){
                            return data['barang_stok'];
                        } else {
                            return "-";
                        }
                    }
                }
            ],
            pageLength: 5,
            aLengthMenu:[5,10,15,25,50],
            order: [1, 'asc'],
            responsive: {
                details: {
                    type: 'column',
                    target: 'tr'
                }
            }
        });
        tbarang.on( 'order.dt search.dt', function () {
            tbarang.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                cell.innerHTML = i+1;
            } );
        }).draw();

        var tStok = $("#table_barang-stok").DataTable({
            responsive: true,
            processing: true,
            autoWidth: true,
            ajax: {
                method: "GET",
                url: "{{ url('list/barang/stok') }}",
            },
            columns: [
                { data: null },
                { data: null },
                { data: null },
                { data: 'barang_nama' },
                { data: null },
                { data: null },
            ],
            columnDefs: [
                {
                    targets: [0],
                    searchable: false,
                    orderable: false,
                }, {
                    targets: [1],
                    render: function(data, type, row) {
                        return data.kategori['kategori_kode'];
                    }
                },
                {
                    targets: [2],
                    render: function(data, type, row) {
                        return data['barang_kode'];
                    }
                },{
                    targets: [4],
                    render: function(data, type, row) {
                        var angka = parseInt(data['barang_hJual']);
                        return idr_curr(angka);
                    }
                }, {
                    targets: [5],
                    render: function(data, type, row) {
                        return data['barang_stok'];
                    }
                }
            ],
            pageLength: 5,
            aLengthMenu:[5,10,15,25,50],
            order: [1, 'asc'],
            responsive: {
                details: {
                    type: 'column',
                    target: 'tr'
                }
            }
        });
        tStok.on( 'order.dt search.dt', function () {
            tStok.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                cell.innerHTML = i+1;
            } );
        }).draw();
    });

    //Resend Link
    function resend_link(){
        //Resend email verify code via ajax
        $.ajax({
            method: "GET",
            url: "{{ url('/confirmation/resend') }}",
            success: function(result){
                console.log(result);
                $("#alert_section").append('<div class="alert alert-info alert-dismissible" id="resend_alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fa fa-info"></i> Alert!</h5><small>'+result+'</small></div>');
            },
            error: function( jqXHR, textStatus, errorThrown ) {
                console.log(jqXHR);
            }
        });
    }
</script>
@endsection
