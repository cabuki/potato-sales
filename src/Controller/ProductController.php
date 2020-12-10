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
        // Create an empty entity
        $product = new Product();

        // Create the form
        $form = $this->createForm(
            ProductType::class,
            $product,
            [
                'action' => $this->generateUrl('api_product'),
                'attr' => ['id' => 'product'] // Set the id so the form can be manipulated by JS
            ]
        );

        return $this->render(
            'new_product.html.twig',
            [
                'pagename' => 'New Product',
                'form' => $form->createView()
            ]
        );
    }
}