<?php
function is_banner_exist() : bool
{
	return !empty(glob("img/banner.png"));
}

function imagick_resize_png($infile, $neww, $newh)
{
	$image = new \Imagick($infile);
	$image->scaleImage($neww, $newh);
	file_put_contents('img/banner.png', $image);
}