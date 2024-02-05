















## Learned Command

Create Database Migrations<br>
`sail php artisan make:migration <table name>`
`sail php artisan make:migration create_job_list_table`
Migration
`sail php artisan migrate`
Refresh Migration
`sail php artisan migrate:refresh`
Seed
`sail php artisan db:seed`
Refresh and Seed 
`sail php artisan migrate:refresh --seed`
Add a new Model
`sail php artisan make:model <model name>`
## Commit History
1. Route Basic
![Alt text](image.png)
Clicking job1
![Alt text](image-1.png)

2. Database Migration & Model Creation & Factory

    > Problem: 
    >> It seems that laravel will execute SELECT * FROM "modulename"+"s" ,
    >>,SELECT * FROM jobs in this case, when use the system provided all() function extended from Module.

    > Solution:
    >> In database, create a table named "modulename"+"s"(jobs).

3. Layout-1
    > Learned
    > - asset helper: asset()  
    >   - ```<link rel="icon" href="asset('images/favicon.ico')" />```
    > - `@extend`
    > - `@section`
    > - `@endsection`
