<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="#" class="app-brand-link">
            <span class="app-brand-logo demo">
                <!-- <img style="margin-right: 10px;" src="{{url('public/logo')}}/LOGO YAFO aja.png" class="logo" alt="" height="40px" width="40px"> -->

            </span>

            <span class="" style="color: #179bbd;">RAHMANA RENT-CAR</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboard -->

        @if(auth()->user()->role=='admin')
        <li class="menu-item {{request()->is('admin/mobil*') ? 'active' : ''}}">
            <a href="{{url('admin/mobil')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-car"></i>
                <div data-i18n="Analytics">Mobil</div>
            </a>
        </li>
        <li class="menu-item {{request()->is('admin/paketrental*') ? 'active' : ''}}">
            <a href="{{url('admin/paketrental')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-news"></i>
                <div data-i18n="Analytics">Paket Rental</div>
            </a>
        </li>


        <li class="menu-item {{request()->is('admin/akun*') ? 'active' : ''}}">
            <a href="{{url('admin/akun')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-user"></i>

                <div data-i18n="Analytics">Akun</div>
            </a>
        </li>

        <li class="menu-item {{request()->is('admin/transaksi-paket*') ? 'active' : ''}}">
            <a href="{{url('admin/transaksi-paket')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Transaksi Paket Rental</div>
            </a>
        </li>
        @elseif(auth()->user()->role=='driver')
        <li class="menu-item {{request()->is('admin/transaksi-paket*') ? 'active' : ''}}">
            <a href="{{url('driver/laporan-kerusakan')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Laporan Kerusakan</div>
            </a>
        </li>
        <li class="menu-item {{request()->is('driver/transaksi-paket*') ? 'active' : ''}}">
            <a href="{{url('driver/transaksi-paket')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Orderan</div>
            </a>
        </li>
        @elseif(auth()->user()->role=='owner')
        <li class="menu-item {{request()->is('admin/transaksi-paket*') ? 'active' : ''}}">
            <a href="{{url('owner/laporan-kerusakan')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Riwayat Laporan Kerusakan</div>

            </a>
        </li>
        @endif


    </ul>
</aside>