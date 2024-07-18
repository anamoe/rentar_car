<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="#" class="app-brand-link">
            <span class="app-brand-logo demo">
                <!-- <img style="margin-right: 10px;" src="{{url('public/logo')}}/LOGO YAFO aja.png" class="logo" alt="" height="40px" width="40px"> -->

            </span>

            <span class="" style="color: green;">RAHMANA RENT-CAR</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item {{request()->is('admin/mobil*') ? 'active' : ''}}">
            <a href="{{url('admin/mobil')}}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-car"></i>
                <div data-i18n="Analytics">Mobil</div>
            </a>
        </li>
        <li class="menu-item {{request()->is('admin/paket*') ? 'active' : ''}}">
            <a href="{{url('admin/paket')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-news"></i>
                <div data-i18n="Analytics">Paket</div>
            </a>
        </li>


        <li class="menu-item {{request()->is('admin/akun*') ? 'active' : ''}}">
            <a href="{{url('admin/akun')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-user"></i>

                <div data-i18n="Analytics">Akun</div>
            </a>
        </li>
    
      


        <li class="menu-item {{request()->is('admin/transaksipaket*') ? 'active' : ''}}">
            <a href="{{url('admin/transaksipaket')}}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Transaksi</div>
            </a>
        </li>



    </ul>
</aside>