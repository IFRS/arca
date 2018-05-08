<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Oferta;
use App\Http\Resources\Oferta as OfertaResource;

class OfertasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('campus')) {
            return OfertaResource::collection(Oferta::with(['curso', 'arquivos'])->whereHas('campus', function($query) use ($request) {
                $query->where('id', '=', $request->get('campus'));
            })->get());
        }
        return OfertaResource::collection(Oferta::with(['curso', 'campus', 'arquivos'])->get());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new OfertaResource(Oferta::with(['curso', 'campus'])->findOrFail($id));
    }
}
