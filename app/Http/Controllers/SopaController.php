<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SopaController extends Controller
{
	public function index()
	{
		return view("welcome");
	}

    public function opcion1 ()
    {
    	$miArray = 	[
    					["O","I","E"],
    					["I","I","X"],
    					["E","X","E"]
    				];

    	$cantidad = $this->buscarPalabra($miArray);

    	return view("welcome",compact("cantidad"));
    }

    public function opcion2 ()
    {
    	$miArray = 	[
    					["E","I","O","I","E","I","O","E","I","O"]
    				];

    	$cantidad = $this->buscarPalabra($miArray);

    	return view("welcome",compact("cantidad"));	
    }

    public function opcion3 ()
    {
    	$miArray = 	[
    					["E","A","E","A","E"],
    					["A","I","I","I","A"],
    					["E","I","O","I","E"],
    					["A","I","I","I","A"],
    					["E","A","E","A","E"]
    				];

    	$cantidad = $this->buscarPalabra($miArray);

    	return view("welcome",compact("cantidad"));
    }

    public function opcion4 ()
    {
    	$miArray = 	[
    					["O","X"],
    					["I","O"],
    					["E","X"],
    					["I","I"],
    					["O","X"],
    					["I","E"],
    					["E","X"]
    				];

    	$cantidad = $this->buscarPalabra($miArray);

    	return view("welcome",compact("cantidad"));
    }

    public function buscarPalabra($array)
    {

    	$contPalabra = 0;
    	$arrayHorizontal = [];
    	$arrayVertical = [];
    	$filaMatriz = count( $array );
		$columnaMatriz = max(array_map('count', $array));

		for($fila = 0; $fila < $filaMatriz; $fila++)
		{
			for($columna = 0; $columna < $columnaMatriz; $columna++)
			{
				 $arrayHorizontal[$columna] = $array[$fila][$columna];
					 
				if($columna+1 >= $columnaMatriz)
				{
				 	
					$strUnido = implode($arrayHorizontal);
			 		$contPalabra += substr_count($strUnido,"OIE");
					$strUnido = strrev($strUnido);
			 		$contPalabra += substr_count($strUnido,"OIE");
				}
			}
		}

    	for($columna = 0; $columna < $columnaMatriz; $columna++)
		{
			for($fila = 0; $fila < $filaMatriz; $fila++)
			{
				$arrayVertical[$fila] = $array[$fila][$columna];

				if($fila+1 >= $filaMatriz)
				{					 	
					$strUnido = implode($arrayVertical);
			 		$contPalabra += substr_count($strUnido,"OIE");
				 	$strUnido = strrev($strUnido);
			 		$contPalabra += substr_count($strUnido,"OIE");
				}
			}
		}

		////////////////////////////////////////////////////////////////////////////////////////

		if($filaMatriz >= 3 && $columnaMatriz >= 3)
		{

			$r=$filaMatriz;
			$c=$columnaMatriz;
			$vectorvacio=[];
			$contador = 0;

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
		 		$contPalabra += substr_count($strUnido,"OIE");
				$strUnido = strrev($strUnido);
		 		$contPalabra += substr_count($strUnido,"OIE");
			    $vectorvacio=[];
				$contador = 0;
			}

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
		 		$contPalabra += substr_count($strUnido,"OIE");
				$strUnido = strrev($strUnido);
		 		$contPalabra += substr_count($strUnido,"OIE");
			    $vectorvacio=[];
				$contador = 0;
			}

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
		 		$contPalabra += substr_count($strUnido,"OIE");
				$strUnido = strrev($strUnido);
		 		$contPalabra += substr_count($strUnido,"OIE");
			    $vectorvacio=[];
				$contador = 0;
			}

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
		 		$contPalabra += substr_count($strUnido,"OIE");
				$strUnido = strrev($strUnido);
		 		$contPalabra += substr_count($strUnido,"OIE");
			    $vectorvacio=[];
				$contador = 0;
			}

		}

    	return $contPalabra;
    }
}
