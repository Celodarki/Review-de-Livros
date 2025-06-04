<?php

namespace App\Repositories;

use App\Models\Genre;

class GenreRepository extends BaseRepository
{
    public function __construct(Genre $model)
    {
        parent::__construct($model);
    }

    public function getGenreBooks(int $genreId)
    {
        return $this->model->with('books')->findOrFail($genreId);
    }

    public function getAllGenresWithBooks()
    {
        return $this->model->with('books')->get();
    }
}