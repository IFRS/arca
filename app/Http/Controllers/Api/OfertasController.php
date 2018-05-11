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
        return OfertaResource::collection(Oferta::with(['curso', 'campus', 'arquivos'])
            ->when($request->has('campus'), function($query) use ($request) {
                return $query->where('campus_id', $request->get('campus'));
            })
            ->when($request->has('modalidade'), function($query) use ($request) {
                return $query->where('modalidade_id', $request->get('modalidade'));
            })
            ->get());
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
