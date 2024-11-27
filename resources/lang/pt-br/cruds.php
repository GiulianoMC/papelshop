<?php

return [
    'userManagement' => [
        'title'          => 'Gestão de Usuários',
        'title_singular' => 'Gestão de Usuários',
    ],
    'permission'     => [
        'title'          => 'Permissões',
        'title_singular' => 'Permissão',
        'fields'         => [
            'id'                    => 'ID',
            'id_helper'             => '',
            'title'                 => 'Título',
            'title_helper'          => '',
            'description'           => 'Descrição',
            'description_helper'    => '',
            'created_at'            => 'Created at',
            'created_at_helper'     => '',
            'updated_at'            => 'Updated at',
            'updated_at_helper'     => '',
            'deleted_at'            => 'Deleted at',
            'deleted_at_helper'     => '',
        ],
    ],
    'role'           => [
        'title'          => 'Funções',
        'title_singular' => 'Função',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => '',
            'title'              => 'Títulos',
            'title_helper'       => '',
            'permissions'        => 'Permissões',
            'permissions_helper' => '',
            'created_at'         => 'Created at',
            'created_at_helper'  => '',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => '',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => '',
        ],
    ],
    'user'           => [
        'title'          => 'Usuários',
        'title_singular' => 'Usuário',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => '',
            'name'                     => 'Nome',
            'name_helper'              => '',
            'email'                    => 'Email',
            'email_helper'             => '',
            'email_verified_at'        => 'Email verificado em',
            'email_verified_at_helper' => '',
            'password'                 => 'Senha',
            'password_helper'          => '',
            'roles'                    => 'Funções',
            'roles_helper'             => '',
            'remember_token'           => 'Lembrar Token',
            'remember_token_helper'    => '',
            'created_at'               => 'Created at',
            'created_at_helper'        => '',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => '',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => '',
            'team'                     => 'Equipe',
            'team_helper'              => '',
            'clientes'                 => 'Clientes',
            'clientes_helper'              => '',
        ],
    ],
    'operacional'       => [
        'title'          => 'Operacional',
        'title_singular' => 'Operacional',
    ],
    'operacao'         => [
        'title'          => 'Operações',
        'title_singular' => 'Operação',
        'fields'         => [
            'id'                        => 'ID',
            'id_helper'                 => '',
            'numero'                    => 'Número',
            'numero_helper'             => 'Número da Operação',
            'tipo'                      => 'Tipo',
            'tipo_helper'               => 'Tipo da Operação',
            'data_calculo'              => 'Data Cálculo',
            'data_calculo_helper'       => 'Data Cálculo da Operação',
            'data_aceite'               => 'Data Aceite',
            'data_aceite_helper'        => 'Data Aceite da Operação',
            'data_inclusao'             => 'Data Inclusao',
            'data_inclusao_helper'      => 'Data Inclusao da Operação',
            'pmp'                       => 'Prazo Médio Ponderado',
            'pmp_helper'                => 'Prazo Médio Ponderado da Operação',
            'float_medio'               => 'Float Médio',
            'float_medio_helper'        => 'Float Médio Ponderado da Operação',
            'media_total'               => 'Media Total',
            'media_total_helper'        => 'Media Total da Operação',
            'fator'                     => 'Fator',
            'fator_helper'              => 'Fator da Operação',
            'fator_real'                => 'Fator Real Período',
            'fator_real_helper'         => 'Fator Real Período da Operação',
            'fator_simples'             => 'Fator Simples a.m.',
            'fator_simples_helper'      => 'Fator Simples a.m. da Operação',
            'desagio'                   => 'Deságio',
            'desagio_helper'            => 'Deságio da Operação',
            'total_face'                => 'Total de Face',
            'total_face_helper'         => 'Total de Face da Operação',
            'total_liquido'             => 'Total Líquido',
            'total_liquido_helper'      => 'Total Líquido Operação',
            'total_tarifa'              => 'Total Tarifas',
            'total_tarifa_helper'       => 'Total Tarifas da Operação',
            'total_tac'                 => 'Total TAC',
            'total_tac_helper'          => 'Total TAC da Operação',
            'total_ted_doc'             => 'Total TED/DOC',
            'total_ted_doc_helper'      => 'Total TED/DOC da Operação',
            'total_serasa'              => 'Total SERASA/SCI',
            'total_serasa_helper'       => 'Total SERASA/SCI da Operação',
            'total_recompra'            => 'Total Recompra',
            'total_recompra_helper'     => 'Total Recompra da Operação',
            'numero_documentos'         => 'N. Documentos',
            'numero_documentos_helper'  => 'Número de Documentos da Operação',
            'operador'                  => 'Operador',
            'operador_helper'           => 'Operador da Operação',
            'cliente'                   => 'Cliente',
            'cliente_helper'            => 'Cliente da Operação',
            'status'                    => 'Status',
            'status_helper'             => 'Status da Operação',
        ],
    ],
    'titulo'         => [
        'title'          => 'Titulos',
        'title_singular' => 'Título',
        'fields'         => [
            'id'                     => 'ID',
            'id_helper'              => '',
            'tipo'                   => 'Tipo',
            'tipo_helper'            => 'Tipo do Título',
            'tipo_doc'               => 'Tipo Documento',
            'tipo_doc_helper'        => 'Tipo Documento do Título',
            'status_confirmacao'        => 'Status Confirmação',
            'status_confirmacao_helper' => 'Status Confirmação do Título',
            'data_confirmacao'        => 'Data Confirmação',
            'data_confirmacao_helper' => 'Data Confirmação do Título',
            'documento'              => 'Documento',
            'documento_helper'       => 'Documento do Título',
            'posicao'                => 'Posição',
            'posicao_helper'         => 'Posição do Título',
            'forma_pagamento'         => 'Forma Pagamento',
            'forma_pagamento_helper'  => 'Forma Pagamento do Título',
            'data_vencimento'        => 'Vencimento',
            'data_vencimento_helper' => 'Vencimento do Título',
            'data_liquidacao'        => 'Liquidação',
            'data_liquidacao_helper' => 'Liquidação do Título',
            'prazo'                  => 'Prazo',
            'prazo_helper'           => 'Prazo do Título',
            'atraso'                 => 'Atraso',
            'atraso_helper'          => 'Atraso do Título',
            'mora'                   => 'Mora',
            'mora_helper'            => 'Mora do Título',
            'tarifa'                 => 'Tarifa',
            'tarifa_helper'          => 'Tarifa de Cobrança',
            'valor_atualizado'        => 'Valor Atualizado',
            'valor_atualizado_helper' => 'Valor Atualizado do Título',
            'float'                  => 'Floating',
            'float_helper'           => 'Floating do Título',
            'fator'                  => 'Fator',
            'fator_helper'           => 'Fator do Título',
            'valor'                  => 'Valor',
            'valor_helper'           => 'Valor do Título',
            'desagio'                => 'Deságio',
            'desagio_helper'         => 'Deságio do Título',
            'sacado'                 => 'Sacado',
            'sacado_helper'          => 'Sacado do Título',
            'operacao'               => 'Operação',
            'operacao_helper'        => 'Operação do Título',
        ],
    ],
    'pendencia'         => [
        'title'          => 'Pendências',
        'title_singular' => 'Pendências',
        'fields'         => [
            'id'                     => 'ID',
            'id_helper'              => '',
            'descricao'              => 'Descrição',
            'descricao_helper'       => 'Descrição da Pendência',
            'data_liquidacao'        => 'Liquidação',
            'data_liquidacao_helper' => 'Liquidação do Pendência',
            'valor'                  => 'Valor',
            'valor_helper'           => 'Valor da Pendência',
            'saldo'                  => 'Saldo',
            'saldo_helper'           => 'Saldo da Pendência',
            'amortizacao'            => 'Amortização',
            'amortizacao_helper'     => 'Amortização da Pendência',
            'operacao'               => 'Operação',
            'operacao_helper'        => 'Operação da Pendência',
            'empresa'               => 'Empresa',
            'empresa_helper'        => 'Empresa da Pendência',
            'cliente'               => 'Cliente',
            'cliente_helper'        => 'Cliente da Pendência',
        ],
    ],
    'esteira'         => [
        'title'          => 'Esteiras',
        'title_singular' => 'Esteira',
        'fields'         => [
            'id'                        => 'ID',
            'id_helper'                 => '',
            'nome'                    => 'Esteira',
            'nome_helper'             => 'Esteira de Operações',
        ],
    ],
    'cadastro'       => [
        'title'          => 'Cadastros',
        'title_singular' => 'Cadastro',
    ],
    'pessoa'         => [
        'title'          => 'Pessoa',
        'title_singular' => 'Pessoa',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => '',
            'nome'              => 'Nome',
            'nome_helper'       => 'Nome da Pessoa',
            'cpfcnpj'               => 'CPF/CNPJ',
            'cpf_helper'        => 'CPF/CNPJ da Pessoa',
            'email'             => 'Email',
            'email_helper'      => 'E-mail da Pessoa',
            'taxa'             => 'Taxa',
            'taxa_helper'      => 'Taxa da Pessoa',
            'data_base'        => 'Data Base',
            'data_base_helper' => 'Data Base da Pessoa',
            'data_base_atual'  => 'Data Base Atual',
            'dia_base'         => 'Dia Base',
            'dia_base_helper'  => 'Dia Base da Pessoa',
            'dia_base_atual'   => 'Dia Base Atual',
            'novadata'         => 'Nova Data Base',
            'novadata_helper'  => 'Nova Data Base do Investidor',
            'fone'              => 'Fone',
            'fone_helper'       => 'Fone da Pessoa',
            'celular'           => 'Celular',
            'celular_helper'    => 'Celular da Pessoa',
            'cep'               => 'CEP',
            'cep_helper'        => 'CEP da Pessoa',
            'logradouro'        => 'Logradouro',
            'logradouro_helper' => 'Logradouro da Pessoa',
            'numero'            => 'Número',
            'numero_helper'     => 'Número da Pessoa',
            'bairro'            => 'Bairro',
            'bairro_helper'     => 'Bairro da Pessoa',
            'complemento'       => 'Complemento',
            'complemento_helper' => 'Complemento da Pessoa',
            'cidade'            => 'Cidade',
            'cidade_helper'     => 'Cidade da Pessoa',
            'uf'                => 'UF',
            'uf_helper'         => 'UF da Pessoa',
            'tipo'              => 'Tipo',
            'tipo_helper'       => 'Física/Jurídica',
            'created_at'        => 'Created at',
            'created_at_helper' => '',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => '',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => '',
            'perfil'            => 'Perfil',
            'perfil_helper'     => '',
            'team'              => 'Equipe',
            'team_helper'       => '',
        ],
    ],
    'empresa'         => [
        'title'          => 'Empresas',
        'title_singular' => 'Empresa',
        'tipo'              => 'Tipo',
        'tipo_helper'       => 'Tipo da Empresa',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => '',
            'nome'              => 'Nome',
            'nome_helper'       => 'Nome da Pessoa',
            'cpfcnpj'           => 'CPF/CNPJ',
            'cpf_helper'        => 'CPF/CNPJ da Pessoa',
            'email'             => 'Email',
            'email_helper'      => 'E-mail da Pessoa',
            'taxa'             => 'Taxa',
            'taxa_helper'      => 'Taxa da Pessoa',
            'data_base'        => 'Data Base',
            'data_base_helper' => 'Data Base da Pessoa',
            'data_base_atual'  => 'Data Base Atual',
            'dia_base'         => 'Dia Base',
            'dia_base_helper'  => 'Dia Base da Pessoa',
            'dia_base_atual'   => 'Dia Base Atual',
            'novadata'         => 'Nova Data Base',
            'novadata_helper'  => 'Nova Data Base do Investidor',
            'fone'              => 'Fone',
            'fone_helper'       => 'Fone da Pessoa',
            'celular'           => 'Celular',
            'celular_helper'    => 'Celular da Pessoa',
            'cep'               => 'CEP',
            'cep_helper'        => 'CEP da Pessoa',
            'logradouro'        => 'Logradouro',
            'logradouro_helper' => 'Logradouro da Pessoa',
            'numero'            => 'Número',
            'numero_helper'     => 'Número da Pessoa',
            'bairro'            => 'Bairro',
            'bairro_helper'     => 'Bairro da Pessoa',
            'complemento'       => 'Complemento',
            'complemento_helper' => 'Complemento da Pessoa',
            'cidade'            => 'Cidade',
            'cidade_helper'     => 'Cidade da Pessoa',
            'uf'                => 'UF',
            'uf_helper'         => 'UF da Pessoa',
            'tipo'              => 'Tipo',
            'tipo_helper'       => 'Física/Jurídica',
            'created_at'        => 'Created at',
            'created_at_helper' => '',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => '',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => '',
            'perfil'            => 'Perfil',
            'perfil_helper'     => '',
            'team'              => 'Equipe',
            'team_helper'       => '',
        ],
    ],
    'cliente'         => [
        'title'          => 'Cliente',
        'title_singular' => 'Cliente',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => '',
            'nome'              => 'Nome',
            'nome_helper'       => 'Nome da Cliente',
            'gerente'           => 'Gerente',
            'gerente_helper'    => 'Nome do Gerente do Cliente',
            'cpfcnpj'           => 'CPF/CNPJ',
            'cpf_helper'        => 'CPF/CNPJ da Pessoa',
            'email'             => 'Email',
            'email_helper'      => 'E-mail da Pessoa',
            'taxa'             => 'Taxa',
            'taxa_helper'      => 'Taxa da Pessoa',
            'data_base'        => 'Data Base',
            'data_base_helper' => 'Data Base da Pessoa',
            'data_base_atual'  => 'Data Base Atual',
            'dia_base'         => 'Dia Base',
            'dia_base_helper'  => 'Dia Base da Pessoa',
            'dia_base_atual'   => 'Dia Base Atual',
            'novadata'         => 'Nova Data Base',
            'novadata_helper'  => 'Nova Data Base do Investidor',
            'fone'              => 'Fone',
            'fone_helper'       => 'Fone da Pessoa',
            'celular'           => 'Celular',
            'celular_helper'    => 'Celular da Pessoa',
            'cep'               => 'CEP',
            'cep_helper'        => 'CEP da Pessoa',
            'logradouro'        => 'Logradouro',
            'logradouro_helper' => 'Logradouro da Pessoa',
            'numero'            => 'Número',
            'numero_helper'     => 'Número da Pessoa',
            'bairro'            => 'Bairro',
            'bairro_helper'     => 'Bairro da Pessoa',
            'complemento'       => 'Complemento',
            'complemento_helper' => 'Complemento da Pessoa',
            'cidade'            => 'Cidade',
            'cidade_helper'     => 'Cidade da Pessoa',
            'ultima_operacao'   => 'Última Operação',
            'ultima_operacao_helper' => 'Data Última Operação do Cliente',
            'cliente_desde'   => 'Cliente Desde',
            'cliente_desde_helper' => 'Primeira Op. do Cliente',
            'risco_vencidos'   => 'Risco Total Vencidos',
            'risco_vencidos_helper' => 'Risco Total Vencidos',
            'risco_avencer'   => 'Risco Total a Vencer',
            'risco_avencer_helper' => 'Risco Total a Vencer',
            'risco_total'   => 'Risco Total',
            'risco_total_helper' => 'Risco Total',
            'pendencias'   => 'Total Pendências',
            'pendencias_helper' => 'Total Pendencias',
            'vop_mes'           => 'Valor Operado Mês',
            'vop_mes_helper'    => 'Valor Operado Mês',
            'vop_semestre'        => 'Valor Operado Semestre',
            'vop_semestre_helper' => 'Valor Operado Semestre',
            'vop_ano'           => 'Valor Operado Ano',
            'vop_ano_helper'    => 'Valor Operado Ano',
            'uf'                => 'UF',
            'uf_helper'         => 'UF da Pessoa',
            'tipo'              => 'Tipo',
            'tipo_helper'       => 'Física/Jurídica',
            'created_at'        => 'Created at',
            'created_at_helper' => '',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => '',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => '',
            'perfil'            => 'Perfil',
            'perfil_helper'     => '',
            'team'              => 'Equipe',
            'team_helper'       => '',
        ],
    ],
    'sacado'         => [
        'title'          => 'Sacado',
        'title_singular' => 'Sacado',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => '',
            'nome'              => 'Nome',
            'nome_helper'       => 'Nome da Pessoa',
            'cpfcnpj'               => 'CPF/CNPJ',
            'cpf_helper'        => 'CPF/CNPJ da Pessoa',
            'email'             => 'Email',
            'email_helper'      => 'E-mail da Pessoa',
            'taxa'             => 'Taxa',
            'taxa_helper'      => 'Taxa da Pessoa',
            'data_base'        => 'Data Base',
            'data_base_helper' => 'Data Base da Pessoa',
            'data_base_atual'  => 'Data Base Atual',
            'dia_base'         => 'Dia Base',
            'dia_base_helper'  => 'Dia Base da Pessoa',
            'dia_base_atual'   => 'Dia Base Atual',
            'novadata'         => 'Nova Data Base',
            'novadata_helper'  => 'Nova Data Base do Investidor',
            'fone'              => 'Fone',
            'fone_helper'       => 'Fone da Pessoa',
            'celular'           => 'Celular',
            'celular_helper'    => 'Celular da Pessoa',
            'cep'               => 'CEP',
            'cep_helper'        => 'CEP da Pessoa',
            'logradouro'        => 'Logradouro',
            'logradouro_helper' => 'Logradouro da Pessoa',
            'numero'            => 'Número',
            'numero_helper'     => 'Número da Pessoa',
            'bairro'            => 'Bairro',
            'bairro_helper'     => 'Bairro da Pessoa',
            'complemento'       => 'Complemento',
            'complemento_helper' => 'Complemento da Pessoa',
            'cidade'            => 'Cidade',
            'cidade_helper'     => 'Cidade da Pessoa',
            'uf'                => 'UF',
            'uf_helper'         => 'UF da Pessoa',
            'tipo'              => 'Tipo',
            'tipo_helper'       => 'Física/Jurídica',
            'created_at'        => 'Created at',
            'created_at_helper' => '',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => '',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => '',
            'perfil'            => 'Perfil',
            'perfil_helper'     => '',
            'team'              => 'Equipe',
            'team_helper'       => '',
        ],
    ],
    'perfil'         => [
        'title'          => 'Perfil',
        'title_singular' => 'Perfil',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => '',
            'perfil'            => 'Perfil',
            'perfil_helper'     => 'Perfil',
            'created_at'        => 'Created at',
            'created_at_helper' => '',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => '',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => '',
        ],
    ],
    'team'           => [
        'title'          => 'Equipe',
        'title_singular' => 'Equipe',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => '',
            'created_at'        => 'Created at',
            'created_at_helper' => '',
            'updated_at'        => 'Updated At',
            'updated_at_helper' => '',
            'deleted_at'        => 'Deleted At',
            'deleted_at_helper' => '',
            'name'              => 'Nome',
            'name_helper'       => '',
        ],
    ],
    'taskManagement' => [
        'title'          => 'Tarefas',
        'title_singular' => 'Tarefa',
    ],
    'taskStatus'     => [
        'title'          => 'Status',
        'title_singular' => 'Status',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => '',
            'name'              => 'Name',
            'name_helper'       => '',
            'created_at'        => 'Created at',
            'created_at_helper' => '',
            'updated_at'        => 'Updated At',
            'updated_at_helper' => '',
            'deleted_at'        => 'Deleted At',
            'deleted_at_helper' => '',
        ],
    ],
    'taskTag'        => [
        'title'          => 'Tags',
        'title_singular' => 'Tag',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => '',
            'name'              => 'Name',
            'name_helper'       => '',
            'created_at'        => 'Created at',
            'created_at_helper' => '',
            'updated_at'        => 'Updated At',
            'updated_at_helper' => '',
            'deleted_at'        => 'Deleted At',
            'deleted_at_helper' => '',
        ],
    ],
    'task'           => [
        'title'          => 'Tarefas',
        'title_singular' => 'Tarefa',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => '',
            'name'               => 'Nome',
            'name_helper'        => '',
            'description'        => 'Descrição',
            'description_helper' => '',
            'status'             => 'Status',
            'status_helper'      => '',
            'tag'                => 'Tags',
            'tag_helper'         => '',
            'attachment'         => 'Anexos',
            'attachment_helper'  => '',
            'due_date'           => 'Data Final',
            'due_date_helper'    => '',
            'assigned_to'        => 'Atribuída para',
            'assigned_to_helper' => '',
            'created_at'         => 'Created at',
            'created_at_helper'  => '',
            'updated_at'         => 'Updated At',
            'updated_at_helper'  => '',
            'deleted_at'         => 'Deleted At',
            'deleted_at_helper'  => '',
            'team'              => 'Equipe',
            'team_helper'       => '',
        ],
    ],
    'tasksCalendar'  => [
        'title'          => 'Calendário',
        'title_singular' => 'Calendário',
    ],
    'relatorio'      => [
        'title'          => 'Relatórios',
        'title_singular' => 'Relatório',
    ],
    'relPessoa'      => [
        'title'          => 'Pessoas',
        'title_singular' => 'Pessoa',
    ],
    'relTitulos'      => [
        'title'          => 'Títulos',
        'title_singular' => 'Título',
    ],
    'relTitulosAtualizados'      => [
        'title'          => 'Títulos Atualizados',
        'title_singular' => 'Título Atualizado',
    ],
    'relPendenciasAtualizadas'      => [
        'title'          => 'Pendências Atualizadas',
        'title_singular' => 'Pendências Atualizada',
    ],
    'relSinteticoGerentes'      => [
        'title'          => 'Sintético Gerentes',
        'title_singular' => 'Sintético Gerente',
    ],
    'auditLog'       => [
        'title'          => 'Auditoria-Logs',
        'title_singular' => 'Auditoria-Log',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => '',
            'description'         => 'Descrição',
            'description_helper'  => '',
            'subject_id'          => 'ID Objeto',
            'subject_id_helper'   => '',
            'subject_type'        => 'Tipo Objeto',
            'subject_type_helper' => '',
            'user_id'             => 'Usuário',
            'user_id_helper'      => '',
            'properties'          => 'Propriedades',
            'properties_helper'   => '',
            'host'                => 'Host',
            'host_helper'         => '',
            'created_at'          => 'Criado em',
            'created_at_helper'   => '',
            'updated_at'          => 'Alterado em',
            'updated_at_helper'   => '',
        ],
    ],
    'userAlert'      => [
        'title'          => 'Alertas de Usuários',
        'title_singular' => 'Alerta de Usuário',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => '',
            'alert_text'        => 'Texto do Alerta',
            'alert_text_helper' => '',
            'alert_link'        => 'Link do Alerta',
            'alert_link_helper' => '',
            'user'              => 'Usuários',
            'user_helper'       => '',
            'created_at'        => 'Created at',
            'created_at_helper' => '',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => '',
        ],
    ],
    'material' => [
        'title'          => 'Materiais',
        'title_singular' => 'Material',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => '',
            'nome'              => 'Nome',
            'nome_helper'       => 'Nome do material',
            'marca'             => 'Marca',
            'marca_helper'      => 'Marca do material',
            'categoria_id'      => 'Categoria',
            'categoria_id_helper' => 'Selecione a categoria do material',
            'preco'             => 'Preço',
            'preco_helper'      => 'Preço do material',
            'descricao'         => 'Descrição',
            'descricao_helper'  => 'Descrição detalhada do material',
            'data_compra'       => 'Data de Compra',
            'data_compra_helper' => 'Data em que o material foi adquirido',
            'disponivel'        => 'Disponível',
            'disponivel_helper' => 'Indica se o material está disponível',
            'created_at'        => 'Criado em',
            'created_at_helper' => '',
            'updated_at'        => 'Atualizado em',
            'updated_at_helper' => '',
        ],
    ],
    'categoria' => [
        'title'          => 'Categorias',
        'title_singular' => 'Categoria',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => '',
            'nome'              => 'Nome',
            'nome_helper'       => 'Nome da categoria',
            'created_at'        => 'Criado em',
            'created_at_helper' => '',
            'updated_at'        => 'Atualizado em',
            'updated_at_helper' => '',
        ],
    ],
];
