<?php
// src/Controller/ColorController.php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\Routing\Annotation\Route;

class ColorController extends AbstractController
{
    private $numberOfColors;
    private $colors;

    public function __construct(ParameterBagInterface $params)
    {
        // Récupérer le nombre de lignes et les couleurs définies dans services.yaml
        $this->numberOfColors = $params->get('e03.number_of_colors');
        $this->colors = $params->get('e03.colors');
    }

    /**
     * @Route("/e03", name="colors_page")
     */
    public function index(): Response
    {
        $shades = [];

        foreach ($this->colors as $color) {
            $shades[$color] = [];

            for ($i = 0; $i < $this->numberOfColors; $i++) {
                // Ajuster la couleur en fonction du type
                switch ($color) {
                    case 'black':
                        // Le noir commence à #000000 et s'éclaircit vers #FFFFFF
                        $shadeValue = min(255, $i * (255 / ($this->numberOfColors - 1))); // augmenter progressivement
                        $shade = sprintf('#%02x%02x%02x', $shadeValue, $shadeValue, $shadeValue); // Gris de plus en plus clair
                        break;
                    case 'red':
                        $shade = sprintf('#%02x%02x%02x', 255 - ($i * 30), 0, 0);
                        break;
                    case 'blue':
                        $shade = sprintf('#%02x%02x%02x', 0, 0, 255 - ($i * 30));
                        break;
                    case 'green':
                        $shade = sprintf('#%02x%02x%02x', 0, 255 - ($i * 30), 0);
                        break;
                    default:
                        $shade = '#000000'; // fallback in case of undefined color
                }
                $shades[$color][] = $shade;
            }
        }

        return $this->render('color/index.html.twig', [
            'shades' => $shades,
            'colors' => $this->colors,
            'number_of_colors' => $this->numberOfColors,
        ]);
    }
}
