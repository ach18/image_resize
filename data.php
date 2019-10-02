<?php
require_once(__DIR__ . "/resize.php");
$file = __DIR__ . "/status.txt";
$end = false;
set_time_limit(0);
while(!$end)
{
	if(!is_banner_exist())
	{
		$fd = fopen($file, 'r');
		$s = fread($fd, filesize($file));
		fclose($fd);
		if($s == '0')
		{
			$fd = fopen($file, 'w');
			ftruncate($fd, 0);
			fwrite($fd, '1');
			fclose($fd);
			imagick_resize_png('img/image.png', 200, 100);
		}
	}
	else
	{
		$fd = fopen($file, 'r');
		$s = fread($fd, filesize($file));
		fclose($fd);
		if($s == '1')
		{
			$fd = fopen($file, 'w');
			ftruncate($fd, 0);
			fwrite($fd, '0');
			fclose($fd);
		}
		
		$end = true;
		header('HTTP/1.1 200 OK', true, 200);
		exit('Success');
	}
}