<?php

namespace App\Controller;

use App\Entity\Camps;
use App\Entity\Reactions;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Routing\Annotation\Route;

class DetailController extends AbstractController
{
    /**
     * @Route("/{slug}/detail/{id}", name="detailpage")
     */
    public function detail($id, $slug,\Symfony\Component\HttpFoundation\Request $request)
    {

        $manager = $this->getDoctrine()->getManager();
        $camp = $manager->getRepository(Camps::class)->find($id);
        $reactions = $manager->getRepository(Reactions::class);
        $currentreactions = $reactions->findBy(array('camp' => $id));
        $reaction = new Reactions();
        $form = $this->createFormBuilder($reaction)
            ->add('name', TextType::class)
            ->add('content', TextType::class)
            ->add('save', SubmitType::class, ['label' => 'comment'])
            ->getForm();

        if($request->isMethod('get')){

            return $this->render('camp/detail.html.twig', [
                'controller_name' => 'WelcomeController',
                'camp' => $camp,
                'form' => $form->createView(),
                'reactions' => $currentreactions,
                'totalreactions' => count($currentreactions),
                'lang' => $slug
            ]);
        }
        if($request->isMethod('post')){
            $data = $request->request->get('form');
            $time = new \DateTime();
            $manager = $this->getDoctrine()->getManager();
            $reaction->setName($data['name']);
            $reaction->setContent($data['content']);
            $reaction->setDate($time);
            $reaction->setCamp($id);
            $manager->persist($reaction);
            $manager->flush();
            return $this->redirectToRoute('detailpage',
                [
                    'id' =>$id,
                    'slug' => $slug
                ]
            );
        }
    }
}
