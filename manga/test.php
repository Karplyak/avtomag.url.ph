<!-- Add your HTML Here  -->
<!DOCTYPE html>
<html>
	<head>
		<meta name="author" content=" ">
		<meta name="designer" content=" ">
		<meta name="generator" content=" ">
		<title>Test title</title>
		<meta name="description" content="">
		<meta name="abstract" content="">
		<meta name="keywords" content="">
		<!--[if ie]><![endif]-->
		<!--[if lte IE 8]>
			<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
			<style type="text/css">
				img{-ms-interpolation-mode: bicubic}
			</style>
		<![endif]-->
		<link rel="shortcut icon" href="./pic/favicon.ico">
		<!--<link rel="stylesheet" href="./layout/main.css" charset="utf-8" media="all">-->
		<meta name="language" content="it">
		
		<!-- jQuery core, needed! -->
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
		<!-- AJAX-ZOOM core, needed! -->
		<link href="../axZm/axZm.css" type="text/css" rel="stylesheet" />
		<script type="text/javascript" src="../axZm/jquery.axZm.js"></script>

		<!-- js for subfolders -->
		<link rel="stylesheet" href="../axZm/plugins/demo/lavalamp/lavalamp_test.css" type="text/css" media="screen">
		<script type="text/javascript" src="../axZm/plugins/demo/lavalamp/jquery.lavalamp.js"></script>
		<!-- js for this example (example4.php) -->
		<script type="text/javascript" src="../axZm/extensions/axZmExamples/jquery.axZm.azExample4.js"></script>

	</head>

		<body style="width:100%; height:100%;">
  
		<div style="width:500px; float:initial; margin: 0 auto;">
		
		
		
		<!-- Container where AJAX-ZOOM will be loaded into -->
		<div id="axZmPlayerContainer" style="min-height: 448px;">
			Loading, please wait...
		</div>

		<!-- Container for folders menu -->
		<div id="lavaLampContainer" style="height: 28px; overflow: hidden; margin-top: 5px;">
		Loading...
		</div>

	<script type="text/javascript">

		jQuery.azExample4({
			axZmPath: "auto", // Path to /axZm directory, e.g. /test/axZm/
			zoomDir: "/manga/pic/school_hero", // Path to subfolders with images
			divID: "axZmPlayerContainer", // ID of the main container
			menuDivID: "lavaLampContainer", // ID of the menu container
			firstFolder: 1, // index or name of the folder to be loaded at first
			firstImage: 1, // index or name of the image to load from firstFolder
			example: 8, // configuration set value which is passed to ajax-zoom
			axZmCallBacks: {}, // AJAX-ZOOM has several callbacks
			fullScreenApi: true // try to open AJAX-ZOOM at browsers fullscreen mode
		});
	</script>

	
		</div>
</body>
</html>