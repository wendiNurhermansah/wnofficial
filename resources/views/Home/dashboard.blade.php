@extends('layouts.main')
@section('title', 'Dashboard')

@section('content')
<div class="page has-sidebar-left height-full">
    <header class="dark orange accent-3 relative nav-sticky">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon-box"></i>
                        Dashboard
                    </h4>
                </div>
            </div>
        </div>
    </header>
<div class="container-fluid relative animatedParent animateOnce">
    <div class="tab-content pb-3" id="v-pills-tabContent">
        <div class="tab-pane animated fadeInUpShort show active" id="v-pills-1">

            {{-- COUNT --}}
            <div class="row mt-3 mb-4" style="height: 100%">

                <div class="col-md-4" style="cursor:pointer">
                    <div class="counter-box white r-5 p-3" style="height: 110%">
                        <div class="p-4">
                            <div class="float-right">
                                <span class="icon icon-list  s-48"></span>
                            </div>
                            <div class="counter-title"><strong>Seluruh Orderan</strong></div>
                            <h5 class="sc-counter mt-3">{{ $jumlah_orderan }}</h5>
                            <div class="counter-title">Orderan</div>
                            
                        </div>
                        
                    </div>
                </div>
                {{-- <div class="col-md-3" style="cursor:pointer">
                    <div class="counter-box white r-5 p-3"  style="height: 110%">
                        <div class="p-4">
                            <div class="float-right">
                                <span class="icon icon-factory  s-48"></span>
                            </div>
                            <div class="counter-title"><strong>Sedang Produksi</strong></div>
                            <h5 class="sc-counter mt-3">{{ $produksi }}</h5>
                            <div class="counter-title">Orderan</div>
                        </div>
                    </div>
                </div> --}}
                <div class="col-md-4" style="cursor:pointer">
                    <div class="counter-box white r-5 p-3"  style="height: 110%">
                        <div class="p-4">
                            <div class="float-right">
                                <span class="icon icon-investment-3  s-48"></span>
                            </div>
                            <div class="counter-title"><strong>Laba Kotor</strong></div>
                            <h5 class=" mt-3">Rp. {{ number_format("$bersih", 2) }}</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-4" style="cursor:pointer">
                    <div class="counter-box white r-5 p-3"  style="height: 110%">
                        <div class="p-4">
                            <div class="float-right">
                                <span class="icon icon-money-bag  s-48"></span>
                            </div>
                            <div class="counter-title"><strong>Laba Bersih</strong></div>
                            <h5 class="mt-3">Rp. {{  number_format("$laba_bersih", 2) }}</h5>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="row mt-5 mb-4" style="height: 100%">
                <div class="col-md-6" style="cursor:pointer">
                    <div class="counter-box white r-5 p-3"  style="height: 110%">
                        <div class="p-4">
                            <div class="float-right">
                                <span class="icon icon-check  s-48"></span>
                            </div>
                            <div class="counter-title"><strong>Orderan Selesai</strong></div>
                            <h5 class="sc-counter mt-3">{{ $selesai }}</h5>
                            <div class="counter-title">Pcs</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6" style="cursor:pointer">
                    <div class="counter-box white r-5 p-3"  style="height: 110%">
                        <div class="p-4">
                            <div class="float-right">
                                <span class="icon icon-factory s-48"></span>
                            </div>
                            <div class="counter-title"><strong>Orderan Sedang Produksi</strong></div>
                            <h5 class="sc-counter mt-3">{{ $produksi }}</h5>
                            <div class="counter-title">Pcs</div>
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
