<?php

namespace App\Services;

use App\Repositories\AuthorRepository;

class AuthorService
{
    protected $authorRepository;

    public function __construct(AuthorRepository $authorRepository)
    {
        $this->authorRepository = $authorRepository;
    }

    public function all()
    {
        return $this->authorRepository->all();
    }

    public function find(int $id)
    {
        return $this->authorRepository->find($id);
    }

    public function create(array $data)
    {
        return $this->authorRepository->create($data);
    }

    public function update(int $id, array $data)
    {
        return $this->authorRepository->update($id, $data);
    }

    public function delete(int $id)
    {
        return $this->authorRepository->delete($id);
    }

    public function getAuthorBooks(int $authorId)
    {
        return $this->authorRepository->getAuthorBooks($authorId);
    }

    public function getAllAuthorsWithBooks()
    {
        return $this->authorRepository->getAllAuthorsWithBooks();
    }
}