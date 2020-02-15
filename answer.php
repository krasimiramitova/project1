<?php
include ('includes/header.php');

include ('includes/file.php');

$input=$_POST['string'];
$result=is_Stebins($input);
$i=$result[0];
$flag=$result[1];
$input=$result[2];

if ($flag==true)
	{
		echo '<div class="answer">yes</div>';
	}
	else
		{
		if ($i==2) 
			{echo '<div class="answer"> no </div>';}
		else 
			{
			echo '<div class="answer_small">Yes, to № '.$i.' </div>';
			echo '<img src="images/stack/'.$input[0].'.png" class="img" alt="'.$input[0].'">';
			for ($k=1; $k<$i-1; $k++)
				{
					echo '<img src="images/stack/'.$input[$k].'.png" class="img" id="img'.$k.'" alt="'.$input[$k].'">';
				}
			echo '<img src="images/stack/'.$input[$i-1].'.png" class="img, img_last" id="img'.($i-1).'" alt="'.$input[$i-1].'">';
			}
		}	

include ('includes/footer.php');