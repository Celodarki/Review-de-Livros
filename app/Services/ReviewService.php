<?php

namespace App\Services;

use App\Repositories\ReviewRepository;

class ReviewService
{
    protected $reviewRepository;

    public function __construct(ReviewRepository $reviewRepository)
    {
        $this->reviewRepository = $reviewRepository;
    }

    public function all()
    {
        return $this->reviewRepository->all();
    }

    public function find(int $id)
    {
        return $this->reviewRepository->find($id);
    }

    public function create(array $data)
    {
        return $this->reviewRepository->create($data);
    }

    public function update(int $id, array $data)
    {
        return $this->reviewRepository->update($id, $data);
    }

    public function delete(int $id)
    {
        return $this->reviewRepository->delete($id);
    }
}