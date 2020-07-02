<?php
	$scale = 400;
	# Map Definition
	$map = array();

	
	$map[0][0][0] = 'gray';
	$map[0][1][0] = 'gray';
	$map[0][2][0] = 'gray';
	$map[0][3][0] = 'gray';
	$map[0][4][0] = 'gray';
	$map[0][5][0] = 'gray';
	$map[0][6][0] = 'gray';
	$map[0][7][0] = 'gray';
	$map[0][8][0] = 'gray';
	$map[0][9][1] = 'gray';
	$map[1][9][1] = 'gray';
	$map[2][9][1] = 'gray';
	$map[3][9][1] = 'gray';
	$map[4][9][1] = 'gray';
	$map[5][9][1] = 'gray';
	$map[6][9][1] = 'gray';
	$map[7][9][1] = 'gray';
	$map[8][9][1] = 'gray';
	$map[9][9][1] = 'gray';
	$map[10][8][0] = 'gray';
	$map[10][7][0] = 'gray';
	$map[10][6][0] = 'gray';
	$map[10][5][0] = 'gray';
	$map[10][4][0] = 'gray';
	$map[10][3][0] = 'gray';
	$map[10][2][0] = 'gray';
	$map[10][1][0] = 'gray';
	$map[10][0][0] = 'gray';
	$map[9][0][1] = 'gray';
	$map[8][0][1] = 'gray';
	$map[7][0][1] = 'gray';
	$map[6][0][1] = 'gray';
	$map[5][0][1] = 'gray';
	$map[4][0][1] = 'gray';
	$map[3][0][1] = 'gray';
	$map[2][0][1] = 'gray';
	$map[1][0][1] = 'gray';
	$map[0][0][1] = 'gray';
	
	$map[1][2][1] = 'red';
	$map[2][2][0] = 'blue';
	$map[2][3][0] = 'blue';
	$map[2][4][0] = 'blue';
	$map[2][5][1] = 'red';
	$map[4][5][1] = 'red';
	$map[5][4][0] = 'white';
	$map[5][3][0] = 'white';
	$map[5][2][0] = 'white';
	$map[5][2][1] = 'red';

	//$map[2][0][1] = 'red';

	# Current Location
	$location_x = $_REQUEST['x'];
	$location_y = $_REQUEST['y'];
	$direction = $_REQUEST['direction'];

	# Initialize Canvas
	$image = imagecreatetruecolor($scale,$scale);

	# Colors
	$bg = imagecolorallocate($image,0,0,0);
	$sky = imagecolorallocate($image,135,206,250);
	$floor = imagecolorallocate($image,139,69,19);
	
	$skycoords = array(
		0,0,
		$scale,0,
		$scale,$scale/2,
		0,$scale/2
	);
	$floorcoords = array(
		0,$scale/2,
		$scale,$scale/2,
		$scale,$scale,
		0,$scale
	);
	imagefilledpolygon($image,$skycoords,4,$sky);
	imagefilledpolygon($image,$floorcoords,4,$floor);

	# Loop Through Possible Locations
	if ($direction == 0)
	{
		for ($y = 6; $y > 0; $y --)
		{
			$posy = $location_y + $y;
			foreach (array(-4,4,-3,3,-2,2,-1,1,0) as $x)
			{
				$posx = $location_x + $x;
				if (isset($map[$posx][$posy][1])) add_wall($image,$x,$y,1,$map[$posx][$posy][1]);
			}
			foreach (array(-4,5,-3,4,-2,3,-1,2,0,1) as $x)
			{
				$posx = $location_x + $x;
				if (isset($map[$posx][$posy - 1][0])) add_wall($image,$x,$y - 1,0,$map[$posx][$posy - 1][0]);
			}
		}
	}
	elseif ($direction == 1)
	{
		for ($x = 5; $x >= 0; $x --)
		{
			$posx = $location_x - $x;
			foreach (array(-4,4,3,3,-2,2,-1,1,0) as $y)
			{
				$posy = $location_y + $y;
				if (isset($map[$posx][$posy][0])) add_wall($image,$y,$x+1,1,$map[$posx][$posy][0]);
			}
			foreach (array(-4,5,-3,4,-2,3,-1,2,0,1) as $y)
			{
				$posy = $location_y + $y;
				if (isset($map[$posx][$posy][1])) add_wall($image,$y,$x,0,$map[$posx][$posy][1]);
			}
		}
	}
	elseif ($direction == 2)
	{
		for ($y = 6; $y >= 0; $y --)
		{
			$posy = $location_y - $y;
			foreach (array(4,-4,3,-3,2,-2,1,-1,0) as $x)
			{
				$posx = $location_x + $x;
				if (isset($map[$posx][$posy][1])) add_wall($image,-$x,$y+1,1,$map[$posx][$posy][1]);
			}
			foreach (array(5,-4,4,-3,3,-2,2,-1,1,0) as $x)
			{
				$posx = $location_x + $x;
				if (isset($map[$posx+1][$posy][0])) add_wall($image,-$x,$y,0,$map[$posx+1][$posy][0]);
			}
		}
	}
	elseif ($direction == 3)
	{
		for ($x = 6; $x >= 0; $x --)
		{
			$posx = $location_x + $x;
			foreach (array(4,-4,3,-3,2,-2,1,-1,0) as $y)
			{
				$posy = $location_y + $y;
				if (isset($map[$posx+1][$posy][0])) add_wall($image,-$y,$x+1,1,$map[$posx+1][$posy][0]);
			}
			foreach (array(5,-4,4,-3,3,-2,2,-1,1,0) as $y)
			{
				$posy = $location_y + $y;
				if (isset($map[$posx][$posy][1])) add_wall($image,1-$y,$x,0,$map[$posx][$posy][1]);
			}
		}
	}

	# Display
	header('Content-type: image/png');
	imagepng($image);
	imagedestroy($image);

	# Draw a wall on the canvas
	function add_wall($image,$x,$y,$z,$wall)
	{
		global $scale;

		$middle = $scale / 2;

		$x1 = $x;
		$y1 = $y;
		if ($z == 1)
		{
			$x2 = $x + 1;
			$y2 = $y;
		}
		else
		{
			$x2 = $x;
			$y2 = $y + 1;
		}

		# Coordinates
		if ($y1 > 0) $zoom1 = $scale/($y1 * 1.5);
		else $zoom1 = $scale;

		if ($y2 > 0) $zoom2 = $scale/($y2 * 1.5);
		else $zoom2 = $scale;

		$x_left = round($middle - $zoom1/2 + $zoom1 * $x1);
		$x_right = round($middle - $zoom2/2 + $zoom2 * $x2);

		$y_top_left = round($middle - ($zoom1/2));
		$y_top_right = round($middle - ($zoom2/2));
		$y_bottom_left = round($middle + ($zoom1/2));
		$y_bottom_right = round($middle + ($zoom2/2));

		error_log("$x_left,$y_top_left\n$x_right,$y_top_right\n$x_right,$y_bottom_right\n$x_left,$y_bottom_left");

		if ($x_left < 0 and $x_right < 0) return 1;
		if ($x_left > $scale and $x_right > $scale) return 1;
		
		# Set Color
		if ($wall == 'red') $fg = imagecolorallocate($image,255,0,0);
		elseif($wall == 'blue') $fg = imagecolorallocate($image,0,0,255);
		elseif($wall == 'green') $fg = imagecolorallocate($image,0,255,0);
		elseif($wall == 'white') $fg = imagecolorallocate($image,255,255,255);
		elseif($wall == 'purple') $fg = imagecolorallocate($image,255,0,255);
		elseif($wall == 'gray') $fg = imagecolorallocate($image,128,128,128);
		elseif($wall == 'black') $fg = imagecolorallocate($image,0,0,0);
		
		$border = imagecolorallocate($image,64,64,64);

		# Scale Values
		$coordinates = array(
			$x_left,$y_top_left,
			$x_right,$y_top_right,
			$x_right,$y_bottom_right,
			$x_left,$y_bottom_left
		);

		if ($wall != 'transparent') imagefilledpolygon($image,$coordinates,4,$fg);
		imagepolygon($image,$coordinates,4,$border);
	}
?>
