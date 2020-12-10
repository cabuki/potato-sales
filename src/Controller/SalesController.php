<?php

namespace App\Controller;

use App\Entity\Product;
use App\Form\ProductType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class SalesController extends AbstractController
{
    public function sales(): Response
    {
        $product = new Product();

        $form = $this->createForm(ProductType::class, $product);

        return $this->render(
            'sales.html.twig',
            [
                'pagename' => 'Sales',
                'url' => $this->generateUrl('api_sales')
            ]
        );
    }
}