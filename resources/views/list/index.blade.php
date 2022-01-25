@extends('layouts.main')
@section('title', 'Daftar Orderan')

@section('content')

<div class="page has-sidebar-left height-full">
    <header class="dark orange accent-3 relative nav-sticky">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon icon-list mr-2"></i>
                        List Orderan Masuk
                    </h4>
                </div>
            </div>
            
        </div>
    </header>
    <div class="row mt-5">
        <div class="col-12">
            <div class="box">
                <div class="box-header">
                    
                    
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tbody>
                        <tr>
                            <th>NO</th>
                            <th>KODE</th>
                            <th>NAMA CUSTOMER</th>
                            <th>TELEPON</th>
                            <th>ALAMAT</th>
                            <th>JENIS PESANAN</th>
                            <th>STATUS</th>
                            <th>TINDAKAN</th>
                        </tr>
                       <tr>
                           <td></td>
                           <td></td>
                           <td></td>
                           <td></td>
                           <td></td>
                           <td></td>
                           <td></td>
                           <td></td>
                       </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>

</div>

@endsection