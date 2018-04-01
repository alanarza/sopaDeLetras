<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
define("PALABRA", "OIE");

class SopaController extends Controller
{
	//Retorna vista principal
	public function index()
	{
		return view("welcome");
	}

	//Recibe una opcion de matriz y calcula en base a la opcion
    public function enviarMatriz (Request $request)
    {

    	$opcion = $request->opcion;

    	switch ($opcion) {
    		case '1':

    			$matriz1 = 	[
    					["O","I","E"],
    					["I","I","X"],
    					["E","X","E"]
    				];

    			$cantidad = $this->buscarPalabra($matriz1);

    			break;
    		case '2':

    			$matriz2 = 	[
    					["E","I","O","I","E","I","O","E","I","O"]
    				];

    			$cantidad = $this->buscarPalabra($matriz2);

    			break;
    		case '3':

    			$matriz3 = 	[
    					["E","A","E","A","E"],
    					["A","I","I","I","A"],
    					["E","I","O","I","E"],
    					["A","I","I","I","A"],
    					["E","A","E","A","E"]
    				];
    			
    			$cantidad = $this->buscarPalabra($matriz3);

    			break;
    		case '4':

    			$matriz4 = 	[
    					["O","X"],
    					["I","O"],
    					["E","X"],
    					["I","I"],
    					["O","X"],
    					["I","E"],
    					["E","X"]
    				];
    			
    			$cantidad = $this->buscarPalabra($matriz4);

    			break;
    		default:
    			# code...
    			break;
    	}

    	return $cantidad;
    }

    //Funcion que busca la palabra en los 8 sentidos posibles
    public function buscarPalabra($array)
    {

    	$contPalabra = 0;
    	$arrayHorizontal = [];
    	$arrayVertical = [];
    	$filaMatriz = count( $array );
		$columnaMatriz = max(array_map('count', $array));

		//Iteracion que busca la palabra de izquierda a derecha
		for($fila = 0; $fila < $filaMatriz; $fila++)
		{
			for($columna = 0; $columna < $columnaMatriz; $columna++)
			{
				 $arrayHorizontal[$columna] = $array[$fila][$columna];
					 
				if($columna+1 >= $columnaMatriz)
				{
				 	
					$strUnido = implode($arrayHorizontal);
			 		$contPalabra += substr_count($strUnido,PALABRA);
					$strUnido = strrev($strUnido);
			 		$contPalabra += substr_count($strUnido,PALABRA);
				}
			}
		}

		//Iteracion que busca la palaba de arriba hacia abajo
    	for($columna = 0; $columna < $columnaMatriz; $columna++)
		{
			for($fila = 0; $fila < $filaMatriz; $fila++)
			{
				$arrayVertical[$fila] = $array[$fila][$columna];

				if($fila+1 >= $filaMatriz)
				{					 	
					$strUnido = implode($arrayVertical);
			 		$contPalabra += substr_count($strUnido,PALABRA);
				 	$strUnido = strrev($strUnido);
			 		$contPalabra += substr_count($strUnido,PALABRA);
				}
			}
		}

		//Condicion para calcular en base al ancho/alto de la matriz
		if($filaMatriz >= 3 && $columnaMatriz >= 3)
		{

			$r=$filaMatriz;
			$c=$columnaMatriz;
			$vectorvacio=[];
			$contador = 0;

			//Iteracion que recorre la matriz en diagonal de izquierda a derecha
			//Recorre la primera mitad, ambos sentidos.
			for($i=$c; $i>=0; $i--)
			{
			    $y=$i;
			    $x=0;
			    
			    while($y<$c)
			    {
			        $vectorvacio[$contador] = $array[$x][$y];
			        $contador++;
			        $x++;
			        $y++;
			    }

			    $strUnido = implode($vectorvacio);
		 		$contPalabra += substr_count($strUnido,PALABRA);
				$strUnido = strrev($strUnido);
		 		$contPalabra += substr_count($strUnido,PALABRA);
			    $vectorvacio=[];
				$contador = 0;
			}

			//Iteracion que recorre la matriz en diagonal de izquierda a derecha
			//Recorre la segunda mitad, ambos sentidos
			for($i=1;$i<=$r;$i++)
			{
			    $x=$i;
			    $y=0;
			    
			    while($x<$r)
			    {
			        $vectorvacio[$contador] = $array[$x][$y];
			        $contador++;
			        $x++;
			        $y++;
			    }

			    $strUnido = implode($vectorvacio);
		 		$contPalabra += substr_count($strUnido,PALABRA);
				$strUnido = strrev($strUnido);
		 		$contPalabra += substr_count($strUnido,PALABRA);
			    $vectorvacio=[];
				$contador = 0;
			}

			//Iteracion que recorre la matriz en diagonal de derecha a izquierda
			//Recorre la primera mitad, ambos sentidos.
			for($i=0;$i<$c;$i++)
			{
			    $y=$i;
			    $x=0;

			    while($y >= 0 && $x<$r)
			    {
			        $vectorvacio[$contador] = $array[$x][$y];
			        $contador++;
			        $x++;
			        $y--;
			    }

			    $strUnido = implode($vectorvacio);
		 		$contPalabra += substr_count($strUnido,PALABRA);
				$strUnido = strrev($strUnido);
		 		$contPalabra += substr_count($strUnido,PALABRA);
			    $vectorvacio=[];
				$contador = 0;
			}

			//Iteracion que recorre la matriz en diagonal de derecha a izquierda
			//Recorre la segunda mitad, ambos sentidos.
			for($i=1;$i<$r;$i++)
			{
			    $x=$i;
			    $y=$c-1;
			    
			    while($x<$r)
			    {
			        $vectorvacio[$contador] = $array[$x][$y];
			        $contador++;
			        $x++;
			        $y--;
			    }

			    $strUnido = implode($vectorvacio);
		 		$contPalabra += substr_count($strUnido,PALABRA);
				$strUnido = strrev($strUnido);
		 		$contPalabra += substr_count($strUnido,PALABRA);
			    $vectorvacio=[];
				$contador = 0;
			}

		}

    	return $contPalabra;
    }
}