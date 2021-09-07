<?php

namespace App\Http\Controllers\Api\V1\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Api\V1\Company\Company;
use App\Http\Resources\Api\V1\Company\CompanyResource;
use App\Http\Requests\Api\V1\Company\StoreUpdateFormRequest;
use App\Services\Api\V1\Evaluation\EvaluationService;

class CompanyController extends Controller
{
    protected $repository, $evaluationService;

    public function __construct( Company $model, EvaluationService $evaluationService )
    {
        $this->repository           = $model;
        $this->evaluationService    = $evaluationService;

    } // __construct

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( Request $request )
    {
        $companies = $this->repository->getCompanies( $request->get( 'filter', '' ) ); // Filtra, lista, ordena e pagina os registros

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

        $evaluations = $this->evaluationService->getEvaluationsCompany( $uuid );

        return ( new CompanyResource( $company ) )->additional(
            [ 'evaluations' => json_decode( $evaluations ) ]
        );
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

        $company->update( $request->validated() ); // Atualiza [Validando]

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
        $company = $this->repository->where( 'uuid', $uuid )->firstOrFail(); // Recupera pelo "UUID"

        $company->delete(); // Deleta

        return response()->json( [], 204 ); // Retornar a resposta de sucesso [Destroy]
    }
}
