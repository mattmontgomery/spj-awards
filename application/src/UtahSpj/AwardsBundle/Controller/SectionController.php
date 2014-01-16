<?php

namespace UtahSpj\AwardsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use UtahSpj\AwardsBundle\Entity\Section;

class SectionController extends Controller
{
    public function viewAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $section = $em->find('UtahSpjAwardsBundle:Section',$id);
        return $this->render(
            'UtahSpjAwardsBundle:Section:view.html.twig',
            ['section'=>$section]
        );
    }

    public function editAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $section = $em->find('UtahSpjAwardsBundle:Section',$id);
        $form = $this
            ->createFormBuilder($section)
            ->add('title', 'text')
            ->add('save', 'submit', ['attr'=>['class'=>'btn btn-default']])
            ->getForm();
        $form->handleRequest($request);
        if($form->isValid()) {
            $em->persist($section);
            $em->flush();
            return $this->redirect($this->generateUrl('awards_section_view',['id'=>$section->getId()]));
        }
        return $this->render(
            'UtahSpjAwardsBundle:Section:edit.html.twig',
            ['form'=>$form->createView(),'section'=>$section]
        );
    }

    public function createAction(Request $request)
    {
        $section = new Section();
        $em = $this->getDoctrine()->getManager();
        $form = $this
            ->createFormBuilder($section)
            ->add('title', 'text')
            ->add('save', 'submit', ['attr'=>['class'=>'btn btn-default']])
            ->getForm();
        $form->handleRequest($request);
        if($form->isValid()) {
            $em->persist($section);
            $em->flush();
            return $this->redirect($this->generateUrl('awards_section_view',['id'=>$section->getId()]));
        }
        return $this->render(
            'UtahSpjAwardsBundle:Section:create.html.twig',
            ['form'=>$form->createView()]
        );
    }

    public function listAction()
    {
        $em = $this->getDoctrine()->getManager();
        $sections = $em->getRepository('UtahSpjAwardsBundle:Section')->findAll();
        return $this->render(
            'UtahSpjAwardsBundle:Section:list.html.twig',
            ['sections'=>$sections]
        );
    }

    public function entriesAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $section = $em->find('UtahSpjAwardsBundle:Section',$id);
        return $this->render(
            'UtahSpjAwardsBundle:Section:entries.html.twig',
            ['section'=>$section]
        );
    }

}
