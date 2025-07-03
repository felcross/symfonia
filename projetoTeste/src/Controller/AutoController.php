<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class AutoController extends AbstractController
{
    //  public function climatempoApi(#[MapQueryParameter] int $guess = 50,#[MapQueryParameter] int $trials =1): Response 
    // {    
          
    //      $forecasts = [];

    //       for($i = 0; $i < $trials;$i++) {
    //          $draw = random_int(0,100);
    //           $forecast = $draw < $guess ? 'Dia de chuva':'Dia de Sol'; 
    //           $forecasts[] = $forecast;
    //       }

          
          
    //       $json = [
    //           'forecasts' =>$forecasts ,
    //           'guess' => $guess,
    //           'self' => $this->generateUrl('app_weather_climatempo',
    //           ['guess'=> $guess],
    //            UrlGeneratorInterface::ABSOLUTE_URL),
    //       ];

    //       return new JsonResponse($json);

    // }

}
