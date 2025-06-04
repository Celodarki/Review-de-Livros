<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReviewRequest;
use App\Http\Resources\ReviewResource;
use App\Services\ReviewService;

class ReviewController extends Controller
{
    protected $reviewService;

    public function __construct(ReviewService $reviewService)
    {
        $this->reviewService = $reviewService;
    }

    public function index()
    {
        $reviews = $this->reviewService->all();
        return ReviewResource::collection($reviews);
    }

    public function store(ReviewRequest $request)
    {
        $review = $this->reviewService->create($request->validated());
        return new ReviewResource($review->load(['user', 'book']));
    }

    public function show($id)
    {
        $review = $this->reviewService->find($id);
        return new ReviewResource($review->load(['user', 'book']));
    }

    public function update(ReviewRequest $request, $id)
    {
        $review = $this->reviewService->update($id, $request->validated());
        return new ReviewResource($review->load(['user', 'book']));
    }

    public function destroy($id)
    {
        $this->reviewService->delete($id);
        return response()->noContent();
    }
}