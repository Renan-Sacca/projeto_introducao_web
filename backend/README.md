


 php artisan serve
 php artisan migrate

passos para Pacientes
 php artisan make:migration create_Consultas_table
 edita database migration Pacientes
 php artisan migrate


php artisan install:api

criar controler Pacientes
 php artisan make:controller API/ConsultasController --api --model=Consultas
 php artisan make:seeder ConsultasSeeder


  php artisan db:seed --class=ConsultasSeeder 
    php artisan db:seed --class=PacientesSeeder 



  php artisan make:interface /Interface/ConsultasRepositoryInterface
 php artisan make:class /Repository/ConsultasRepository

 request > controller > service > reposiroty > Model


 listar routes: php artisan route:list