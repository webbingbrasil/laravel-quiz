# Quiz

A basic quiz implementation for laravel

## Installation
Install package via composer

```bash
composer require "webbingbrasil/laravel-quiz=1.0.0"
```

Next, if you are using Laravel prior to 5.5, register the service provider in the providers array of your config/app.php configuration file:

```php
WebbingBrasil\Quiz\Providers\QuizServiceProvider::class,
```

To get started, you'll need to publish the vendor assets and migrate:

```php
php artisan vendor:publish --provider="WebbingBrasil\Quiz\Providers\QuizServiceProvider" && php artisan migrate
```

## Usage
Add our `CanAnswerQuiz` trait to your model.
        
```php
<?php namespace App\Models;

use WebbingBrasil\Quiz\Traits\CanAnswerQuiz;

class User extends Model
{
    use CanAnswerQuiz;

    // ...
}
?>
```

