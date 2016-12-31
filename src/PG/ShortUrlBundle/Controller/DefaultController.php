<?php

namespace PG\ShortUrlBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('PGShortUrlBundle:Default:index.html.twig');
    }
}
