<?php

namespace App\Http\Controllers\Api\V1\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Api\V1\Company\Company;
use App\Http\Resources\Api\V1\Company\CompanyResource;
use App\Http\Requests\Api\V1\Company\StoreUpdateFormRequest;

class CompanyController extends Controller
{
    protected $repository;

    public function __construct( Company $model )
    {
        $this->repository = $model;

    } // __construct

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = $this->repository->with( 'category' )->latest()->paginate(); // Lista, ordena e pagina

        return CompanyResource::collection( $companies ); // Retorna uma "Resource/Collection"
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store( StoreUpdateFormRequest $request )
    {
        $company = $this->repository->create( $request->validated() ); // Cadastra

        return new CompanyResource( $company ); // Retorna uma "Resource/Collection"
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $uuid
     * @return \Illuminate\Http\Response
     */
    public function show( $uuid )
    {
        $company = $this->repository->where( 'uuid', $uuid )->firstOrFail(); // Recupera pelo "UUID"

        return new CompanyResource( $company ); // Retorna uma "Resource/Collection"
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $uuid
     * @return \Illuminate\Http\Response
     */
    public function update( StoreUpdateFormRequest $request, $uuid )
    {
        $company = $this->repository->where( 'uuid', $uuid )->firstOrFail(); // Recupera pelo "UUID"

        $company->update( $request->validated() ); // Retorna uma "Resource/Collection"

        return response()->json( [ 'message' => 'Updated' ] ); // Retornar a resposta de sucesso [Updated]
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string  $uuid
     * @return \Illuminate\Http\Response
     */
    public function destroy( $uuid )
    {
        //
    }
}
