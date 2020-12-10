<?php

namespace App\Controller;

use App\Entity\Product;
use App\Form\ProductType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends AbstractController
{
    public function newProduct(): Response
    {
        $product = new Product();

        $form = $this->createForm(ProductType::class, $product);

        return $this->render(
            'new_product.html.twig',
            [
                'pagename' => 'New Product',
                'form' => $form->createView()
            ]
        );
    }
}