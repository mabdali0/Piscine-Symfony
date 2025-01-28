<?php

// src/Controller/DatabaseController.php
namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class DatabaseController extends AbstractController
{

    public function index(): Response
    {
        return $this->render('database/create_table.html.twig');
    }

    /**
     * @Route("/create_table", name="create_table")
     */
    public function createTable(EntityManagerInterface $em): Response
    {
        try {
            // Generate the table using the Doctrine schema update command
            $em->getConnection()->executeQuery('CREATE TABLE IF NOT EXISTS user (
                id INT AUTO_INCREMENT PRIMARY KEY,
                username VARCHAR(255) UNIQUE,
                name VARCHAR(255),
                email VARCHAR(255) UNIQUE,
                enable BOOLEAN,
                birthdate DATETIME,
                address TEXT
            )');
            
            return $this->render('database/success.html.twig', [
                'message' => 'Table created successfully!'
            ]);
        } catch (\Exception $e) {
            return $this->render('database/error.html.twig', [
                'message' => 'Error: ' . $e->getMessage()
            ]);
        }
    }
}
