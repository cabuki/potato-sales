<?php

namespace App\Controller\API;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends AbstractController
{
    public function save(): Response
    {
        return new JsonResponse(["data" => ["message" => "Product Saved"]]);
    }
}