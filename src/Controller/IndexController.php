<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController
{
    /**
     * @Route ("/", name="app_inde_index")
     */
    public function index(): Response
    {
        return new Response(
            '<html><body>Hello world</body></html>'
        );
    }
}
