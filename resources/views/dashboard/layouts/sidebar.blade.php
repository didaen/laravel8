<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-body-tertiary sidebar collapse">
    <div class="position-sticky pt-3 sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page" href="/dashboard">
                <span data-feather="home" class="align-text-bottom"></span>
                Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/posts*') ? 'active' : '' }}" href="/dashboard/posts">
                <span data-feather="file-text" class="align-text-bottom"></span>
                My Post
                </a>
            </li>
        </ul>

        {{-- Membuat bagian terpisah karena nantinya hanya akan bisa diakses oleh admin --}}
        {{-- Menggunakan GATE untuk membatasi hak akses dengan can() dan endcan() dengan 'admin' adalah nama GATE nya --}}
        @can('admin')
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>Administrator</span>
        </h6>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/categories*') ? 'active' : '' }}" href="/dashboard/categories">
                    <span data-feather="hash" class="align-text-bottom"></span>
                    Post Categories
                </a>
            </li>
        </ul>
        @endcan
    </div>
</nav>