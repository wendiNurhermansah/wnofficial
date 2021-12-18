<!--Sidebar End-->
<div class="has-sidebar-left">
    <div class="pos-f-t">
    <div class="collapse" id="navbarToggleExternalContent">
        <div class="bg-dark pt-2 pb-2 pl-4 pr-2">
            <div class="search-bar">
                <input class="transparent s-24 text-white b-0 font-weight-lighter w-128 height-50" type="text"
                       placeholder="start typing...">
            </div>
            <a href="#" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-expanded="false"
               aria-label="Toggle navigation" class="paper-nav-toggle paper-nav-white active "><i></i></a>
        </div>
    </div>
</div>
    <div class="sticky">
        <div class="navbar navbar-expand navbar-dark d-flex justify-content-between bd-navbar blue accent-3">
            <div class="relative">
                <a href="#" data-toggle="push-menu" class="paper-nav-toggle pp-nav-toggle">
                    <i></i>
                </a>
            </div>
            <div id="navigasi" class="row m-t-12">
                <li type="none" class="mr-1 ml-2 fs-13 text-white">
                    <i class="icon icon-calendar-check-o"></i>
                    <a id="hari"></a>
                    ,
                    <a id="tanggal"></a>
                    <a id="bulan"></a>
                    <a id="tahun"></a>
                    /
                </li>
                <li type="none" class="fs-13 text-white">
                    <a id="jam"></a>
                    :
                    <a id="menit"></a>
                    :
                    <a id="detik"></a>
                </li>
            </div>
            <!--Top Menu Start -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- Messages-->
                    <li class="dropdown custom-dropdown messages-menu">
                        <a href="#" class="nav-link" data-toggle="dropdown">
                            <i class="icon-message "></i>
                            <span class="badge badge-success badge-mini rounded-circle">4</span>
                        </a>

                        <ul class="dropdown-menu dropdown-menu-right">
                            <li>
                                <!-- inner menu: contains the actual data -->
                                <ul class="menu pl-2 pr-2">
                                    <!-- start message -->
                                    <li>
                                        <a href="#">
                                            <div class="avatar float-left">
                                                <img src="{{asset('assets/img/dummy/u4.png')}}" alt="">
                                                <span class="avatar-badge busy"></span>
                                            </div>
                                            <h4>
                                                Support Team
                                                <small><i class="icon icon-clock-o"></i> 5 mins</small>
                                            </h4>
                                            <p>Why not buy a new awesome theme?</p>
                                        </a>
                                    </li>
                                    <!-- end message -->
                                    <!-- start message -->
                                    <li>
                                        <a href="#">
                                            <div class="avatar float-left">
                                                <img src="{{asset('assets/img/dummy/u1.png')}}" alt="">
                                                <span class="avatar-badge online"></span>
                                            </div>
                                            <h4>
                                                Support Team
                                                <small><i class="icon icon-clock-o"></i> 5 mins</small>
                                            </h4>
                                            <p>Why not buy a new awesome theme?</p>
                                        </a>
                                    </li>
                                    <!-- end message -->
                                    <!-- start message -->
                                    <li>
                                        <a href="#">
                                            <div class="avatar float-left">
                                                <img src="{{asset('assets/img/dummy/u2.png')}}" alt="">
                                                <span class="avatar-badge idle"></span>
                                            </div>
                                            <h4>
                                                Support Team
                                                <small><i class="icon icon-clock-o"></i> 5 mins</small>
                                            </h4>
                                            <p>Why not buy a new awesome theme?</p>
                                        </a>
                                    </li>
                                    <!-- end message -->
                                    <!-- start message -->
                                    <li>
                                        <a href="#">
                                            <div class="avatar float-left">
                                                <img src="{{asset('assets/img/dummy/u3.png')}}" alt="">
                                                <span class="avatar-badge busy"></span>
                                            </div>
                                            <h4>
                                                Support Team
                                                <small><i class="icon icon-clock-o"></i> 5 mins</small>
                                            </h4>
                                            <p>Why not buy a new awesome theme?</p>
                                        </a>
                                    </li>
                                    <!-- end message -->
                                </ul>
                            </li>
                            <li class="footer s-12 p-2 text-center"><a href="#">See All Messages</a></li>
                        </ul>
                    </li>
                    <!-- Notifications -->
                    <li class="dropdown custom-dropdown notifications-menu">
                        <a href="#" class=" nav-link" data-toggle="dropdown" aria-expanded="false">
                            <i class="icon-notifications "></i>
                            <span class="badge badge-danger badge-mini rounded-circle">4</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li class="header">You have 10 notifications</li>
                            <li>
                                <!-- inner menu: contains the actual data -->
                                <ul class="menu">
                                    <li>
                                        <a href="#">
                                            <i class="icon icon-data_usage text-success"></i> 5 new members joined today
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="icon icon-data_usage text-danger"></i> 5 new members joined today
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="icon icon-data_usage text-yellow"></i> 5 new members joined today
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="footer p-2 text-center"><a href="#">View all</a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="nav-link " data-toggle="collapse" data-target="#navbarToggleExternalContent"
                        aria-controls="navbarToggleExternalContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                            <i class=" icon-search3 "></i>
                        </a>
                    </li>
                    <!-- Right Sidebar Toggle Button -->
                    <li>
                        <a class="nav-link ml-2" data-toggle="control-sidebar">
                            <i class="icon-tasks "></i>
                        </a>
                    </li>
                    <!-- User Account-->
                    <li class="dropdown custom-dropdown user user-menu ">
                        <a href="#" class="nav-link" data-toggle="dropdown">
                            <img src="{{asset('assets/img/dummy/u8.png')}}" class="user-image" alt="User Image">
                            <i class="icon-more_vert "></i>
                        </a>
                        <div class="dropdown-menu p-4 dropdown-menu-right">
                            <div class="row box justify-content-between my-4">
                                <div class="col">
                                    <a href="#">
                                        <i class="icon-apps purple lighten-2 avatar  r-5"></i>
                                        <div class="pt-1">Apps</div>
                                    </a>
                                </div>
                                <div class="col"><a href="#">
                                    <i class="icon-beach_access pink lighten-1 avatar  r-5"></i>
                                    <div class="pt-1">Profile</div>
                                </a></div>
                                <div class="col">
                                    <a href="#">
                                        <i class="icon-perm_data_setting indigo lighten-2 avatar  r-5"></i>
                                        <div class="pt-1">Settings</div>
                                    </a>
                                </div>
                            </div>
                            <div class="row box justify-content-between my-4">
                                <div class="col">
                                    <a href="#">
                                        <i class="icon-star light-green lighten-1 avatar  r-5"></i>
                                        <div class="pt-1">Favourites</div>
                                    </a>
                                </div>
                                <div class="col">
                                    <a href="#">
                                        <i class="icon-save2 orange accent-1 avatar  r-5"></i>
                                        <div class="pt-1">Saved</div>
                                    </a>
                                </div>
                                <div class="col">
                                    <a href="#">
                                        <i class="icon-perm_data_setting grey darken-3 avatar  r-5"></i>
                                        <div class="pt-1">Settings</div>
                                    </a>
                                </div>
                            </div>
                            <hr>
                            <div class="row box justify-content-between my-4">
                                <div class="col">
                                    <a href="#">
                                        <i class="icon-apps purple lighten-2 avatar  r-5"></i>
                                        <div class="pt-1">Apps</div>
                                    </a>
                                </div>
                                <div class="col"><a href="#">
                                    <i class="icon-beach_access pink lighten-1 avatar  r-5"></i>
                                    <div class="pt-1">Profile</div>
                                </a></div>
                                <div class="col">
                                    <a href="#">
                                        <i class="icon-perm_data_setting indigo lighten-2 avatar  r-5"></i>
                                        <div class="pt-1">Settings</div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<script>
    // Hours
    window.setTimeout("waktu()", 1000);

    function addZero(i) {
        if (i < 10) {
            i = "0" + i;
        }
        return i;
    }

    function waktu() {
        var waktu = new Date();
        setTimeout("waktu()", 1000);
        document.getElementById("jam").innerHTML = addZero(waktu.getHours());
        document.getElementById("menit").innerHTML = addZero(waktu.getMinutes());
        document.getElementById("detik").innerHTML = addZero(waktu.getSeconds());
    }

    // Day
    arrHari = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jum'at", "Sabtu"]
    Hari = new Date().getDay();
    document.getElementById("hari").innerHTML = arrHari[Hari];

    // Date
    Tanggal = new Date().getDate();
    document.getElementById("tanggal").innerHTML = Tanggal;

    // Month
    arrbulan = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
    Bulan = new Date().getMonth();
    document.getElementById("bulan").innerHTML = arrbulan[Bulan];

    // Year
    Tahun = new Date().getFullYear();
    document.getElementById("tahun").innerHTML = Tahun;

</script>
