<ul class="sidebar-menu">
    <li class="header"><strong>MAIN NAVIGATION</strong></li>
    <li class="treeview"><a href="{{route('dashboard')}}">
        <i class="icon icon-sailing-boat-water purple-text s-18"></i> <span>Dashboard</span>
        <i class="icon icon-angle-right s-18 pull-right"></i>
    </a>
    </li>

    <li class="header light"><strong>MASTER AKSES</strong></li>
    <li>
        <a href="{{route('MasterRole.role.index')}}">
            <i class="icon icon-key4 amber-text s-18"></i> <span>Akses</span>
            <i class="icon icon-angle-right s-18 pull-right"></i>
        </a>
    </li>
    <li class="no-b">
        <a href="{{route('MasterRole.permissions.index')}}">
            <i class="icon icon-clipboard-list2 text-success s-18"></i> <span>Hak Akses</span>
            <i class="icon icon-angle-right s-18 pull-right"></i>
        </a>
    </li>
    <li>
        <a href="{{route('MasterRole.pengguna.index')}}"><i class="icon icon-user blue-text s-18"></i>
        <span>Pengguna</span>
        <i class="icon icon-angle-right s-18 pull-right"></i>
        </a>
    </li>

    <li class="header light"><strong>MASTER PESANAN</strong></li>

    <li>
        <a href="{{route('MasterPesanan.order.index')}}"><i class="icon icon-list blue-text s-18"></i>
        <span>Orderan</span>
        <i class="icon icon-angle-right s-18 pull-right"></i>
        </a>
    </li>
    <li>
        <a href="{{route('MasterPesanan.tambah_order.index')}}"><i class="icon icon-plus blue-text s-18"></i>
        <span>Tambah Order</span>
        <i class="icon icon-angle-right s-18 pull-right"></i>
        </a>
    </li>

    <li class="no-b">
        <a href="{{route('MasterPesanan.jenis_barang.index')}}">
            <i class="icon icon-list2 text-success s-18"></i> <span>Jenis Barang</span>
            <i class="icon icon-angle-right s-18 pull-right"></i>
        </a>
    </li>

</ul>
