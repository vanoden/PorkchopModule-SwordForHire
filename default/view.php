<?php
	$scale = 3;
	# Map Definition
	$map = array();

	$map[0][2][1] = 'wall';
	$map[1][2][0] = 'wall';
	$map[1][3][0] = 'wall';
	$map[1][4][0] = 'wall';
	$map[1][5][1] = 'wall';
	$map[3][5][1] = 'wall';
	$map[4][4][0] = 'wall';
	$map[4][3][0] = 'wall';
	$map[4][2][0] = 'wall';
	$map[4][2][1] = 'wall';
	#$map[2][3][1] = 'wall';

	# Current Location
	$location_x = $_REQUEST['x'];
	$location_y = $_REQUEST['y'];
	$direction = $_REQUEST['direction'];

	# Positions
	$positions = array(
		array(  0, 40, 20, 40, 20, 60,  0, 60),
		array( 80, 40,100, 40,100, 60, 80, 60),
		array( 20, 40, 40, 40, 40, 60, 20, 60),
		array( 60, 40, 80, 40, 80, 60, 60, 60),
		array( 40, 40, 60, 40, 60, 60, 40, 60),

		array( 12.5, 37.5,   20,   40,   20,   60, 12.5, 62.5),
		array(   80,   40,   88, 37.5, 87.5, 62.5,   80,   60),
		array( 37.5, 37.5,   40,   40,   40,   60, 37.5, 62.5),
		array( 62.5,   40, 66.6, 37.5,   67, 62.5, 62.5,   60),

		array(    0, 37.5, 12.5, 37.5, 12.5, 62.5,    0, 62.5),
		array( 87.5, 37.5,  100, 37.5,  100, 62.5, 87.5, 62.5),
		array( 12.5, 37.5, 37.5, 37.5, 37.5, 62.5, 12.5, 62.5),
		array( 62.5, 37.5,   88, 37.5,   88, 62.5, 62.5, 62.5),
		array( 37.5, 37.5, 62.5, 37.5, 62.5, 62.5, 37.5, 62.5),

		array(    0, 33.3, 12.5, 37.5, 12.5, 62.5,    0, 66.6),
		array( 87.5, 37.5,  100, 33.3,  100, 66.6, 87.5, 62.5),
		array( 33.3, 33.3, 37.5, 37.5, 37.5, 62.5, 33.3, 66.6),
		array( 62.5, 37.5, 66.6, 33.3, 66.6, 66.6, 62.5, 62.5),
		
		array(    0, 33.3, 33.3, 33.3, 33.5, 66.6,    0, 66.6),
		array( 66.6, 33.3,  100, 33.3,  100, 66.6, 66.6, 66.6),
		array( 33.3, 33.3, 66.6, 33.3, 66.6, 66.6, 33.3, 66.6),

		array(   25,   25, 33.3, 33.3, 33.3, 66.6,   25,   75),
		array( 66.6, 33.3,   75,   25,   75,   75, 66.6, 66.6),
		
		array(  0, 25, 25, 25, 25, 75,  0, 75),
		array( 75, 25,100, 25,100, 75, 75, 75),
		array( 25, 25, 75, 25, 75, 75, 25, 75),

		array(  0,  0, 25, 25, 25, 75,  0,100),
		array( 75, 75,100,100,100,  0, 75, 25),

		array(  0,  0,  0,100,100,100,100,  0),
	);

	# Initialize Canvas
	$image = imagecreatetruecolor(100*$scale,100*$scale);

	# Colors
	$bg = imagecolorallocate($image,0,0,0);


	# Loop Through Possible Locations
	if ($direction == 0)
	{
		if ($map[$location_x - 2][$location_y + 5][1]) add_wall($image,1);
		if ($map[$location_x + 2][$location_y + 5][1]) add_wall($image,2);
		if ($map[$location_x - 1][$location_y + 5][1]) add_wall($image,3);
		if ($map[$location_x + 1][$location_y + 5][1]) add_wall($image,4);
		if ($map[$location_x + 0][$location_y + 5][1]) add_wall($image,5);

		if ($map[$location_x - 1][$location_y + 4][0]) add_wall($image,6);
		if ($map[$location_x + 2][$location_y + 4][0]) add_wall($image,7);
		if ($map[$location_x + 0][$location_y + 4][0]) add_wall($image,8);
		if ($map[$location_x + 1][$location_y + 4][0]) add_wall($image,9);

		if ($map[$location_x - 2][$location_y + 4][1]) add_wall($image,10);
		if ($map[$location_x + 2][$location_y + 4][1]) add_wall($image,11);
		if ($map[$location_x - 1][$location_y + 4][1]) add_wall($image,12);
		if ($map[$location_x + 1][$location_y + 4][1]) add_wall($image,13);
		if ($map[$location_x + 0][$location_y + 4][1]) add_wall($image,14);

		if ($map[$location_x - 1][$location_y + 3][0]) add_wall($image,15);
		if ($map[$location_x + 2][$location_y + 3][0]) add_wall($image,16);
		if ($map[$location_x + 0][$location_y + 3][0]) add_wall($image,17);
		if ($map[$location_x + 1][$location_y + 3][0]) add_wall($image,18);

		if ($map[$location_x - 1][$location_y + 3][1]) add_wall($image,19);
		if ($map[$location_x + 1][$location_y + 3][1]) add_wall($image,20);
		if ($map[$location_x + 0][$location_y + 3][1]) add_wall($image,21);

		if ($map[$location_x + 0][$location_y + 2][0]) add_wall($image,22);
		if ($map[$location_x + 1][$location_y + 2][0]) add_wall($image,23);

		if ($map[$location_x - 1][$location_y + 2][1]) add_wall($image,24);
		if ($map[$location_x + 1][$location_y + 2][1]) add_wall($image,25);
		if ($map[$location_x + 0][$location_y + 2][1]) add_wall($image,26);

		if ($map[$location_x + 0][$location_y + 1][0]) add_wall($image,27);
		if ($map[$location_x + 1][$location_y + 1][0]) add_wall($image,28);

		if ($map[$location_x + 0][$location_y + 1][1]) add_wall($image,29);
	}
	elseif ($direction == 1)
	{
		if ($map[$location_x - 5][$location_y - 2][0]) add_wall($image,1);
		if ($map[$location_x - 5][$location_y + 2][0]) add_wall($image,2);
		if ($map[$location_x - 5][$location_y - 1][0]) add_wall($image,3);
		if ($map[$location_x - 5][$location_y + 1][0]) add_wall($image,4);
		if ($map[$location_x - 5][$location_y + 0][0]) add_wall($image,5);

		if ($map[$location_x - 5][$location_y - 1][1]) add_wall($image,6);
		if ($map[$location_x - 5][$location_y + 2][1]) add_wall($image,7);
		if ($map[$location_x - 5][$location_y - 0][1]) add_wall($image,8);
		if ($map[$location_x - 5][$location_y + 1][1]) add_wall($image,9);

		if ($map[$location_x - 4][$location_y - 2][0]) add_wall($image,10);
		if ($map[$location_x - 4][$location_y + 2][0]) add_wall($image,11);
		if ($map[$location_x - 4][$location_y - 1][0]) add_wall($image,12);
		if ($map[$location_x - 4][$location_y + 1][0]) add_wall($image,13);
		if ($map[$location_x - 4][$location_y + 0][0]) add_wall($image,14);
		
		if ($map[$location_x - 4][$location_y - 1][1]) add_wall($image,15);
		if ($map[$location_x - 4][$location_y + 2][1]) add_wall($image,16);
		if ($map[$location_x - 4][$location_y - 0][1]) add_wall($image,17);
		if ($map[$location_x - 4][$location_y + 1][1]) add_wall($image,18);

		if ($map[$location_x - 3][$location_y - 1][0]) add_wall($image,19);
		if ($map[$location_x - 3][$location_y + 1][0]) add_wall($image,20);
		if ($map[$location_x - 3][$location_y + 0][0]) add_wall($image,21);

		if ($map[$location_x - 3][$location_y - 0][1]) add_wall($image,22);
		if ($map[$location_x - 3][$location_y + 1][1]) add_wall($image,23);

		if ($map[$location_x - 2][$location_y - 1][0]) add_wall($image,24);
		if ($map[$location_x - 2][$location_y + 1][0]) add_wall($image,25);
		if ($map[$location_x - 2][$location_y + 0][0]) add_wall($image,26);

		if ($map[$location_x - 2][$location_y - 0][1]) add_wall($image,27);
		if ($map[$location_x - 2][$location_y + 1][1]) add_wall($image,28);
		
		if ($map[$location_x - 1][$location_y + 0][0]) add_wall($image,29);
	}
	elseif ($direction == 2)
	{
		if ($map[$location_x - 2][$location_y - 5][1]) add_wall($image,1);
		if ($map[$location_x + 2][$location_y - 5][1]) add_wall($image,2);
		if ($map[$location_x - 1][$location_y - 5][1]) add_wall($image,3);
		if ($map[$location_x + 1][$location_y - 5][1]) add_wall($image,4);
		if ($map[$location_x + 0][$location_y - 5][1]) add_wall($image,5);

		if ($map[$location_x - 1][$location_y - 5][0]) add_wall($image,6);
		if ($map[$location_x + 2][$location_y - 5][0]) add_wall($image,7);
		if ($map[$location_x + 0][$location_y - 5][0]) add_wall($image,8);
		if ($map[$location_x + 1][$location_y - 5][0]) add_wall($image,9);

		if ($map[$location_x - 2][$location_y - 4][1]) add_wall($image,10);
		if ($map[$location_x + 2][$location_y - 4][1]) add_wall($image,11);
		if ($map[$location_x - 1][$location_y - 4][1]) add_wall($image,12);
		if ($map[$location_x + 1][$location_y - 4][1]) add_wall($image,13);
		if ($map[$location_x + 0][$location_y - 4][1]) add_wall($image,14);

		if ($map[$location_x - 1][$location_y - 4][0]) add_wall($image,15);
		if ($map[$location_x + 2][$location_y - 4][0]) add_wall($image,16);
		if ($map[$location_x + 0][$location_y - 4][0]) add_wall($image,17);
		if ($map[$location_x + 1][$location_y - 4][0]) add_wall($image,18);

		if ($map[$location_x - 1][$location_y - 3][1]) add_wall($image,19);
		if ($map[$location_x + 1][$location_y - 3][1]) add_wall($image,20);
		if ($map[$location_x + 0][$location_y - 3][1]) add_wall($image,21);

		if ($map[$location_x + 0][$location_y - 3][0]) add_wall($image,22);
		if ($map[$location_x + 1][$location_y - 3][0]) add_wall($image,23);

		if ($map[$location_x - 1][$location_y - 2][1]) add_wall($image,24);
		if ($map[$location_x + 1][$location_y - 2][1]) add_wall($image,25);
		if ($map[$location_x + 0][$location_y - 2][1]) add_wall($image,26);

		if ($map[$location_x + 0][$location_y - 2][0]) add_wall($image,27);
		if ($map[$location_x + 1][$location_y - 2][0]) add_wall($image,28);

		if ($map[$location_x + 0][$location_y - 1][1]) add_wall($image,29);
	}
	elseif ($direction == 3)
	{
		if ($map[$location_x + 5][$location_y + 2][0]) add_wall($image,1);
		if ($map[$location_x + 5][$location_y - 2][0]) add_wall($image,2);
		if ($map[$location_x + 5][$location_y + 1][0]) add_wall($image,3);
		if ($map[$location_x + 5][$location_y - 1][0]) add_wall($image,4);
		if ($map[$location_x + 5][$location_y + 0][0]) add_wall($image,5);

		if ($map[$location_x + 4][$location_y + 2][1]) add_wall($image,6);
		if ($map[$location_x + 4][$location_y - 1][1]) add_wall($image,7);
		if ($map[$location_x + 4][$location_y + 1][1]) add_wall($image,8);
		if ($map[$location_x + 4][$location_y - 0][1]) add_wall($image,9);

		if ($map[$location_x + 4][$location_y + 2][0]) add_wall($image,10);
		if ($map[$location_x + 4][$location_y - 2][0]) add_wall($image,11);
		if ($map[$location_x + 4][$location_y + 1][0]) add_wall($image,12);
		if ($map[$location_x + 4][$location_y - 1][0]) add_wall($image,13);
		if ($map[$location_x + 4][$location_y + 0][0]) add_wall($image,14);
		
		if ($map[$location_x + 3][$location_y + 2][1]) add_wall($image,15);
		if ($map[$location_x + 3][$location_y - 1][1]) add_wall($image,16);
		if ($map[$location_x + 3][$location_y + 1][1]) add_wall($image,17);
		if ($map[$location_x + 3][$location_y - 0][1]) add_wall($image,18);

		if ($map[$location_x + 3][$location_y + 1][0]) add_wall($image,19);
		if ($map[$location_x + 3][$location_y - 1][0]) add_wall($image,20);
		if ($map[$location_x + 3][$location_y + 0][0]) add_wall($image,21);

		if ($map[$location_x + 2][$location_y + 1][1]) add_wall($image,22);
		if ($map[$location_x + 2][$location_y - 0][1]) add_wall($image,23);

		if ($map[$location_x + 2][$location_y + 1][0]) add_wall($image,24);
		if ($map[$location_x + 2][$location_y - 1][0]) add_wall($image,25);
		if ($map[$location_x + 2][$location_y + 0][0]) add_wall($image,26);

		if ($map[$location_x + 1][$location_y + 1][1]) add_wall($image,27);
		if ($map[$location_x + 1][$location_y - 0][1]) add_wall($image,28);
		
		if ($map[$location_x + 1][$location_y + 0][0]) add_wall($image,29);
	}

	# Display
	header('Content-type: image/png');
	imagepng($image);
	imagedestroy($image);

	# Draw a wall on the canvas
	function add_wall($image,$pos)
	{
		global $scale;
		$pos -= 1;
		error_log("Adding wall for location ".$pos);
		$fg = imagecolorallocate($image,0,0,255);
		
		# Scale Values
		$coordinates = array();
		foreach ($GLOBALS['positions'][$pos] as $value)
		{
			$value = sprintf("%0d",$value * $scale);
			array_push($coordinates,$value);
		}
		imagefilledpolygon($image,$coordinates,4,$fg);
	}
?>
