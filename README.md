## Quick Start
- Create a copy from ```.env.example``` and name it as ```.env```
- ```composer install```
- ```./vendor/bin/sail up```
- then the endpoint serve over the ```http://localhost/api/institution/{name}```

## Code
in this project following concepts has been used :
- Service Pattern
- SOILD Princples
- Dependency Injection

## Telescope
after registration as user go to ``` /app/Providers/TelescopeServiceProvider.php ```
then add your user's email in ``` gate ``` method:
```
 /**
     * Register the Telescope gate.
     *
     * This gate determines who can access Telescope in non-local environments.
     *
     * @return void
     */
    protected function gate()
    {
        Gate::define('viewTelescope', function ($user) {
            return in_array($user->email, [
                'name@example.com',
            ]);
        });
    }
```
after that open the ```/telescope``` route to monitor your application.

## What's Run
- Laravel
- UnitTest
- Telescope (Application monitoring)
- Redis
- MariaDB
- Docker

## I just Say 
I wanted to implantation this project with graphql but i have got COVID-19 and the time was limit i just try to keep it under KISS Princple.

the below links are about my python package. 
https://www.mirhamedrooy.ir/rouigram/
https://pypi.org/project/rouigram/
