<!--=========== BEGIN HEADER SECTION ================-->
<header id="header">
    <!-- BEGIN MENU -->
    <div class="menu_area">
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <!-- FOR MOBILE VIEW COLLAPSED BUTTON -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- LOGO -->
                    <!-- TEXT BASED LOGO -->
                    <a class="navbar-brand" href="index.html"><i class="fa fa-soccer-ball-o"></i>LapanganKu</a>
                    <!-- IMG BASED LOGO  -->
                    <!--  <a class="navbar-brand" href="index.html"><img src="images/logo.png" alt="logo"></a>   -->
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul id="top-menu" class="nav navbar-nav navbar-right main-nav">
                        @if(Auth::check())
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->nama }} <span class="fa fa-angle-down"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    @if(Auth::user()->isPegawai() || Auth::user()->isPemilik())
                                        <li><a href="#">Menu Admin</a></li>
                                    @endif
                                    <li><a href="#">Favorit</a></li>
                                    <li><a href="#">Riwayat penyewaan</a></li>
                                    <li><a href="#">Pengaturan</a></li>
                                    <li><a href="#">Keluar</a></li>
                                </ul>
                            </li>
                        @else
                            <li><a href="">Masuk/Daftar</a></li>
                        @endif
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </nav>
    </div>
    <!-- END MENU -->
</header>
<!--=========== END HEADER SECTION ================-->