<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Validator\Constraints\NotBlank;

class NotesController extends AbstractController
{
    /**
     * @Route("/e02", name="notes_form")
     */
    public function form(Request $request): Response
    {
        $filePath = $this->getParameter('notes_file_path');

        // Créer le fichier s'il n'existe pas
        if (!file_exists($filePath)) {
            touch($filePath);
        }

        // Créer le formulaire
        $form = $this->createFormBuilder()
            ->add('message', TextType::class, [
                'label' => 'Message',
                'constraints' => [
                    new NotBlank([
                        'message' => 'Le message ne doit pas être vide.',
                    ]),
                ],
            ])
            ->add('includeTimestamp', ChoiceType::class, [
                'label' => 'Include timestamp',
                'choices' => [
                    'Yes' => 'yes',
                    'No' => 'no',
                ],
            ])
            ->add('submit', SubmitType::class, ['label' => 'Submit'])
            ->getForm();

        $form->handleRequest($request);

        $lastLine = null;

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();

            // Construire la ligne à écrire dans le fichier
            $line = $data['message'];
            if ($data['includeTimestamp'] === 'yes') {
                $line .= ' | ' . (new \DateTime())->format('Y-m-d H:i:s');
            }

            // Ajouter la ligne au fichier
            file_put_contents($filePath, $line . PHP_EOL, FILE_APPEND);

            // Récupérer la dernière ligne ajoutée
            $lastLine = $line;
        }

        // Récupérer le contenu du fichier pour l'afficher
        $fileContent = file($filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        return $this->render('notes/form.html.twig', [
            'form' => $form->createView(),
            'lastLine' => $lastLine,
            'fileContent' => $fileContent,
        ]);
    }
}
