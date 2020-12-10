<?php

namespace App\Controller\API;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends AbstractController
{
    public function save(Request $request): Response
    {
        $name = $request->request->get('name');
        return new JsonResponse(["data" => ["message" => "Product Saved : {$name}"]]);
    }
}