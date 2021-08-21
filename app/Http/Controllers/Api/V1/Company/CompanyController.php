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
        $companies = $this->repository->with( 'category' )->latest()->paginate();

        return CompanyResource::collection( $companies );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store( StoreUpdateFormRequest $request )
    {
        $company = $this->repository->create( $request->validated() );

        return new CompanyResource( $company );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
