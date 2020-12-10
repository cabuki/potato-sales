<?php

namespace App\Controller\API;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class SalesController extends AbstractController
{
    private $resources;

    public function __construct( $resources )
    {
        $this->resources = $resources;
    }

    public function data(): Response
    {
        // Get the data from the resources directory
        $data = file_get_contents($this->resources . '/potato_sales.json');

        return new JsonResponse(["data" => $data]);
    }
}