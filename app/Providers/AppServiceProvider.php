<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\{
    UserRepository,
    AuthorRepository,
    BookRepository,
    GenreRepository,
    ReviewRepository
};
use App\Models\{
    User,
    Author,
    Book,
    Genre,
    Review
};

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            \App\Repositories\RepositoryInterface::class,
            \App\Repositories\BaseRepository::class
        );

        $this->app->bind(UserRepository::class, function ($app) {
            return new UserRepository(new User());
        });

        $this->app->bind(AuthorRepository::class, function ($app) {
            return new AuthorRepository(new Author());
        });

        $this->app->bind(BookRepository::class, function ($app) {
            return new BookRepository(new Book());
        });

        $this->app->bind(GenreRepository::class, function ($app) {
            return new GenreRepository(new Genre());
        });

        $this->app->bind(ReviewRepository::class, function ($app) {
            return new ReviewRepository(new Review());
        });
    }

    public function boot()
    {
        //
    }
}