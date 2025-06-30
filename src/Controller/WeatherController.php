<?php 
declare(strict_types=1);

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class WeatherController {


    #[Route('/clima/tempo')]
    public function climaTempo(): Response 
    {
        $draw =  random_int(1,100);

        $forecast =  $draw < 50 ? 'Vai Chuver':'Vai fazer sol';
        return new Response(
             "<html><body>$forecast</body></html>"
        );
    }


}

