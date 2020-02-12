<?php
function is_Stebins($input)
{
//work with input
//$input='9C QH 4S 7D 10H';
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
	switch (substr($input[0],-1,1)) {
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

//test input

/*var_dump($j);
echo '<pre>';
var_dump($input);
echo '</pre>';
*/

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
//$k=0;
//$j=0;
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
//test generation
/*
echo '<pre>';
var_dump($stack);
echo '</pre>';
*/
	$flag=true;
	for ($i=0; $i<count($input);)
	{		
		if($input[$i]==$stack[$i])
		{ 
//test position break
//			echo $i.' - '.$input[$i].' = '.$stack[$i].'<br>';
			$i++;
		}
		else 
		{	
			$flag=false;
			$i++;
			break;
		}
	}
	if ($flag==true)
	{
		echo '<div class="answer">yes</div>';
	}
	else {echo '<div class="answer">'.$i.'</div>';}
}
