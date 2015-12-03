<?php

namespace Acme\BazaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;
use Acme\StoreBundle\Entity\Kategor;
use Acme\StoreBundle\Entity\Tovar;

class DefaultController extends Controller
{    
    /**
     * @Route("/alltovar")
     * @Template()
    */
    public function showTovarAction()
        {
             $tovar=$this->getDoctrine()->getRepository('AcmeBazaBundle:Tovar')->findAll();
             
             if(!$tovar)
                {
                throw $this->createNotFoundException('No tovar found');
                }
            return $this->render('AcmeBazaBundle:Baza:index.html.twig', array('tovars' => $tovar));     
        }

    /**
     * @Route("/kategor")
     * @Template()
    */

    public function showKategorAction()
        {
            $kategor=$this->getDoctrine()->getRepository('AcmeBazaBundle:Kategor')->findAll();
             
            if(!$kategor)
                {
                throw $this->createNotFoundException('No kategor found');
                }

            return $this->render('AcmeBazaBundle:Baza:categor.html.twig', array('articles' => $kategor));      
        }       

    /**
     * @Route("/tovar/{idtovar}")
     * @Template()
    */
     public function showProductAction($idtovar)
        {
            $category = $this->getDoctrine()
                ->getRepository('AcmeBazaBundle:Kategor')
                ->find($idtovar);

            $products = $category->getIdtovar();
 
        return $this->render('AcmeBazaBundle:Baza:product.html.twig', array('products' => $products));
        }
}