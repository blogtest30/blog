<?php
function kare($array,$field,$value,$flag=false)
	{
	foreach($array as $v)
		{
		if($v[$field]==$value)
			{
			if(!$flag)
				{
				return $v;
				}
			$c[]=$v;
			}
		}
	return$c;
	}
?>