@extends('layouts.main')
@section('title', 'Laporan Orderan')

@section('content')

<div class="page has-sidebar-left height-full">
    <header class="dark orange accent-3 relative nav-sticky">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon icon-print mr-2"></i>
                        Laporan
                    </h4>
                </div>
            </div>
            
        </div>
    </header>
    <div class="container-fluid relative animatedParent animateOnce">
        <div class="tab-content my-3" id="pills-tabContent">
            <div class="tab-pane animated fadeInUpShort show active" id="semua-data" role="tabpanel">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card no-b">
                            <div class="card-body">
                                

                                    <form class="needs-validation" action="" id="form" method="GET"  enctype="multipart/form-data" novalidate>
    
                                        <input type="hidden" id="id" name="id"/>
                                        <h4 id="formTitle">Laporan Orderan</h4><hr>
                                        <div class="col-md-12" style="margin-left: 30%">
                                            <div class="form-row form-inline">
                                                <div class="form-group mt-3">
                                                    
                                                    <input type="date" name="tanggal_dari" id="tanggal_dari" class="form-control r-0 light s-12" autocomplete="off" required/>
                                                </div>
        
                                                <div class="ml-3 mt-3">S/d</div>
                                                
                                                <div class="form-group mt-3 ml-3">
                                                    
                                                    <input type="date" name="tanggal" id="tanggal" class="form-control r-0 light s-12" autocomplete="off" required/>
                                                </div>
            
                                            </div>
                                            <div class="mt-3" style="margin-left: 9%">
                                                <button type="submit" class="btn orange btn-sm " id="action" style="color: white"><i class="icon-print mr-2"></i>Cetak PDF<span id="txtAction"></span></button>
                                            </div>
                                        </div>
                                    </form>
                               
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection

@section('script')

<script type="text/javascript">


</script>
    
@endsection