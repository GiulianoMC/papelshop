<aside class="main-sidebar">
    <section class="sidebar" style="height: auto;">
        <ul class="sidebar-menu tree" data-widget="tree">
            <li>
                <a href="{{ route("admin.home") }}">
                    <i class="fas fa-fw fa-tachometer-alt">

                    </i>
                    <span>{{ trans('global.dashboard') }}</span>
                </a>
            </li>
            @can('cadastro_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw far fa-address-book">

                        </i>
                        <span>{{ trans('cruds.cadastro.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('pessoa_access')
                            <li class="{{ request()->is('admin/pessoas') || request()->is('admin/pessoas/*') ? 'active' : '' }}">
                                <a href="{{ route("admin.pessoas.index") }}">
                                    <i class="fa-fw far fa-address-card">

                                    </i>
                                    <span>{{ trans('cruds.pessoa.title') }}</span>
                                </a>
                            </li>
                        @endcan
                        @can('perfil_access')
                            <li class="{{ request()->is('admin/perfils') || request()->is('admin/perfils/*') ? 'active' : '' }}">
                                <a href="{{ route("admin.perfils.index") }}">
                                    <i class="fa-fw fab fa-creative-commons-by">

                                    </i>
                                    <span>{{ trans('cruds.perfil.title') }}</span>
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('produto_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw far fa-address-book">

                        </i>
                        <span>{{ trans('cruds.material.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('produto_access')
                            <li class="{{ request()->is('admin/materiais') || request()->is('admin/materiais/*') ? 'active' : '' }}">
                                <a href="{{ route("admin.materiais.index") }}">
                                    <i class="fa-fw far fa-address-card">

                                    </i>
                                    <span>{{ trans('cruds.material.title') }}</span>
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @php($unread = \App\QaTopic::unreadCount())
                <li>
                    <a href="#" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                        <i class="fas fa-fw fa-sign-out-alt">

                        </i>
                        <span>{{ trans('global.logout') }}</span>
                    </a>
                </li>
        </ul>
    </section>
</aside>
