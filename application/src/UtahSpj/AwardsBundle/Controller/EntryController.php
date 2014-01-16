<?php

namespace UtahSpj\AwardsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use \DateTime;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use UtahSpj\AwardsBundle\Entity\Entry;

class EntryController extends Controller
{
    public function userEntriesAction($id = null, Request $request)
    {
        $user = $this->getUser();
        $em = $this->getDoctrine()->getManager();
        if($id !== null && $id !== $user->getId()) {
            if (false === $this->get('security.context')->isGranted('ROLE_ADMIN')) {
                throw new AccessDeniedException();
            }
            if(null === $user = $em->find('UtahSpjAwardsBundle:User',$id)) {
                throw new NotFoundHttpException();
            }
        }
        $repo = $em->getRepository('UtahSpjAwardsBundle:Entry');
        $unpaid_entries = $repo->findBy(['user'=>$user, 'paid'=>false]);
        $paid_entries = $repo->findBy(['user'=>$user, 'paid'=>true]);
        return $this->render(
            'UtahSpjAwardsBundle:Entry:user-entries.html.twig',
            ['unpaid_entries'=>$unpaid_entries,'paid_entries'=>$paid_entries,'user'=>$user]
        );
    }
    public function viewAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $entry = $em->find('UtahSpjAwardsBundle:Entry',$id);
        if($this->getUser() != $entry->getUser()) {
            throw new AccessDeniedException();
        }
        return $this->render(
            'UtahSpjAwardsBundle:Entry:view.html.twig',
            array('entry'=>$entry)
        );
    }
    public function editAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $entry = $em->find('UtahSpjAwardsBundle:Entry',$id);
        if($this->getUser() != $entry->getUser()) {
            throw new AccessDeniedException();
        }
        $form = $this
            ->createFormBuilder($entry)
            ->add('title', 'text')
            ->add('url', 'url')
            ->add('email', 'email')
            ->add('description', 'textarea',['required'=>false])
            ->add('sections', 'entity', ['class'=>'UtahSpjAwardsBundle:Section', 'property'=>'title', 'multiple'=>false])
            ->add('save', 'submit', ['attr'=>['class'=>'btn btn-default']])
            ->getForm();
        $form->handleRequest($request);
        if($form->isValid()) {
            $entry->setUpdated(new DateTime());

            $em->persist($entry);
            $em->flush();
            return $this->redirect($this->generateUrl('utah_spj_awards_entry_view',['id'=>$entry->getId()]));
        }
        return $this->render(
            'UtahSpjAwardsBundle:Entry:edit.html.twig',
            array('form'=>$form->createView())
        );
    }
    public function createAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $this->getUser();
        $entry = new Entry();
        $form = $this
            ->createFormBuilder($entry)
            ->add('title', 'text')
            ->add('url', 'url')
            ->add('email', 'email',['data'=>$user->getEmail()])
            ->add('description', 'textarea',['required'=>false])
            ->add('save', 'submit', ['attr'=>['class'=>'btn btn-default']])
            ->getForm();
        $form->handleRequest($request);
        if($form->isValid()) {
            $entry->setEntryPeriod(date('Y'));
            $entry->setSubmitted(new DateTime());
            $entry->setUpdated(new DateTime());
            $entry->setPaid(false);
            $entry->setUser($user);
            $em->persist($entry);
            $em->flush();
            return $this->redirect($this->generateUrl('utah_spj_awards_entry_view',['id'=>$entry->getId()]));
        }
        return $this->render(
            'UtahSpjAwardsBundle:Entry:create.html.twig',
            array('form'=>$form->createView())
        );
    }

}
