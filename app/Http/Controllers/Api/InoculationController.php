<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\InoculationResource;
use App\Models\Inoculation;
use Illuminate\Http\Request;

class InoculationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return InoculationResource::collection(Inoculation::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Inoculation  $inoculation
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function show(Inoculation $inoculation)
    {
        return new InoculationResource($inoculation);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Inoculation  $inoculation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Inoculation $inoculation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Inoculation  $inoculation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inoculation $inoculation)
    {
        //
    }
}
