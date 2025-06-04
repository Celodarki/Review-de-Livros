<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository extends BaseRepository
{
    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    public function getUserReviews(int $userId)
    {
        return $this->model->with('reviews')->findOrFail($userId);
    }
}