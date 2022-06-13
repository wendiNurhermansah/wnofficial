<ul class="sidebar-menu">
    <li class="header"><strong>MAIN NAVIGATION</strong></li>
    @can('dashboard')
    <li class="treeview"><a href="{{route('dashboard')}}">
        <i class="icon icon-sailing-boat-water purple-text s-18"></i> <span>Dashboard</span>
        <i class="icon icon-angle-right s-18 pull-right"></i>
    </a>
    </li>
    @endcan

    <li class="header light"><strong>MASTER AKSES</strong></li>
    @can('akses')
    <li>
        <a href="{{route('MasterRole.role.index')}}">
            <i class="icon icon-key4 amber-text s-18"></i> <span>Akses</span>
            <i class="icon icon-angle-right s-18 pull-right"></i>
        </a>
    </li>
    @endcan
    @can('Hakses')
    <li class="no-b">
        <a href="{{route('MasterRole.permissions.index')}}">
            <i class="icon icon-clipboard-list2 text-success s-18"></i> <span>Hak Akses</span>
            <i class="icon icon-angle-right s-18 pull-right"></i>
        </a>
    </li>
    @endcan
    @can('pengguna')
    <li>
        <a href="{{route('MasterRole.pengguna.index')}}"><i class="icon icon-user blue-text s-18"></i>
        <span>Pengguna</span>
        <i class="icon icon-angle-right s-18 pull-right"></i>
        </a>
    </li>
    @endcan

    <li class="header light"><strong>MASTER JENIS BARANG</strong></li>
    @can('jenis_pesanan')
        
    

    <li>
        <a href="{{route('MasterPesanan.jenis_pesanan.index')}}"><i class="icon icon-clipboard3 red-text s-18"></i>
        <span>Jenis Pesanan</span>
        <i class="icon icon-angle-right s-18 pull-right"></i>
        </a>
    </li>

    @endcan

    <li class="header light"><strong>MASTER PESANAN</strong></li>

    @can('barang')

   
    <li>
        <a href="{{route('MasterPesanan.list_orderan.index')}}"><i class="icon icon-clipboard-edit2 amber-text s-18"></i>
        <span>List Orderan</span>
        <i class="icon icon-angle-right s-18 pull-right"></i>
        </a>
    </li>


    @endcan

    

    @can('orderan')
    <li>
        <a href="{{route('MasterPesanan.orderan.order')}}"><i class="icon icon-clipboard-add2 green-text s-18"></i>
        <span>Order</span>
        <i class="icon icon-angle-right s-18 pull-right"></i>
        </a>
    </li>

    @endcan
    
    
    
    
</ul>
