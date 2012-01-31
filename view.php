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
		header("Content-type:text/html; charset=utf-8");
		require PATH_TO_TEMPLATE."/header.php";
		}
	public function footer()
		{
		require PATH_TO_TEMPLATE."/footer.php";
		}
	}
?>