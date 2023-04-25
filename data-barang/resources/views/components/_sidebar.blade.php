<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
        <a href="index.html">{{ config('app.name') }}</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
        <a href="index.html">Hd</a>
    </div>
    <ul class="sidebar-menu">

        <li class="menu-header">Dashboard</li>
        <li class="{{ request()->is('dashboard') ? 'active' : '' }}"><a class="nav-link"
                href="{{ route('dashboard')}}"><i class="fas fa-fire"></i>
                <span>Dashboard</span></a>
        </li>

        {{-- master data --}}
        <li class="menu-header">Master Data</li>
        <li class="nav-item dropdown {{ request()->is('master-data*') ? 'active' : '' }}">
            <a href="#" class="nav-link has-dropdown"><i class="far fa-file-alt"></i> <span>Master Data</span></a>
            <ul class="dropdown-menu">
                <li class="{{ request()->is('master-data/kategori*') ? 'active' : '' }}"><a
                        class="{{ request()->is('master-data/kategori*') ? 'beep beep-sidebar' : '' }}"
                        href="{{ route('admin.kategori.index')}}">Kategori</a>
                </li>
                <li class="{{ request()->is('master-data/barang*') ? 'active' : '' }}"><a
                        class="{{ request()->is('master-data/barang*') ? 'beep beep-sidebar' : '' }}"
                        href="{{ route('admin.barang.index')}}">Barang</a></li>
            </ul>
        </li>
        <li class="{{ request()->is('admin/invoice*') ? 'active' : '' }}"><a class="nav-link"
                href="{{ route('admin.incoive')}}"><i class="fas fa-fire"></i> <span>Invoice</span></a>
        </li>



    </ul>
</aside>
