<?php

$memoria = ['SO','SO','SO', '', '', '', 'P2', 'P2',
		   '', '', '', '', '', '', 'P3', 'P3', 'P3', '', '', '', ''];

$tamanhoMemoria = count($memoria) - 1;

function implementaMemoria($tamanho){
	global $memoria;
	
	$tamanhoFormatado = formataTamanho($tamanho);
	$contador = 0;
	$posInicio = null;
	$isValido = 0;
	
	for($i = 0; $i < count($memoria); $i++){
		if($memoria[$i] == ""){
			
			if($posInicio == null)
				$posInicio = $i;
			
			$contador++;
			
		}else{
			
			if($contador >= $tamanhoFormatado){
				
				while($tamanhoFormatado > 0){
					$memoria[$posInicio + ($tamanhoFormatado - 1)] = 
						(is_int($tamanho)) ? "P" . $tamanho : $tamanho;
					$tamanhoFormatado--;
				}
				break;
				
			}else{
				$contador = 0;
				$posInicio = null;
			}
		}
		
		if($i == (count($memoria) - 1) AND ($contador < $tamanhoFormatado)){
			echo "Sem espaço na memória!<br>";
		}
	}
}

function formataTamanho($value){
	return (int) preg_replace("/[^0-9]/", "", $value);
}

function vetorShow($memoria, $tamanhoMemoria){
	foreach($memoria as $key => $value){
		if ($key == 0){
			echo "|| ";
		}
		if ($value != null){
			echo $value . " || ";
		} else {
			echo "_ || ";
		}
		
		if ($key == $tamanhoMemoria){
			$check = $key - 1;
			if ($memoria[$check] == null){
				echo "_ ||<br>";
			} else {
				echo "||";
			}
		}
	}
}


echo "Memória original:<br>";
vetorShow($memoria, $tamanhoMemoria);
echo "<br>----------------------------------<br>";
echo "<br>";

echo "Programa P3 (tamanho 3): <br>";
implementaMemoria(3);
vetorShow($memoria, $tamanhoMemoria);
echo "<br>";

echo "Programa P5 (tamanho 5): <br>";
implementaMemoria(5);
vetorShow($memoria, $tamanhoMemoria);

echo "<br>";

echo "Programa P1 (tamanho 1): <br>";
implementaMemoria(1);
vetorShow($memoria, $tamanhoMemoria);

echo "<br>";
echo "Programa P9 (tamanho 9): <br>";
implementaMemoria('P9');
vetorShow($memoria, $tamanhoMemoria);