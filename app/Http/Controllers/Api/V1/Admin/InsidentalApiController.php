<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreInsidentalRequest;
use App\Http\Requests\UpdateInsidentalRequest;
use App\Insidental;

class InsidentalApiController extends Controller
{
    public function index()
    {
        $insidental = Insidental::all();

        return $insidental;
    }

    public function store(StoreInsidentalRequest $request)
    {
        return Insidental::create($request->all());
    }

    public function update(UpdateInsidentalRequest $request, Insidental $insidental)
    {
        return $insidental->update($request->all());
    }

    public function show(Insidental $insidental)
    {
        return $insidental;
    }

    public function destroy(Insidental $insidental)
    {
        return $insidental->delete();
    }
}
