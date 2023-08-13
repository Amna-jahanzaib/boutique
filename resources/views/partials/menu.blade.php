<div class="sidebar">
    <nav class="sidebar-nav">

        <ul class="nav">
            @can('admin_profile')
            @if(Auth::User()->photo)
            <div class="profile ">
                <a href="{{ route('admin.profile') }}">
                    <img src="{{ Auth::User()->photo->getUrl('thumb') }}" class="nav-icon img-circle img-responsive center-block " id="user-image" alt="Logo" style=" margin-top:10px; margin-bottom: 5px; border: 3px solid white;border-radius: 100%;width:50px; height:50px; display: block; margin-left: auto;margin-right: auto;width: 40%;">

                </a>
                <li class="nav-item disabled" style="text-align:center">
                    <a href="{{ route('admin.profile') }}" class="nav-link " id="username">
                        @if(Auth::check())
                        {{Auth::User()->name}}
                        @endif
                    </a>
                    <hr style="color:white;">
                </li>
            </div>
            @endif

            <li class="nav-item">
                <a href="{{ route("admin.home") }}" class="nav-link">
                    <i class="nav-icon fas fa-fw fa-tachometer-alt">

                    </i>
                    {{ trans('global.dashboard') }}
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route("admin.messages.index") }}" class="nav-link {{ request()->is('admin/messages') || request()->is('admin/messages/*') ? 'active' : '' }}">
                    <i class="fa-fw fas fa-envelope nav-icon">

                    </i>
                    Messages
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route("admin.orders.index") }}" class="nav-link {{ request()->is('admin/orders') || request()->is('admin/orders/*') ? 'active' : '' }}">
                    <i class="fa-fw fas fa-plus nav-icon">

                    </i>
                    Orders
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route("admin.payments.index") }}" class="nav-link {{ request()->is('admin/payments') || request()->is('admin/payments/*') ? 'active' : '' }}">
                    <i class="fa-fw fas fa-money nav-icon">

                    </i>
                    Payments
                </a>
            </li>
            
            <li class="nav-item nav-dropdown">
                <a class="nav-link  nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-users nav-icon">

                    </i>

                    User Management
                </a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a href="{{ route("admin.permissions.index") }}" class="nav-link {{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : '' }}">
                            <i class="fa-fw fas fa-unlock-alt nav-icon">

                            </i>
                            {{ trans('cruds.permission.title') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route("admin.roles.index") }}" class="nav-link {{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'active' : '' }}">
                            <i class="fa-fw fas fa-briefcase nav-icon">

                            </i>
                            {{ trans('cruds.role.title') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route("admin.users.index") }}" class="nav-link {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">
                            <i class="fa-fw fas fa-user nav-icon">

                            </i>
                            {{ trans('cruds.user.title') }}
                        </a>
                    </li>

                </ul>
            </li>

            @endcan


            

            @can('vendor_profile')
            @if(Auth::User()->photo)
            <a href="{{ route('vendor.profile') }}">
                <img src="{{ Auth::User()->photo->getUrl('thumb') }}" class="nav-icon img-circle img-responsive center-block" id="user-image" alt="Logo" style=" margin-top:10px; margin-bottom: 5px; border: 3px solid white;border-radius: 100%;width:50px; height:50px;margin-left:40%">

            </a>
            @endif
            <li class="nav-item disabled" style="text-align:center">
                <a href="{{ route('vendor.profile') }}" class="nav-link " id="username">
                    @if(Auth::check())
                    {{Auth::User()->name}}
                    @endif
                </a>
                <hr style="color:white;">
            </li>
            <li class="nav-item">
                <a href="{{ route("vendor.dashboard") }}" class="nav-link">
                    <i class="nav-icon fas fa-fw fa-tachometer-alt">

                    </i>
                    {{ trans('global.dashboard') }}
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route("vendor.categories.index") }}" class="nav-link">
                    <i class="nav-icon fas fa-plus">

                    </i>
                    Categories
                </a>
            </li>
            
            <li class="nav-item">
                <a href="{{ route("vendor.products.index") }}" class="nav-link">
                    <i class="nav-icon fas fa-plus">

                    </i>
                    Products
                </a>
            </li>

            @endcan
            

            <li class="nav-item">
                <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                    <i class="nav-icon fas fa-fw fa-sign-out-alt">

                    </i>
                    Logout
                </a>
            </li>
        </ul>

    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>