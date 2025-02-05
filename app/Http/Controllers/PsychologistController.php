<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePsychologistRequest;
use App\Models\Psychologist;
use Illuminate\Http\JsonResponse;

class PsychologistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        return response()->json(Psychologist::all(), 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePsychologistRequest $request)
    {
        $psychologist = Psychologist::create($request->all());
        return response()->json($psychologist, 201);
    }
}
