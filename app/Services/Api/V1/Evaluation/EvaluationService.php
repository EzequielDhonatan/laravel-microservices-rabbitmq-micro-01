<?php

namespace App\Services\Api\V1\Evaluation;

use Ezequieldhonatan\MicroservicesCommon\Services\Api\V1\Traits\External\ConsumerExternalService;

class EvaluationService
{
    use ConsumerExternalService;

    protected $url;
    protected $token;

    public function __construct()
    {
        $this->token = config( 'services.micro_02.token' );
        $this->url = config( 'services.micro_02.url' );
    }

    public function getEvaluationsCompany( string $company )
    {
        $response = $this->request( 'get', "/v1/evaluation/{$company}" );

        return $response->body();
    }

} // EvaluationService
