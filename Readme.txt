*?INIZIALIZZAZIONE PROGETTO
*1a - composer create-project --prefer-dist laravel/laravel Boolflix
*1b - Creare il progetto con il comando: Composer create-project laravel/laravel:^9.0 Boolfolio
*1.1 - Avviare l'artisan serve php artisan serve

*2 - Installare breeze composer require laravel/breeze --dev
*3 - lanciare il comando php artisan breeze:install (serve per creare lo scaffolding di login) //potrebbe creare problemi se manca la cartella css
*4 - Installare il pacchetto composer require pacificdev/laravel_9_preset
*5 - Installare bootstrap con il comando php artisan preset:ui bootstrap --auth
*6 - Lanciare i comandi npm i e npm run dev
*6.1 - lancia il comando php artisan make:controller Admin/DashboardController
*6.2 - php artisan migrate

*?DEFINIZIONE DEL PROGETTO NELLE SUE COMPONENTI E PARTI
7 - creazione Migration con il comando php artisan make:migration nome_della_migration (create_houses_table oppure update_houses_table --table=houses)
8.1 - Modifico la struttura della tabella
8.2 - Lancio il comando php artisan migrate per creare la tabella nel db
9 - Creare il model con il comando php artisan make:model NomeModelloAlSingolare -rcms --request
10 - php artisan make:seeder NomeDelSeeder
11 - Lanciamo il comando composer remove fzaninotto/faker
12 - Lanciamo il comando composer require fakerphp/faker --dev
13 - Editiamo il metodo rum del seeder ed importiamo al suo interno la classe Faker
14 - lanciamo il seeder con il comando php artisan db:seed --class=NomeDelSeeder
15 - Lanciamo il comando per creare il controller: php artisan make:controller NomeController oppure se vogliamo le risorse php artisan make:controller --resource NomeController
