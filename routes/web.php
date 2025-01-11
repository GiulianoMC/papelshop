<?php

// Route::redirect('/', '/login');
Route::get('/', 'Admin\HomeController@home')->name('/');
Route::redirect('/home', '/admin');

Route::get('material/{uuid}', 'Admin\MaterialController@showmaterial')->name('material');

Route::get('/carrinho', 'Admin\CarrinhoController@index')->name('carrinho');

Route::post('/carrinho/adicionar/{materialId}', 'Admin\CarrinhoController@adicionarAoCarrinho')->name('carrinho.adicionar');

Route::delete('/carrinho/remover/{materialId}', 'Admin\CarrinhoController@removerDoCarrinho')->name('carrinho.deletar');


Auth::routes();

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');

    Route::get('user-alerts/read', 'UserAlertsController@read');

    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::post('users/parse-csv-import', 'UsersController@parseCsvImport')->name('users.parseCsvImport');
    Route::post('users/process-csv-import', 'UsersController@processCsvImport')->name('users.processCsvImport');
    Route::resource('users', 'UsersController');

    // Pessoas
    Route::delete('pessoas/destroy', 'PessoaController@massDestroy')->name('pessoas.massDestroy');
    Route::post('pessoas/parse-csv-import', 'PessoaController@parseCsvImport')->name('pessoas.parseCsvImport');
    Route::post('pessoas/process-csv-import', 'PessoaController@processCsvImport')->name('pessoas.processCsvImport');
    Route::resource('pessoas', 'PessoaController');

    // Empresas
    Route::delete('empresas/destroy', 'EmpresaController@massDestroy')->name('empresas.massDestroy');
    Route::resource('empresas', 'EmpresaController');

    // Clientes
    Route::delete('clientes/destroy', 'ClienteController@massDestroy')->name('clientes.massDestroy');
    Route::resource('clientes', 'ClienteController');

    // Perfils
    Route::delete('perfils/destroy', 'PerfilController@massDestroy')->name('perfils.massDestroy');
    Route::resource('perfils', 'PerfilController');

    // Teams
    Route::delete('teams/destroy', 'TeamController@massDestroy')->name('teams.massDestroy');
    Route::resource('teams', 'TeamController');

    // Task Statuses
    Route::delete('task-statuses/destroy', 'TaskStatusController@massDestroy')->name('task-statuses.massDestroy');
    Route::resource('task-statuses', 'TaskStatusController');

    // Task Tags
    Route::delete('task-tags/destroy', 'TaskTagController@massDestroy')->name('task-tags.massDestroy');
    Route::resource('task-tags', 'TaskTagController');

    // Tasks
    Route::delete('tasks/destroy', 'TaskController@massDestroy')->name('tasks.massDestroy');
    Route::post('tasks/media', 'TaskController@storeMedia')->name('tasks.storeMedia');
    Route::resource('tasks', 'TaskController');

    // Tasks Calendars
    Route::resource('tasks-calendars', 'TasksCalendarController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // Rel Pessoas
    Route::get('rel-pessoas', 'RelPessoasController@index')->name('rel-pessoas.index');

    // Audit Logs
    Route::resource('audit-logs', 'AuditLogsController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

    // User Alerts
    Route::delete('user-alerts/destroy', 'UserAlertsController@massDestroy')->name('user-alerts.massDestroy');
    Route::resource('user-alerts', 'UserAlertsController', ['except' => ['edit', 'update']]);

	Route::get('messenger', 'MessengerController@index')->name('messenger.index');
    Route::get('messenger/create', 'MessengerController@createTopic')->name('messenger.createTopic');
    Route::post('messenger', 'MessengerController@storeTopic')->name('messenger.storeTopic');
    Route::get('messenger/inbox', 'MessengerController@showInbox')->name('messenger.showInbox');
    Route::get('messenger/outbox', 'MessengerController@showOutbox')->name('messenger.showOutbox');
    Route::get('messenger/{topic}', 'MessengerController@showMessages')->name('messenger.showMessages');
    Route::delete('messenger/{topic}', 'MessengerController@destroyTopic')->name('messenger.destroyTopic');
    Route::post('messenger/{topic}/reply', 'MessengerController@replyToTopic')->name('messenger.reply');
    Route::get('messenger/{topic}/reply', 'MessengerController@showReply')->name('messenger.showReply');

    //Material
    Route::delete('materiais/massDestroy', 'MaterialController@massDestroy')->name('materiais.massDestroy');
    Route::delete('materiais/destroy/{material}', 'MaterialController@destroy')->name('materiais.destroy');
    Route::resource('materiais', 'MaterialController');

    //Marca
    Route::delete('marcas/massDestroy', 'MarcaController@massDestroy')->name('marcas.massDestroy');
    Route::delete('marcas/destroy/{material}', 'MarcaController@destroy')->name('marcas.destroy');
    Route::resource('marcas', 'MarcaController');

    //Marca
    Route::delete('categorias/massDestroy', 'CategoriaController@massDestroy')->name('categorias.massDestroy');
    Route::delete('categorias/destroy/{material}', 'CategoriaController@destroy')->name('categorias.destroy');
    Route::resource('categorias', 'CategoriaController');
});
