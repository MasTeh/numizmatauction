<?php


$linear_file = '../../linear.png';

function num_filter($source_file, $save_path, $params = array('small_image_width' => 300, 'crop_padding' => 1.5, 'smothing_force' => 10))
{

	$size = getimagesize($source_file);
	$image = imagecreatefromjpeg($source_file);


	$k = $params['small_image_width']/$size[0];

	$small_width = $params['small_image_width'];
	$small_height = intval($size[1]*$k);

	$small_image = imagecreatetruecolor($params['small_image_width'], intval($size[1]*$k));

	imagecopyresampled($small_image, $image, 0, 0, 0, 0, $small_width, $small_height, $size[0], $size[1]);

	for ($i=0; $i <= $params['smothing_force']; $i++) imagefilter($small_image, IMG_FILTER_SMOOTH, 0);

	for ($x = 0; $x < $small_width; $x++) {
		for ($y = 0; $y < $small_height; $y++) {
		 $colors=imagecolorsforindex($small_image, imagecolorat($small_image, $x,$y));
		 $r=$colors['red'];
		 $g=$colors['green'];
		 $b=$colors['blue'];
		 $random = $r + $g + $b;
		 if ($random > (((255 + 20) / 2) * 3)) {
		  $r = 255;
		  $g = 255;
		  $b = 255; }
		 else {
		  $r = 0;
		  $g = 0;
		  $b = 0; }
		 $color = imagecolorallocate($small_image, $r,$g,$b);
		 imagesetpixel($small_image, $x, $y, $color);
		}
	}  

	$top_y = 0;
	$bottom_y = 0;
	$left_x = 0;
	$right_x = 0;

	for ($y = 0; $y < $small_height && $top_y==0; $y++) {
		for ($x = 0; $x < $small_width && $top_y==0; $x++) {
			$colors=imagecolorsforindex($small_image, imagecolorat($small_image, $x,$y));
			if ($colors['red']==0 && $colors['green']==0 && $colors['blue']==0)
				$top_y = $y;
		}
	}

	for ($y = $small_height-2; $y > 0 && $bottom_y==0; $y--) {
		for ($x = 0; $x < $small_width && $bottom_y==0; $x++) {
			$colors=imagecolorsforindex($small_image, imagecolorat($small_image, $x,$y));
			if ($colors['red']==0 && $colors['green']==0 && $colors['blue']==0)
				$bottom_y = $y;
		}
	}

	for ($x = 0; $x < $small_width && $left_x==0; $x++) {
		for ($y = 0; $y < $small_height && $left_x==0; $y++) {
			$colors=imagecolorsforindex($small_image, imagecolorat($small_image, $x,$y));
			if ($colors['red']==0 && $colors['green']==0 && $colors['blue']==0)
				$left_x = $x;
		}
	}

	for ($x = $small_width-2; $x > 0 && $right_x==0; $x--) {
		for ($y = 0; $y < $small_height && $right_x==0; $y++) {
			$colors=imagecolorsforindex($small_image, imagecolorat($small_image, $x,$y));
			if ($colors['red']==0 && $colors['green']==0 && $colors['blue']==0)
				$right_x = $x;
		}
	}

	$k2 = 1/$k;

	$padding_interval = intval($size[0]*($params['crop_padding']/100));
	$crop_width = intval(($right_x - $left_x)*$k2) + $padding_interval*2;
	$crop_height = intval(($bottom_y - $top_y)*$k2) + $padding_interval*2;
	$crop_x1 = ($left_x*$k2) - $padding_interval;
	$crop_y1 = ($top_y*$k2) - $padding_interval;

	$cropped_image = imagecreatetruecolor($crop_width, $crop_height);
	imagecopyresampled($cropped_image, $image, 0, 0, $crop_x1, $crop_y1, $crop_width, $crop_height, $crop_width, $crop_height);

	imagejpeg($cropped_image, $save_path);


}




$time_start = microtime(true);

$root = 'Z:/home/numizmat/www';


$images_dir = $root.'/files/_new';
$images = scandir($images_dir);
unset($images[0]); unset($images[1]);

//echo "<pre>"; print_r($images); die();

$count = count($images);
foreach ($images as $i) {
	num_filter($images_dir.'/'.$i, $images_dir.'/filtered/'.$i);
	$count--;
	echo $count.' - '.$i.PHP_EOL;
}
