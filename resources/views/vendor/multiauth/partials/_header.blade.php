<header id="header" class="header">
        <div class="top-left">
            <div class="navbar-header">
                <a class="navbar-brand" href="./"><img src="{{asset('/backend/images/logo.png')}}" alt="Logo"></a>
                <a class="navbar-brand hidden" href="./"><img src="{{asset('/backend/images/logo2.png')}}" alt="Logo"></a>
                <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
            </div>
        </div>
        <div class="top-right">
            <div class="header-menu">
                <div class="header-left">
                    <button class="search-trigger"><i class="fa fa-search"></i></button>
                    <div class="form-inline">
                        <form class="search-form">
                            <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
                            <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                        </form>
                    </div>


                </div>

                <div class="user-area dropdown float-right">
                    <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img class="user-avatar rounded-circle" src="{{asset('/backend/images/admin.jpg')}}" alt="User Avatar">
                    </a>

                    <div class="user-menu dropdown-menu">
                        @admin('super')
                        <a class="nav-link" href="{{ route('admin.show') }}"><i class="fa fa- user"></i>Admin</a>

                        <a class="nav-link" href="{{ route('admin.roles') }}"><i class="fa fa- user"></i>Rules <span class="count">13</span></a>
                        @endadmin
                        <a class="nav-link" href="{{ route('admin.password.change') }}"><i class="fa fa -cog"></i>Change password</a>

                        <a class="nav-link" href="/admin/logout" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"><i class="fa fa-power -off"></i>Logout</a>
                        <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </header>