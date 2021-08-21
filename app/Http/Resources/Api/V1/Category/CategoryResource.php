<?php

namespace App\Http\Resources\Api\V1\Category;

use Illuminate\Http\Resources\Json\JsonResource;

use Carbon\Carbon;

class CategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray( $request )
    {
        return [

            'title'             => $this->title,
            'slug'              => $this->url,
            'description'       => $this->description,
            'date_created'      => Carbon::make( $this->created_at )->format( 'd/m/Y' )

        ]; // return
    }

} // CategoryResource
