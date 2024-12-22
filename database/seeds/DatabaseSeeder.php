<?php


use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            PermissionsTableSeeder::class,
            RolesTableSeeder::class,
            TeamsTableSeeder::class,
            PermissionRoleTableSeeder::class,
            UsersTableSeeder::class,
            RoleUserTableSeeder::class,
            TaskStatusTableSeeder::class,
            TaskTagsTableSeeder::class,
            PerfilsTableSeeder::class,
            PessoasTableSeeder::class,
            PessoasPerfilsTableSeeder::class,
            EmpresasTableSeeder::class,
            ClientesTableSeeder::class,
            ClientesUsersTableSeeder::class,
            CategoriasSeeder::class,
            MarcasSeeder::class,
            MateriaisSeeder::class
        ]);
    }
}
