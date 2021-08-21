<?php

namespace App\Http\Controllers\Api\V1\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Api\V1\Category\Category;
use App\Http\Resources\Api\V1\Category\CategoryResource;
use App\Http\Requests\Api\V1\Category\StoreUpdateFormRequest;

class CategoryController extends Controller
{
    protected $repository;

    public function __construct( Category $model )
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
        $categories = $this->repository->latest()->paginate(); // Lista, ordena e pagina

        return CategoryResource::collection( $categories ); // Retorna uma "Resource/Collection"
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store( StoreUpdateFormRequest $request )
    {
        $category = $this->repository->create( $request->validated() ); // Cadastra

        return new CategoryResource( $category ); // Retorna uma "Resource/Collection"
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

} // CategoryController
