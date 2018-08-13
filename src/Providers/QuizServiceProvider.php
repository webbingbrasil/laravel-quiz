<?php
/**
 * Created by PhpStorm.
 * User: Danilo
 * Date: 10/08/2018
 * Time: 16:56
 */
namespace WebbingBrasil\Quiz\Providers;

use Illuminate\Support\ServiceProvider;

class QuizServiceProvider extends ServiceProvider
{

    /**
     * Publish package migration
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->registerMigrations();
        }
    }

    /**
     * Register migration files.
     *
     * @return void
     */
    protected function registerMigrations()
    {
        $this->publishes([
            __DIR__.'/../../resources/database/migrations' => database_path('migrations'),
        ], 'quiz-migrations');
    }
}
