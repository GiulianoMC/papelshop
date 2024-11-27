<?php

use App\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => '1',
                'title' => 'user_management_access',
                'description' => ' Usuários - Gerenciamento - Acessar',
            ],
            [
                'id'    => '2',
                'title' => 'permission_create',
                'description' => 'Permissão - Criar',
            ],
            [
                'id'    => '3',
                'title' => 'permission_edit',
                'description' => 'Permissão - Editar',
            ],
            [
                'id'    => '4',
                'title' => 'permission_show',
                'description' => 'Permissão - Mostrar',
            ],
            [
                'id'    => '5',
                'title' => 'permission_delete',
                'description' => 'Permissão - Deletar',
            ],
            [
                'id'    => '6',
                'title' => 'permission_access',
                'description' => 'Permissão - Acessar',
            ],
            [
                'id'    => '7',
                'title' => 'role_create',
                'description' => 'Funções - Criar',
            ],
            [
                'id'    => '8',
                'title' => 'role_edit',
                'description' => 'Funções - Editar',
            ],
            [
                'id'    => '9',
                'title' => 'role_show',
                'description' => 'Funções - Mostrar',
            ],
            [
                'id'    => '10',
                'title' => 'role_delete',
                'description' => 'Funções - Deletar',
            ],
            [
                'id'    => '11',
                'title' => 'role_access',
                'description' => 'Funções - Acesso ',
            ],
            [
                'id'    => '12',
                'title' => 'user_create',
                'description' => 'Usuário - Criar',
            ],
            [
                'id'    => '13',
                'title' => 'user_edit',
                'description' => 'Usuário - Editar',
            ],
            [
                'id'    => '14',
                'title' => 'user_show',
                'description' => 'Usuário - Mostrar',
            ],
            [
                'id'    => '15',
                'title' => 'user_delete',
                'description' => 'Usuário - Deletar',
            ],
            [
                'id'    => '16',
                'title' => 'user_access',
                'description' => 'Usuário - Acesso',
            ],
            [
                'id'    => '17',
                'title' => 'cadastro_access',
                'description' => 'Cadastros - Acesso ',
            ],
            [
                'id'    => '18',
                'title' => 'pessoa_create',
                'description' => 'Pessoas - Criar',
            ],
            [
                'id'    => '19',
                'title' => 'pessoa_edit',
                'description' => 'Pessoas - Editar',
            ],
            [
                'id'    => '20',
                'title' => 'pessoa_show',
                'description' => 'Pessoas - Mostrar',
            ],
            [
                'id'    => '21',
                'title' => 'pessoa_delete',
                'description' => 'Pessoas - Deletar',
            ],
            [
                'id'    => '22',
                'title' => 'pessoa_access',
                'description' => 'Pessoas - Acesso',
            ],
            [
                'id'    => '24',
                'title' => 'perfil_create',
                'description' => 'Perfil - Criar',
            ],
            [
                'id'    => '25',
                'title' => 'perfil_edit',
                'description' => 'Perfil - Editar',
            ],
            [
                'id'    => '26',
                'title' => 'perfil_show',
                'description' => 'Perfil - Mostrar',
            ],
            [
                'id'    => '27',
                'title' => 'perfil_delete',
                'description' => 'Perfil - Deletar',
            ],
            [
                'id'    => '28',
                'title' => 'perfil_access',
                'description' => 'Perfil - Acessar',
            ],
            [
                'id'    => '34',
                'title' => 'team_create',
                'description' => 'Time - Criar',
            ],
            [
                'id'    => '35',
                'title' => 'team_edit',
                'description' => 'Time - Editar',
            ],
            [
                'id'    => '36',
                'title' => 'team_show',
                'description' => 'Time - Mostrar',
            ],
            [
                'id'    => '37',
                'title' => 'team_delete',
                'description' => 'Time - Deletar',
            ],
            [
                'id'    => '38',
                'title' => 'team_access',
                'description' => 'Time - Acessar',
            ],
            [
                'id'    => '39',
                'title' => 'task_management_access',
                'description' => 'Tarefas - Gerenciamento - Acesso',
            ],
            [
                'id'    => '40',
                'title' => 'task_status_create',
                'description' => 'Tarefas - Status - Criar',
            ],
            [
                'id'    => '41',
                'title' => 'task_status_edit',
                'description' => 'Tarefas - Status - Editar',
            ],
            [
                'id'    => '42',
                'title' => 'task_status_show',
                'description' => 'Tarefas - Status - Mostrar',
            ],
            [
                'id'    => '43',
                'title' => 'task_status_delete',
                'description' => 'Tarefas - Status - Deletar',
            ],
            [
                'id'    => '44',
                'title' => 'task_status_access',
                'description' => 'Tarefas - Status - Acessar',
            ],
            [
                'id'    => '45',
                'title' => 'task_tag_create',
                'description' => 'Tarefas - Tag - Criar',
            ],
            [
                'id'    => '46',
                'title' => 'task_tag_edit',
                'description' => 'Tarefas - Tag - Editar',
            ],
            [
                'id'    => '47',
                'title' => 'task_tag_show',
                'description' => 'Tarefas - Tag - Mostrar',
            ],
            [
                'id'    => '48',
                'title' => 'task_tag_delete',
                'description' => 'Tarefas - Tag - Deletar',
            ],
            [
                'id'    => '49',
                'title' => 'task_tag_access',
                'description' => 'Tarefas - Tag - Acessar',
            ],
            [
                'id'    => '50',
                'title' => 'task_create',
                'description' => 'Tarefas - Criar',
            ],
            [
                'id'    => '51',
                'title' => 'task_edit',
                'description' => 'Tarefas - Editar',
            ],
            [
                'id'    => '52',
                'title' => 'task_show',
                'description' => 'Tarefas - Mostrar',
            ],
            [
                'id'    => '53',
                'title' => 'task_delete',
                'description' => 'Tarefas - Deletar',
            ],
            [
                'id'    => '54',
                'title' => 'task_access',
                'description' => 'Tarefas - Acessar',
            ],
            [
                'id'    => '55',
                'title' => 'tasks_calendar_access',
                'description' => 'Tarefas - Calendário - Acessar  ',
            ],
            [
                'id'    => '56',
                'title' => 'financeiro_access',
                'description' => 'Financeiro - Menu - Acessar',
            ],
            [
                'id'    => '57',
                'title' => 'relatorio_access',
                'description' => 'Relatórios - Acessar',
            ],
            [
                'id'    => '58',
                'title' => 'rel_pessoa_access',
                'description' => 'Relatórios - Pessoas - Acessar',
            ],
            [
                'id'    => '73',
                'title' => 'audit_log_show',
                'description' => 'Auditoria - Log - Mostrar',
            ],
            [
                'id'    => '74',
                'title' => 'audit_log_access',
                'description' => 'Auditoria - Log - Acessar',
            ],
            [
                'id'    => '75',
                'title' => 'user_alert_create',
                'description' => 'Alerta Usuário - Criar',
            ],
            [
                'id'    => '76',
                'title' => 'user_alert_show',
                'description' => 'Alerta Usuário - Mostrar',
            ],
            [
                'id'    => '77',
                'title' => 'user_alert_delete',
                'description' => 'Alerta Usuário - Deletar',
            ],
            [
                'id'    => '78',
                'title' => 'user_alert_access',
                'description' => 'Alerta Usuário - Acessar',
            ],
            [
                'id'    => '79',
                'title' => 'cliente_create',
                'description' => 'Clientes - Criar',
            ],
            [
                'id'    => '80',
                'title' => 'cliente_edit',
                'description' => 'Clientes - Editar',
            ],
            [
                'id'    => '81',
                'title' => 'cliente_show',
                'description' => 'Clientes - Mostrar',
            ],
            [
                'id'    => '82',
                'title' => 'cliente_delete',
                'description' => 'Clientes - Deletar',
            ],
            [
                'id'    => '83',
                'title' => 'cliente_access',
                'description' => 'Clientes - Acesso',
            ],
            [
                'id'    => '105',
                'title' => 'empresa_create',
                'description' => 'Empresas - Criar',
            ],
            [
                'id'    => '106',
                'title' => 'empresa_edit',
                'description' => 'Empresas - Editar',
            ],
            [
                'id'    => '107',
                'title' => 'empresa_show',
                'description' => 'Empresas - Mostrar',
            ],
            [
                'id'    => '108',
                'title' => 'empresa_delete',
                'description' => 'Empresas - Deletar',
            ],
            [
                'id'    => '109',
                'title' => 'empresa_access',
                'description' => 'Empresas - Acesso',
            ]
        ];

        Permission::insert($permissions);
    }
}
