<script language="javascript">
	var direction = 0;
	var x = 2;
	var y = 0;
	var arrows = ["&#8593;","&#8592;","&#8595;","&#8594;"];

	function set()
	{
		showLocation();
		updatePicture();
	}
	function move(step)
	{
		if (step == 'forward')
		{
			if (direction == 0) y ++;
			else if (direction == 1) x--;
			else if (direction == 2) y --;
			else x++;
		}
		showLocation();
		updatePicture();
		return true;
	}
	function turn(aim)
	{
		if (aim == 'left') direction ++;
		else if (aim == 'right') direction --;
		else if (direction == 0) direction = 2;
		else if (direction == 1) direction = 3;
		else if (direction == 2) direction = 0;
		else direction = 1;
		
		if (direction > 3) direction = 0;
		else if (direction < 0) direction = 3;
		showLocation();
		updatePicture();
		updateCompass();
		return true;
	}
	function showLocation()
	{
		var location; // = arrows[direction]+" "+x+":"+y;
		if (x < 0) location = 'E '+x;
		else if (x > 0) location = 'W '+x;
		else location = 'C';
		if (y < 0) location = location + "<br/>S "+y;
		else if (y > 0) location = location + "<br/>N "+y;
		else location = location + "<br/>&nbsp;"

		document.getElementById('location').innerHTML = location;
		return true;
	}
	function updatePicture()
	{
		document.getElementById('picture').style.backgroundImage = 'url(/view2.php?x='+x+'&y='+y+'&direction='+direction+')';
		return true;
	}
	function updateCompass()
	{
		if (direction == 0) document.getElementById('compass').style.backgroundImage = 'url(/images/North.png)';
		if (direction == 1) document.getElementById('compass').style.backgroundImage = 'url(/images/West.png)';
		if (direction == 2) document.getElementById('compass').style.backgroundImage = 'url(/images/South.png)';
		if (direction == 3) document.getElementById('compass').style.backgroundImage = 'url(/images/East.png)';
	}
</script>
<style>
	body {
		top: 0px;
		left: 0px;
		margin: 0px;
		padding: 0px;
	}
	#background {
		position: relative;
		display: block;
		margin: 0px;
		padding: 10px;
		background-image: url('/images/stonewall.jpg');
		height: 700px;
		width: 1000px;
	}
	#pictureframe {
		display: block;
		position: relative;
		top: 10px;
		left: 10px;
		padding: 5px;
		background: #999999;
		width: 400px;
	}
	#picture {
		position: relative;
		width: 400px;
		height: 400px;
	}
	#location {
		display: block;
		position: relative;
		background-color: white;
		border: 2px solid gray;
		width: 100px;
	}
	.navButton {
		display: block;
		position: relative;
		font-size: 16px;
		font-weight: bold;
	}
	#joystick {
		display: block;
		position: relative;
		width: 160px;
		height: 160px;
		background-image: url('/images/direction.png');
		float: left;
	}
	#compass {
		display: block;
		position: relative;
		width: 160px;
		height: 160px;
		background-image: url('/images/North.png');
		float: left;
		margin: 10px;
	}
	#navigation {
		display: block;
		position: relative;
		margin: 20px;
	}
	a.nav {
		position: absolute;
		display: block;
	}
</style>
<body onload="set()">
<div id="background">
	<form name="interfaceForm">
	<div id="pictureframe">
		<div id="picture"></div>
	</div>
	<div id="navigation">
		<div id="location"></div>
		<div id="joystick">
			<a class="nav" href="javascript:void(0)" onclick="move('forward')" style="top: 0px; left: 55px; width: 50px; height: 55px;"></a>
			<a class="nav" href="javascript:void(0)" onclick="turn('left')" style="top: 55px; left: 0px; width: 55px; height: 50px;"></a>
			<a class="nav" href="javascript:void(0)" onclick="turn('right')" style="top: 55px; left: 105px; width: 55px; height: 50px;"></a>
			<a class="nav" href="javascript:void(0)" onclick="turn('around')" style="top: 90px; left: 55px; width: 50px; height: 65px;"></a>
		</div>
		<div id="compass"></div>
	</div>
</div>
</form>
</div>
</body>