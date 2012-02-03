<?php
class View
	{
	public function render($view,array$array)
		{
		$this->header();
		require PATH_TO_TEMPLATE."/{$view}.php";
		$this->footer();
		}
	public function header()
		{
		require PATH_TO_TEMPLATE."/header.php";
		}
	public function footer()
		{
		require PATH_TO_TEMPLATE."/footer.php";
		}
	public function kare($array,$field,$value,$flag=false)
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
	}
?>