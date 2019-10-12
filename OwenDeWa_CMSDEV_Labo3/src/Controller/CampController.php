<?php

namespace App\Controller;

use App\Entity\Camps;
use App\Entity\CampsTranslation;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Translation\TranslatorInterface;

class CampController extends AbstractController
{
    /**
     * @Route("/add", name="add-page", methods={"GET", "POST"})
     */
    public function addCampPage(\Symfony\Component\HttpFoundation\Request $request, TranslatorInterface $translator)
    {
        $camp = New Camps();
        $campTrans = New CampsTranslation();
        $form = $this->createFormBuilder($camp)
            ->add('date', DateType::class)
            ->add('image', TextType::class)
            ->add('watch', CheckboxType::class, [
                'label' => 'Watch',
                'required' => false,
            ])
            ->getForm();
      $formtrans = $this->createFormBuilder($campTrans)
            ->add('title', TextType::class)
            ->add('quote', TextType::class)
            ->add('description', TextType::class)
            ->add('save', SubmitType::class, ['label' => 'Add camp'])
            ->getForm();

        if($request->isMethod('get')){
            return $this->render('camp/add.html.twig', [
                'form' => $form->createView(),
                'formTrans' => $formtrans->createView(),

            ]);
        }
        if($request->isMethod('post')){
            $formdata = $request->request->get('form');
            $manager = $this->getDoctrine()->getManager();
            $camp->setDate(new \DateTime($formdata['date']['day'].'/'.$formdata['date']['month'].'/'.$formdata['date']['year']));
            $camp->setImage($formdata['image']);
            if(array_key_exists("watch", $formdata)){
                $camp->setWatch($formdata['watch']);
            }
            $camp->translate('nl')->setTitle('NL ' . $formdata['title']);
            $camp->translate('en')->setTitle('EN ' . $formdata['title'] );
            $camp->translate('nl')->setQuote('NL ' . $formdata['title']);
            $camp->translate('en')->setQuote('EN ' . $formdata['title']);
            $camp->translate('nl')->setDescription('NL ' . $formdata['description']);
            $camp->translate('en')->setDescription('EN ' . $formdata['description']);

            $camp->mergeNewTranslations();
            $manager->persist($camp);
            $manager->flush();

            return $this->redirectToRoute('add-page');
        }
    }
}
