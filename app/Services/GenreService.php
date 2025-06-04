<?php

namespace App\Services;

use App\Repositories\GenreRepository;

class GenreService
{
    protected $genreRepository;

    public function __construct(GenreRepository $genreRepository)
    {
        $this->genreRepository = $genreRepository;
    }

    public function all()
    {
        return $this->genreRepository->all();
    }

    public function find(int $id)
    {
        return $this->genreRepository->find($id);
    }

    public function create(array $data)
    {
        return $this->genreRepository->create($data);
    }

    public function update(int $id, array $data)
    {
        return $this->genreRepository->update($id, $data);
    }

    public function delete(int $id)
    {
        return $this->genreRepository->delete($id);
    }

    public function getGenreBooks(int $genreId)
    {
        return $this->genreRepository->getGenreBooks($genreId);
    }

    public function getAllGenresWithBooks()
    {
        return $this->genreRepository->getAllGenresWithBooks();
    }
}
