<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreWardRequest;
use App\Http\Resources\WardResource;
use App\Models\Ward;

class WardController extends Controller
{
    public function index()
    {
        $wards=Ward::withCount('publicIncidents')->orderBy('name')->paginate();
        return WardResource::collections($wards);

    }
    public function store(StoreWardRequest $request)
    {
        $ward=Ward::create($request->validated());
        return(new WardResource($ward))->response()->setStatusCode(201);
    }
}
