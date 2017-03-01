<?php

namespace PG\ShortUrlBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Description of ShortUrlController
 *
 * @author Gianni Prosperi
 */
class ShortUrlController extends Controller {
    
    public function indexAction($urlcode) {
        
        /* @var $repository PG\ShortUrlBundle\Repository\Url */
        $repository = $this->getDoctrine()->getManager()->getRepository("PGShortUrlBundle:Url");
        
        $urlEntity = $repository->findOneBy([
            "code" => $urlcode,
            "active" => 1
        ]);

        /* @var $urlEntity \PG\ShortUrlBundle\Entity\Url */
        if (null != $urlEntity) {
            return $this->redirect($urlEntity->getLongUrl(), 301);
        }
        
        return $this->render('PGShortUrlBundle:ShortUrl:urlNotFound.html.twig');
    }
    
}
