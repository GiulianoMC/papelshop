# frcampra
Framework Base para Projetos Laravel GCampra

1 - Execute o comando 'cp .env.example .env' para copiar o exemplo como o arquivo .env real e edite-o com credenciais de banco de dados e outras configurações desejadas. Crie o banco de dados com o nome desejado.

2 - Executar comando 'composer install'.

3 - Execute o comando 'php artisan migrate --seed'. O Seed é importante, porque criará o primeiro usuário administrador para você.

4 - Executar comando 'php artisan key:generate'.

5 - Execute o comando 'php artisan storage:link'.

E pronto, acesse seu domínio e faça o login com estas credenciais: admin@admin.com - password.
