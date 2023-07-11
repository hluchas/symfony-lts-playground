<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    /**
     * @Route ("/", name="app_index_index")
     *
     * @Template("index/index.html.twig")
     *
     * @return array<string, mixed>
     */
    public function index(ProductRepository $productRepository): array
    {
        return [
            'page_title' => 'Products',
            'products' => $productRepository->findAll(),
        ];
    }
}
