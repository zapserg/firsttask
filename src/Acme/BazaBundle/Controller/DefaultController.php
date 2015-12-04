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
     * @Route("/")
     * @Template()
    */
    public function showTovarAction()
        {
            $tovar=$this->getDoctrine()->getRepository('AcmeBazaBundle:Tovar')->findAll();
             
             if(!$tovar)
               {
               throw $this->createNotFoundException('No tovar found');
               }
         
            // Creating pagnination
            $paginator  = $this->get('knp_paginator');
            $pagination = $paginator->paginate(
                $tovar,
            $this->get('request')->query->get('page', 1),3);

            return $this->render('AcmeBazaBundle::index.html.twig', array('pagination' => $pagination)); 
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

            return $this->render('AcmeBazaBundle:category:name/categor.html.twig', array('articles' => $kategor));      
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

             // Creating pagnination
            $paginator  = $this->get('knp_paginator');
            $pagination = $paginator->paginate(
                $products,
                $this->get('request')->query->get('page', 1),3);

            return $this->render('AcmeBazaBundle:item:name/product.html.twig', array('products' => $pagination));
        }
}