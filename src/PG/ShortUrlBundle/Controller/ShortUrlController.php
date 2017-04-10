<?php

namespace PG\ShortUrlBundle\Controller;

use PG\ShortUrlBundle\Entity\Url;
use PG\ShortUrlBundle\Repository\Url as Url2;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

/**
 * Description of ShortUrlController
 *
 * @author Gianni Prosperi
 */
class ShortUrlController extends Controller {
    
    public function indexAction($urlcode) {
        
        /* @var $repository Url2 */
        $repository = $this->getDoctrine()->getManager()->getRepository("PGShortUrlBundle:Url");
        
        $urlEntity = $repository->findOneBy([
            "code" => $urlcode,
            "active" => 1
        ]);

        /* @var $urlEntity Url */
        if (null != $urlEntity) {
            return $this->redirect($urlEntity->getLongUrl(), 301);
        }
        
        
        $response = new Response();
        $response->setStatusCode(Response::HTTP_NOT_FOUND);
        
        return $this->render('PGShortUrlBundle:ShortUrl:urlNotFound.html.twig', [], $response);
    }
    
}
