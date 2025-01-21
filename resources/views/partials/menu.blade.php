<aside class="main-sidebar">
    <section class="sidebar" style="height: auto;">
        <ul class="sidebar-menu tree" data-widget="tree">
            <li>
                <a href="{{ route("/") }}">
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
                        <!-- @can('pessoa_access')
                            <li class="{{ request()->is('admin/pessoas') || request()->is('admin/pessoas/*') ? 'active' : '' }}">
                                <a href="{{ route("admin.pessoas.index") }}">
                                    <i class="fa-fw far fa-address-card">

                                    </i>
                                    <span>{{ trans('cruds.pessoa.title') }}</span>
                                </a>
                            </li>
                        @endcan -->
                        <!-- @can('perfil_access')
                            <li class="{{ request()->is('admin/perfils') || request()->is('admin/perfils/*') ? 'active' : '' }}">
                                <a href="{{ route("admin.perfils.index") }}">
                                    <i class="fa-fw fab fa-creative-commons-by">

                                    </i>
                                    <span>{{ trans('cruds.perfil.title') }}</span>
                                </a>
                            </li>
                        @endcan -->
                        <!-- @can('cliente_access')
                            <li class="{{ request()->is('admin/clientes') || request()->is('admin/clientes/*') ? 'active' : '' }}">
                                <a href="{{ route("admin.clientes.index") }}">
                                    <i class="fa-fw far fa-handshake">

                                    </i>
                                    <span>{{ trans('cruds.cliente.title') }}</span>
                                </a>
                            </li>
                        @endcan -->
                        <!-- @can('empresa_access')
                            <li class="{{ request()->is('admin/empresas') || request()->is('admin/empresas/*') ? 'active' : '' }}">
                                <a href="{{ route("admin.empresas.index") }}">
                                    <i class="fa-fw fas fa-building">

                                    </i>
                                    <span>{{ trans('cruds.empresa.title') }}</span>
                                </a>
                            </li>
                        @endcan -->
                        @can('material_access')
                            <li class="{{ request()->is('admin/materiais') || request()->is('admin/materiais/*') ? 'active' : '' }}">
                                <a href="{{ route("admin.materiais.index") }}">
                                    <i class="fa-fw fas fa-boxes">

                                    </i>
                                    <span>{{ trans('cruds.material.title') }}</span>
                                </a>
                            </li>
                        @endcan
                        @can('marca_access')
                            <li class="{{ request()->is('admin/marcas') || request()->is('admin/marcas/*') ? 'active' : '' }}">
                                <a href="{{ route("admin.marcas.index") }}">
                                    <i class="fa-fw fas fa-tags">

                                    </i>
                                    <span>{{ trans('cruds.marca.title') }}</span>
                                </a>
                            </li>
                        @endcan
                        @can('categoria_access')
                            <li class="{{ request()->is('admin/categorias') || request()->is('admin/categorias/*') ? 'active' : '' }}">
                                <a href="{{ route("admin.categorias.index") }}">
                                    <i class="fa-fw fas fa-list">

                                    </i>
                                    <span>{{ trans('cruds.categoria.title') }}</span>
                                </a>
                            </li>
                        @endcan
                        @can('frete_access')
                            <li class="{{ request()->is('admin/fretes') || request()->is('admin/fretes/*') ? 'active' : '' }}">
                                <a href="{{ route("admin.fretes.index") }}">
                                    <i class="fa-fw fas fa-boxes">

                                    </i>
                                    <span>{{ trans('cruds.frete.title') }}</span>
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            <!-- @can('relatorio_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-book">

                        </i>
                        <span>{{ trans('cruds.relatorio.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('rel_pessoa_access')
                            <li class="{{ request()->is('admin/rel-pessoas') || request()->is('admin/rel-pessoas/*') ? 'active' : '' }}">
                                <a href="{{ route("admin.rel-pessoas.index") }}">
                                    <i class="fa-fw fas fa-address-card">

                                    </i>
                                    <span>{{ trans('cruds.relPessoa.title') }}</span>
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan -->
            <!-- @can('task_management_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-list">

                        </i>
                        <span>{{ trans('cruds.taskManagement.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('task_status_access')
                            <li class="{{ request()->is('admin/task-statuses') || request()->is('admin/task-statuses/*') ? 'active' : '' }}">
                                <a href="{{ route("admin.task-statuses.index") }}">
                                    <i class="fa-fw fas fa-server">

                                    </i>
                                    <span>{{ trans('cruds.taskStatus.title') }}</span>
                                </a>
                            </li>
                        @endcan
                        @can('task_tag_access')
                            <li class="{{ request()->is('admin/task-tags') || request()->is('admin/task-tags/*') ? 'active' : '' }}">
                                <a href="{{ route("admin.task-tags.index") }}">
                                    <i class="fa-fw fas fa-server">

                                    </i>
                                    <span>{{ trans('cruds.taskTag.title') }}</span>
                                </a>
                            </li>
                        @endcan
                        @can('task_access')
                            <li class="{{ request()->is('admin/tasks') || request()->is('admin/tasks/*') ? 'active' : '' }}">
                                <a href="{{ route("admin.tasks.index") }}">
                                    <i class="fa-fw fas fa-briefcase">

                                    </i>
                                    <span>{{ trans('cruds.task.title') }}</span>
                                </a>
                            </li>
                        @endcan
                        @can('tasks_calendar_access')
                            <li class="{{ request()->is('admin/tasks-calendars') || request()->is('admin/tasks-calendars/*') ? 'active' : '' }}">
                                <a href="{{ route("admin.tasks-calendars.index") }}">
                                    <i class="fa-fw fas fa-calendar">

                                    </i>
                                    <span>{{ trans('cruds.tasksCalendar.title') }}</span>
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan -->
            @can('user_management_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-users">

                        </i>
                        <span>{{ trans('cruds.userManagement.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('permission_access')
                            <li class="{{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : '' }}">
                                <a href="{{ route("admin.permissions.index") }}">
                                    <i class="fa-fw fas fa-unlock-alt">

                                    </i>
                                    <span>{{ trans('cruds.permission.title') }}</span>
                                </a>
                            </li>
                        @endcan
                        @can('role_access')
                            <li class="{{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'active' : '' }}">
                                <a href="{{ route("admin.roles.index") }}">
                                    <i class="fa-fw fas fa-briefcase">

                                    </i>
                                    <span>{{ trans('cruds.role.title') }}</span>
                                </a>
                            </li>
                        @endcan
                        @can('user_access')
                            <li class="{{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">
                                <a href="{{ route("admin.users.index") }}">
                                    <i class="fa-fw fas fa-user">

                                    </i>
                                    <span>{{ trans('cruds.user.title') }}</span>
                                </a>
                            </li>
                        @endcan
                        <!-- @can('team_access')
                            <li class="{{ request()->is('admin/teams') || request()->is('admin/teams/*') ? 'active' : '' }}">
                                <a href="{{ route("admin.teams.index") }}">
                                    <i class="fa-fw fas fa-users">

                                    </i>
                                    <span>{{ trans('cruds.team.title') }}</span>
                                </a>
                            </li>
                        @endcan -->
                        <!-- @can('audit_log_access')
                            <li class="{{ request()->is('admin/audit-logs') || request()->is('admin/audit-logs/*') ? 'active' : '' }}">
                                <a href="{{ route("admin.audit-logs.index") }}">
                                    <i class="fa-fw fas fa-file-alt">

                                    </i>
                                    <span>{{ trans('cruds.auditLog.title') }}</span>
                                </a>
                            </li>
                        @endcan -->
                    </ul>
                </li>
            @endcan

            <!-- @can('user_alert_access')
                <li class="{{ request()->is('admin/user-alerts') || request()->is('admin/user-alerts/*') ? 'active' : '' }}">
                    <a href="{{ route("admin.user-alerts.index") }}">
                        <i class="fa-fw fas fa-bell">

                        </i>
                        <span>{{ trans('cruds.userAlert.title') }}</span>
                    </a>
                </li>
            @endcan -->
            @php($unread = \App\QaTopic::unreadCount())
                <!-- <li class="{{ request()->is('admin/messenger') || request()->is('admin/messenger/*') ? 'active' : '' }}">
                    <a href="{{ route("admin.messenger.index") }}">
                        <i class="fa-fw fa fa-envelope">

                        </i>
                        <span>{{ trans('global.messages') }}</span>
                        @if($unread > 0)
                            <strong>( {{ $unread }} )</strong>
                        @endif
                    </a>
                </li> -->
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
