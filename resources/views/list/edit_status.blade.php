@extends('layouts.main')
@section('title', 'Edit Status')

@section('content')

<div class="page has-sidebar-left height-full">
    <header class="dark orange accent-3 relative nav-sticky">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon ico-pencil mr-2"></i>
                       Edit Status
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
                                <div id="alert"></div>
                                <form class="needs-validation" action="{{ route('MasterPesanan.list_orderan.update', $orderan->id) }}" id="form" method="POST"  enctype="multipart/form-data" novalidate>
                                    {{ method_field('PUT') }}
                                    @csrf
                                    <input type="hidden" id="id" value="{{ $orderan->id }}" name="id"/>
                                    <h4 id="formTitle">Edit Status Orderan</h4><hr>
                                    <div class="row">
                                            <div class="col-md-6">
                                                 <div class="form-group">
                                                                
                                                        <div class="col-md-10 p-0 bg-light">
                                                            <label for="status" class="col-form-label s-12 ">STATUS PRODUKSI</label>
                                    
                                                            <select class="select2 form-control r-0 light s-12" name="status" id="stats"   autocomplete="off">
                                                                    <option value="">Pilih</option>
                                                                    <option value="1" {{ $orderan->status == 1 ? 'selected' : '' }}>Sedang Produksi</option>
                                                                    <option value="2"  {{ $orderan->status == 2 ? 'selected' : '' }}>Selesai</option>   
                                                               
                                                            </select>
                                                        </div>
                                                    </div>
        
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                               
                                                       <div class="col-md-10 p-0 bg-light">
                                                           <label for="status_bayar" class="col-form-label s-12 ">STATUS PEMBAYARAN</label>
                                   
                                                           <select class="select2 form-control r-0 light s-12" name="status_bayar" id="status_bayar"   autocomplete="off">
                                                                    <option value="">Pilih</option>
                                                                   <option value="1" {{ $orderan->status == 1 ? 'selected' : '' }}>Belum Lunas</option>
                                                                   <option value="2"  {{ $orderan->status == 2 ? 'selected' : '' }}>Lunas</option>   
                                                              
                                                           </select>
                                                       </div>
                                                   </div>
       
                                           </div>
                                           
                                        </div>
                                        

                                        <div class="mt-3" style="margin-left: ">
                                            <button type="submit" class="btn btn-success btn-sm" ><i class="icon-save mr-2"></i>Rubah<span id="txtAction"></span></button>
                                            
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




@endsection