<?php


// src/Controller/DatabaseController.php

namespace App\Controller;

use Doctrine\DBAL\Connection;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class DatabaseController extends AbstractController
{
    private $connection;

    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    public function index(): Response
    {
        return $this->render('database/create_table.html.twig');
    }

    /**
     * @Route("/create-table", name="create_table")
     */
    public function createTable(): Response
    {
        try {
            // Requête SQL pour créer la table
            $sql = "
                CREATE TABLE IF NOT EXISTS users (
                    id INT AUTO_INCREMENT PRIMARY KEY,
                    username VARCHAR(255) UNIQUE NOT NULL,
                    name VARCHAR(255) NOT NULL,
                    email VARCHAR(255) UNIQUE NOT NULL,
                    enable BOOLEAN NOT NULL,
                    birthdate DATETIME NOT NULL,
                    address LONGTEXT
                )
            ";

            // Exécution de la requête SQL
            $this->connection->executeStatement($sql);

            // Message de succès
            return $this->render('database/success.html.twig', [
                'message' => 'Table created successfully!'
            ]);
        } catch (\Exception $e) {
            // Gestion des erreurs
            return $this->render('database/error.html.twig', [
                'message' => 'Error: ' . $e->getMessage()
            ]);
        }
    }
}
