<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class IndexController
{
    /**
     * @Route ("/", name="app_inde_index")
     * @Template("index/index.html.twig")
     */
    public function index(): array
    {
        return [
            'page_title' => 'Hello world!',
            'text' => 'Hello you!',
        ];
    }
}
