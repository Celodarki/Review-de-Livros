<?php

namespace App\Http\Controllers;

use App\Http\Requests\GenreRequest;
use App\Http\Resources\GenreResource;
use App\Services\GenreService;

class GenreController extends Controller
{
    protected $genreService;

    public function __construct(GenreService $genreService)
    {
        $this->genreService = $genreService;
    }
    public function index()
    {
        $genres = $this->genreService->all();
        return GenreResource::collection($genres);
    }

    public function store(GenreRequest $request)
    {
        $genre = $this->genreService->create($request->validated());
        return new GenreResource($genre);
    }

    public function show($id)
    {
        $genre = $this->genreService->find($id);
        return new GenreResource($genre);
    }

    public function update(GenreRequest $request, $id)
    {
        $genre = $this->genreService->update($id, $request->validated());
        return new GenreResource($genre);
    }

    public function destroy($id)
    {
        $this->genreService->delete($id);
        return response()->noContent();
    }

    public function getGenreBooks($genreId)
    {
        $genre = $this->genreService->getGenreBooks($genreId);
        return new GenreResource($genre);
    }

    public function getAllGenresWithBooks()
    {
        $genres = $this->genreService->getAllGenresWithBooks();
        return GenreResource::collection($genres);
    }
}