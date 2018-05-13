<?php 
/**
*  Validates opening and closing brackets
*/

function validate_brackets($string) 
{

	$balance = array(
		'}' => '{',
		')' => '(',
		']' => '[',
	);

	$opening = array();

	// only brackets 
	$brackets = preg_replace('/[^\[\{\(\)\}\]]/', '', $string);

	// break string into array
	$array_brackets = str_split($brackets); 

	// iterate over each charracter
	foreach ($array_brackets as $bracket) { 

		// if opening bracket
		if (in_array($bracket, $balance)) { 
			$opening[] = $bracket;  

		} else {

			// checks closure of last opening bracket 
			if (array_pop($opening) != $balance[$bracket]) { 
				return false;
			}

		}

	}

	// opening bracket without closure
	if (count($opening) > 0) { 
		return false;
	}

	return true;

}


$str = '[{}({}[])]';

var_dump(validate_brackets($str));	