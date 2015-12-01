<?php

namespace Acme\BazaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;
use Acme\StoreBundle\Entity\Kategor;

class DefaultController extends Controller
{
    /**
     * @Route("/hello/{name}")
     * @Template()
     */
    public function indexAction($name)
    {
        return array('name' => $name);
    }

    /**
     * @Route("/product/{name}/{famil}/{mail}")
     * @Template()
     */

    public function productShowAction($name,$famil,$mail)
    {
       
        /** $product="";
         if(!$product)
        {
        throw  $this->createNotFoundException('The product does not exist');
         }
        */
       // return new Response('<html><body>Hello '.$name.'!</body></html>');
          return $this->render('AcmeBazaBundle:Baza:product.html.twig', array('name' => $name,'famil'=> $famil,'mail'=> $mail)); 
       //  return $this->render('AcmeBazaBundle:Default:product.html.twig', array('name' => $name)); 
        //return $this->render('default/index.html.twig');
               //return $this->render('AcmeBazaBundle:product.html.twig');
    }

    public function createKategorAction()
        {
        $kategor = new Kategor();

        $kategor->setName('Електроника Офисная');
        $em=$this->getDoctrine()->getManager();
        $em->persist($kategor);
        $em->flush();
        return new Response('Created product id '.$kategor->getId());
        }



    public function showTovarAction()
        {
             $tovar=$this->getDoctrine()->getRepository('AcmeBazaBundle:Tovar')->findAll();
             
             if(!$tovar)
                {
                throw $this->createNotFoundException('No tovar found');
                }
         // ... do something, like pass the $product object into a template
        }


    public function showKategorAction()
        {
             $kategor=$this->getDoctrine()->getRepository('AcmeBazaBundle:Kategor')->findAll();
             
             if(!$kategor)
                {
                throw $this->createNotFoundException('No kategor found');
                }

          return $this->render('AcmeBazaBundle:Baza:product.html.twig', array('articles' => $kategor));      
         // ... do something, like pass the $product object into a template
        }       

}