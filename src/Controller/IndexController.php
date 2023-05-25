<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class IndexController extends AbstractController
{
    /**
     * @Route ("/", name="app_index_index")
     * @Template("index/index.html.twig")
     */
    public function index(ProductRepository $productRepository): array
    {
        return [
            'page_title' => 'Products',
            'products' => $productRepository->findAll(),
        ];
    }
}
