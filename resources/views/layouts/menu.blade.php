<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="index.html" class="app-brand-link">
            <img style="width: 40px;" src="{{ asset('logo.png') }}" alt="">
            <span class="demo menu-text fw-bolder ms-2" style="font-size: 20px;">{{ __('messages.panel_name') }}</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item {{ request()->is('admin') ? 'active' : '' }}">
            <a href="/" class="menu-link">
                <i class='menu-icon tf-icons bx bxs-dashboard'></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>

        <!-- Layouts -->
        @can('user_management_access')
            <li
                class="menu-item {{ request()->is('admin/users') || request()->is('admin/users/*') || request()->is('admin/roles') || request()->is('admin/roles/*') || request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active open' : '' }}">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class='menu-icon tf-icons bx bxs-user-circle'></i>
                    <div data-i18n="Layouts">{{ __('messages.staff.title') }} Management</div>
                </a>

                <ul class="menu-sub">
                    @can('permission_access')
                        <li
                            class="menu-item {{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active open' : '' }}">
                            <a href="{{ route('admin.permissions.index') }}" class="menu-link">
                                <div data-i18n="Without menu">Permission</div>
                            </a>
                        </li>
                    @endcan
                    @can('role_access')
                        <li
                            class="menu-item {{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'active open' : '' }}">
                            <a href="{{ route('admin.roles.index') }}" class="menu-link">
                                <div data-i18n="Without menu">Roles</div>
                            </a>
                        </li>
                    @endcan
                    @can('user_access')
                        <li
                            class="menu-item {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active open' : '' }}">
                            <a href="{{ route('admin.users.index') }}" class="menu-link">
                                <div data-i18n="Without menu">{{ __('messages.staff.title') }}</div>
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan

        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">OFFICE</span>
        </li>

        @can('office_management')
            <li
                class="menu-item {{ request()->is('admin/departments') || request()->is('admin/departments/*') || request()->is('admin/positions') || request()->is('admin/positions/*') ? 'active open' : '' }}">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class='menu-icon tf-icons bx bxs-business'></i>
                    <div data-i18n="Account Settings">{{ __('messages.office.title') }}</div>
                </a>
                <ul class="menu-sub">
                    @can('department_access')
                        <li
                            class="menu-item {{ request()->is('admin/departments') || request()->is('admin/departments/*') ? 'active open' : '' }}">
                            <a href="{{ route('admin.departments.index') }}" class="menu-link">
                                <div data-i18n="Account">{{ __('messages.dep.title') }}</div>
                            </a>
                        </li>
                    @endcan
                    @can('position_access')
                        <li
                            class="menu-item {{ request()->is('admin/positions') || request()->is('admin/positions/*') ? 'active open' : '' }}">
                            <a href="{{ route('admin.positions.index') }}" class="menu-link">
                                <div data-i18n="Account">{{ __('messages.positions.title') }}</div>
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan


        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">MEDIA</span>
        </li>

        {{-- blog  --}}
        <li class="menu-item {{ request()->is('admin/blogs') || request()->is('admin/blogs/*') ? 'active' : '' }}">
            <a href="{{ route('admin.blogs.index') }}" class="menu-link">
                <i class='menu-icon tf-icons bx bx-edit'></i>
                <div data-i18n="Analytics">{{ __('messages.blog.title') }}</div>
            </a>
        </li>
    </ul>
</aside>
