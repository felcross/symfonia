<?php

namespace App\Controller;

use App\Model\ClimaApiDTO;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\MapQueryParameter;
use Symfony\Component\HttpKernel\Attribute\MapQueryString;
use Symfony\Component\HttpKernel\Attribute\MapRequestPayload;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;


class WeatherController extends AbstractController {




    #[Route('/clima/tempo/{guess<\d+>}')]
    public function climatempo(Request $request, RequestStack $requestStack , ?int $guess = null): Response 
    {      
      
      $session = $requestStack->getSession();
      if($guess) {
        $session->set('guess',$guess);
        $this->addFlash('info',"Sua previsão é de {$guess} % de chuva");
      }
      else { $guess = $session->get('guess');}

           
         $trials = $request->get('trials',1);
         
;          
         $forecasts = [];

          for($i = 0; $i < $trials;$i++) {
             $draw = random_int(0,100);
              $forecast = $draw < $guess ? 'Dia de chuva':'Dia de Sol'; 
              $forecasts[] = $forecast;
          }    


         return $this->render('weather/clima.html.twig' ,[
            'forecasts' => $forecasts,
            'guess' => $guess,
          ]);

    }


    #[Route('/clima/tempo/{guess}')]
    public function clima(String $guess): Response 
    {   
         $validos = ['sol','chuva','neve'];
         if(!in_array($guess, $validos)) {
            throw $this->createNotFoundException('Previsão inválida');
      }
          

          $forecasts ="Dia de {$guess}";

          return $this->render('weather/clima.html.twig' ,[
            'forecasts' => [$forecasts],
            'guess' => $guess
          ]);

    }
}