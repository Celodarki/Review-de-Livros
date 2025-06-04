<?php

namespace App\Repositories;

use App\Models\Author;

class AuthorRepository extends BaseRepository
{
    public function __construct(Author $model)
    {
        parent::__construct($model);
    }

    public function getAuthorBooks(int $authorId)
    {
        return $this->model->with('books')->findOrFail($authorId);
    }

    public function getAllAuthorsWithBooks()
    {
        return $this->model->with('books')->get();
    }
}