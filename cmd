artisan make:auth
composer require barryvdh/laravel-ide-helper
artisan ide-helper:generate

apt-get install php-mysql

artisan migrate

artisan make:migration create_admins_table
artisan make:migration create_companies_table

artisan make:model Company
artisan make:model Admin

artisan make:factory AdminFactory
artisan make:factory CompanyFactory

artisan make:seeder AdminTableSeeder

artisan migrate

artisan db:seed --class=AdminTableSeeder


composer require laravel/passport
artisan migrate
artisan passport:install

composer require "bosnadev/repositories: 0.*"

artisan make:job TestJob
composer require predis/predis ~1.0
artisan queue:work

composer require laravel/horizon
artisan vendor:publish --provider="Laravel\Horizon\HorizonServiceProvider"

composer require guzzlehttp/guzzle
artisan make:mail CompanyCreated

apt-get install supervisor

artisan make:mail AdminCreated --markdown=emails.admins.created

artisan horizon:terminate

artisan make:notification OrderPaid
artisan make:model Order
artisan make:controller OrderController

artisan notifications:table
artisan migrate

composer require nexmo/client
artisan make:migration add_phone_to_users --table=users
artisan migrate

artisan make:migration alter_users --table=users
composer require doctrine/dbal

artisan make:event OrderPaid
artisan make:listener OrderPaidSubscriber
artisan make:migration create_orders_table
artisan migrate

artisan make:command SendEmails
artisan make:mail Test
artisan email:send
artisan email:send --queue
artisan make:command ConfigList

artisan make:command FacadeInfo
artisan facade:info Cache
