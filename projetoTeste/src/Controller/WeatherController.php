<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;


class WeatherController extends AbstractController {


    #[Route('/clima/tempo/{guess<\d+>?50}',  host: 'api.localhost')]
    public function climatempoApi(int $guess): Response 
    {
          $draw = random_int(0,100);

          $forecast = $draw < $guess ? 'Dia de chuva':'Dia de Sol'; 
          
          $json = [
              'forecast' =>$forecast,
              'self' => $this->generateUrl('app_weather_climatempo',
              ['guess'=> 40],
               UrlGeneratorInterface::ABSOLUTE_URL),
          ];

          return new JsonResponse($json);

    }


    #[Route('/clima/tempo/{guess<\d+>?50}')]
    public function climatempo(int $guess): Response 
    {
          $draw = random_int(0,100);

          $forecast = $draw < $guess ? 'Dia de chuva':'Dia de Sol'; 
          
  

         return $this->render('weather/clima.html.twig' ,[
            'forecast' => $forecast
          ]);

    }


    #[Route('/clima/tempo/{guess}')]
    public function clima(String $guess): Response 
    {
          

          $forecast ="Dia de {$guess}";

          return $this->render('weather/clima.html.twig' ,[
            'forecast' => $forecast
          ]);

    }
}