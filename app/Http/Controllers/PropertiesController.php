<?php

namespace App\Http\Controllers;

use App\Http\Resources\PropertiesResource;
use App\Models\Property;
use Illuminate\Http\Request;

class PropertiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return PropertiesResource::collection(Property::all());
    }
}
