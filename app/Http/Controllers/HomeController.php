<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{

    public static $pokeneants = [

        ["id"=>"1", "name"=>"Juan", "altura"=>"1,85", "habilidad" => "Nadar", "imagen" => "https://storage.googleapis.com/pokeneaimg/zarco/zarco1.jpg", "frase" => "Vos sos calidad y media"],
        
        ["id"=>"2", "name"=>"Marco", "altura"=>"1,75", "habilidad" => "Volar", "imagen" => "https://storage.googleapis.com/pokeneaimg/zarco/zarco2.jpeg", "frase" => "Uy, mero fierro"],
        
        ["id"=>"3", "name"=>"Dani", "altura"=>"1,65", "habilidad" => "Caminar", "imagen" => "https://storage.googleapis.com/pokeneaimg/zarco/zarco3.jpg", "frase" => "Pilas pues ahi mijo, que lo que es con ella es conmigo"],
        
        ["id"=>"4", "name"=>"Stiven", "altura"=>"1,80", "habilidad" => "Mirar", "imagen" => "https://storage.googleapis.com/pokeneaimg/zarco/zarco4.jpg", "frase" => "Uy, mera Cenicienta"],

        ["id"=>"5", "name"=>"Alvarito", "altura"=>"1,70", "habilidad" => "Comer", "imagen" => "https://storage.googleapis.com/pokeneaimg/zarco/zarco5.png", "frase" => "Hagale que todo bien"],
        
        ["id"=>"6", "name"=>"Pepe", "altura"=>"1,60", "habilidad" => "Saltar", "imagen" => "https://storage.googleapis.com/pokeneaimg/zarco/zarco6.jpg", "frase" => "¿Si se acuerda de esta carita?"],
        
        ["id"=>"7", "name"=>"Pacho", "altura"=>"1,90", "habilidad" => "Correr", "imagen" => "https://storage.googleapis.com/pokeneaimg/zarco/zarco7.jpg", "frase" => "Hagale que yo soy la mera elegancia"],
        
        ["id"=>"8", "name"=>"Nacho", "altura"=>"1,95", "habilidad" => "Cortar", "imagen" => "https://storage.googleapis.com/pokeneaimg/zarco/zarco8.jpg", "frase" => "Oigan a esta, no se las venga a tirar de santa"]
    ];

    public function index()
    {
        $totalPants = (count(HomeController::$pokeneants));
        $randomNumber = (rand(0,($totalPants-1)));
        $randomPant = HomeController::$pokeneants[$randomNumber];
        unset($randomPant["imagen"]);
        return response()->json(['Pokenea' => $randomPant]);

    }

    public function quotes(){
        $totalPants = (count(HomeController::$pokeneants));
        $randomNumber = (rand(0,($totalPants-1)));
        $randomFrase = HomeController::$pokeneants[$randomNumber]["frase"];
        $randomImg = HomeController::$pokeneants[$randomNumber]["imagen"];
        $imageData = base64_encode(file_get_contents($randomImg));
        echo '<img src="data:image/jpeg;base64,'.$imageData.'">';
        echo '<br>';
        return response()->json(['Pokenea' => $randomFrase,'docker_id' => gethostbyname(gethostname())]);
    }
}
