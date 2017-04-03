<?php 


if (! function_exists('theme')) {
	function theme($path)
	{
		return Theme::url($path);
	}
}