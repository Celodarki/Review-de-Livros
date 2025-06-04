<?php

namespace App\Services;

use App\Repositories\BookRepository;

class BookService
{
    protected $bookRepository;

    public function __construct(BookRepository $bookRepository)
    {
        $this->bookRepository = $bookRepository;
    }

    public function all()
    {
        return $this->bookRepository->all();
    }

    public function find(int $id)
    {
        return $this->bookRepository->find($id);
    }

    public function create(array $data)
    {
        return $this->bookRepository->create($data);
    }

    public function update(int $id, array $data)
    {
        return $this->bookRepository->update($id, $data);
    }

    public function delete(int $id)
    {
        return $this->bookRepository->delete($id);
    }

    public function getBookReviews(int $bookId)
    {
        return $this->bookRepository->getBookReviews($bookId);
    }

    public function getAllBooksWithDetails()
    {
        return $this->bookRepository->getAllBooksWithDetails();
    }
}