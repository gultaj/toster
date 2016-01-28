<?php 


if (! function_exists('theme')) {
	function theme($path)
	{
		// dd(app('request')->segment(1));
		$config = app('request')->segment(1) == 'admin' ? app('config')->get('theme.admin') : app('config')->get('theme');

		return url($config['folder'] . '/' . $config['active'] . '/assets/' . $path);
	}
}