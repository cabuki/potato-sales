<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class SalesController extends AbstractController
{
    public function sales(): Response
    {
        return $this->render(
            'sales.html.twig',
            [
                'pagename' => 'Sales',
                'url' => $this->generateUrl('api_sales'),
            ]
        );
    }
}