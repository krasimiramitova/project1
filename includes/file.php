<?php
function is_Stebins($input)
{
//check with input
	$input=explode(' ', $input);
	switch (substr($input[0],0,1)) 
	{
		case '1':
			$j=9;
			break;
		case 'A':
			$j=0;
			break;
		case 'J':
			$j=10;
			break;
		case 'Q':
			$j=11;
			break;
		case 'K':
			$j=12;
			break;
		default:
			$j=substr($input[0],0,1)-1;
			break;
	} 
	switch (substr($input[0],-1,1)) 
	{
		case 'C':
			$k=0;
			break;
		case 'H':
			$k=1;
			break;
		case 'S':
			$k=2;
			break;
		case 'D':
			$k=3;
			break;
	}	
//generate Stabbins stack
	$value=[];
	$color=['C','H','S','D',];
	for ($i=0; $i<13; $i++)
		{
		if ($i==0) {$value[$i]='A';}
		elseif ($i==10)	{$value[$i]='J';}	
		elseif ($i==11)	{$value[$i]='Q';}
		elseif ($i==12)	{$value[$i]='K';}
		else			{$value[$i]=$i+1;}
		}
	$stack=[];
	for ($t=0; $t<52; $t++)
		{
		$stack[$t]=[];
		$stack[$t]['value']=$value[$j];
		$stack[$t]['color']=$color[$k];
		$k++;
		$j+=3;
		if ($k>3){$k=0;}
		if ($j>12){$j=$j%13;} 
		}
	for ($i=0; $i<count($stack); $i++) 
	{
		$stack[$i]=implode($stack[$i]);
	}
//сравняване на двете тестета
	$flag=true;
	for ($i=0; $i<count($input);)
	{		
		if($input[$i]==$stack[$i])
		{ 
			$i++;
		}
		else 
		{	
			$flag=false;
			$i++;
			break;
		}
	}
	$result[0]=$i;
	$result[1]=$flag;
	$result[2]=$input;
	return $result;
}