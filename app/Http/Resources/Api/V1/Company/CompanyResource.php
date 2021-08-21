<?php

namespace App\Http\Resources\Api\V1\Company;

use Illuminate\Http\Resources\Json\JsonResource;

use App\Http\Resources\Api\V1\Category\CategoryResource;

class CompanyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [

            /* DADOS DA EMPRESA
            ================================================== */
            'identify'          => $this->uuid,

            'category'          => new CategoryResource( $this->category ),

            'name'              => $this->name,
            'url'               => $this->url,

            'phone'             => $this->phone,
            'whatsapp'          => $this->whatsapp,
            'email'             => $this->email,

            'whatsapp'          => $this->whatsapp,
            'facebook'          => $this->facebook,
            'instagram'         => $this->instagram,
            'youtube'           => $this->youtube

        ]; // return
    }
}
