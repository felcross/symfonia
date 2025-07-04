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

final class TestController extends AbstractController
{    


         #[Route('/test/api')]
    public function climatempoApi(#[MapQueryString] ?ClimaApiDTO $dto = null): Response 
    {    
          
        if(!$dto) 
        {
            $dto = new ClimaApiDTO();
            $dto->trials = 1;
            $dto->guess = 50; // Default guess
        }


         $forecasts = [];

          for($i = 0; $i < $dto->trials;$i++) {
             $draw = random_int(0,100);
              $forecast = $draw < $dto->guess ? 'Dia de chuva':'Dia de Sol'; 
              $forecasts[] = $forecast;
          }

          
          
          $json = [
              'forecasts' =>$forecasts ,
              'guess' => $dto->guess,
              'self' => $this->generateUrl('app_weather_climatempo',
              ['guess'=> $dto->guess],
               UrlGeneratorInterface::ABSOLUTE_URL),
          ];

          return  $this->json($json);

    

}

    
    #[Route('/test', name: 'app_test')]
    public function index(): JsonResponse
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/TestController.php',
        ]);
    }
}










