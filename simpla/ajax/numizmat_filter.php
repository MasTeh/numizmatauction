<?php

function num_filter($source_file, $save_path, $params = array('small_image_width' => 300, 'crop_padding' => 1, 'smothing_force' => 20, 'linear'=>2))
{

	$linear_file = '../files/watermark/linear.png';
	if ($params['linear']==2) $linear_file = '../files/watermark/linear2.png';
	$watermark_file = '../files/watermark/watermark.png';
	$size = getimagesize($source_file);
	$image = imagecreatefromjpeg($source_file);

	$rsz_img = imagecreatetruecolor($size[0]*0.8, $size[1]*0.8);

	imagecopyresampled($rsz_img, $image, 0,0,$size[0]*0.1,$size[1]*0.1,$size[0]*0.8,$size[1]*0.8,$size[0]*0.8,$size[1]*0.8);

	$image = $rszed_img;

	$size[0] = $size[0]*0.8;
	$size[1] = $size[1]*0.8;

	$k = $params['small_image_width']/$size[0];

	$small_width = $params['small_image_width'];
	$small_height = intval($size[1]*$k);

	$small_image = imagecreatetruecolor($params['small_image_width'], intval($size[1]*$k));

	imagecopyresampled($small_image, $image, 0, 0, 0, 0, $small_width, $small_height, $size[0], $size[1]);

	for ($i=0; $i <= $params['smothing_force']; $i++) imagefilter($small_image, IMG_FILTER_SMOOTH, 0);

	imagefilter($small_image, IMG_FILTER_PIXELATE, 10);
	imagefilter($small_image, IMG_FILTER_BRIGHTNESS, -100);
	

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

	//header('Content-Type: image/jpeg'); imagejpeg($small_image); die();

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
	$crop_x1 = ($left_x*$k2) - $padding_interval*2;
	$crop_y1 = ($top_y*$k2) - $padding_interval*2;

	$cropped_image = imagecreatetruecolor($crop_width, $crop_height);

	imagecopyresampled($cropped_image, $image, 0, 0, $crop_x1, $crop_y1, $crop_width, $crop_height, $crop_width, $crop_height);

	$linear_size = getimagesize($linear_file);
	$linear = imagecreatefrompng($linear_file);

	$watermark = imagecreatefrompng($watermark_file);
	$watermark_size = getimagesize($watermark_file);

	imagecopy($cropped_image, $linear, 0, -4, 0, 0, $linear_size[0], $linear_size[1]);	
	imagecopy($cropped_image, $watermark, $crop_width-$watermark_size[0]-10, $crop_height-$watermark_size[1]-10, 0, 0, $watermark_size[0], $watermark_size[1]);	

	imagejpeg($cropped_image, $save_path);

	imagedestroy($small_image);
	imagedestroy($image);

}




$time_start = microtime(true);


num_filter('../../test6.jpg', '../../test_result.jpg');


$time_end = microtime(true);
$exec_time = $time_end-$time_start;

echo '<img style="border:3px solid" src="../../test_result.jpg" /><br><br>';
echo $exec_time;
echo '<br><br>'.intval(memory_get_usage()/1048576).'Mb';