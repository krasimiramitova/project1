<?php
include ('includes/header.php');

include ('includes/file.php');

$input=$_POST['string'];
$result=is_Stebins($input);
$i=$result[0];
$flag=$result[1];

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
			echo '<div class="answer">to '.$i.' </div>';
			}
		}	

include ('includes/footer.php');