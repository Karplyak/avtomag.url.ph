<!DOCTYPE html>
<html>
<head>
<style>
table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
    padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>


<?php
$id = intval($_GET['q']);

$servername = "mysql.hostinger.com.ua";//'mysql.hostinger.com.ua', 'u450252009_admin', 'QdMWc5XJGfPg' u450252009_autom
$username = "u450252009_admin";
$password = "QdMWc5XJGfPg";
$dbname = "u450252009_autom";

$con = mysqli_connect('mysql.hostinger.com.ua', 'u450252009_admin', 'QdMWc5XJGfPg', 'u450252009_autom');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}
$query = 'id, name, sec_name,autor, trans FROM db_manga 
left join db_chapter on db_manga.id=db_chapter.id_manga
    right join db_page on db_chapter.id=db_page.id_chapter
     WHERE db_manga.id='.$id.' order by db_page.N_page';
	 
mysqli_select_db($con,"ajax_demo");
$sql="SELECT * FROM db_page where id=".$id;
$result = mysqli_query($con,$sql);

echo "<table>
<tr>
<th>Firstname</th>
<th>Lastname</th>
<th>Age</th>
<th>Hometown</th>
<th>Job</th>
</tr>";
$path='';
while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['id'] . "</td>";
    echo "<td>" . $row['id_chapter'] . "</td>";
    echo "<td>" . $row['N_page'] . "</td>";
    echo "<td>" . $row['path'] . "</td>";
    echo "<td>" . $row['date'] . "</td>";
    echo "</tr>";
	$path=$row['path'];
}
echo "</table>";
mysqli_close($con);
/*
$servername = "127.0.0.1:3306";
$username = "root";
$password = "";
$dbname = "manga";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, name FROM db_page where id=".$id;

/*	id, id_manga, N_chapter, id_lang


$query = 'SELECT id, text, x, y, width, height FROM db_textbox 
left join db_chapter on db_manga.id=db_chapter.id_manga
    right join db_page on db_chapter.id=db_page.id_chapter
     WHERE db_manga.id='.$id.' order by db_page.N_page';

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
	    echo '<select name="users2" onchange="showSlider(this.value)">';
		echo '<option selected disabled value="">Виберіть розділ</option>';
		$id_inst="";
	 while($row = $result->fetch_assoc()) {
     //   echo "id: " . $row["id"]. " - Name: " . $row["sname"]. " " . $row["fname"]. "<br>";
	 echo '<option value='. $row["id"].'>'. $row["name"].'</option> ';
   	}
	echo '</select>';
} else {
	 echo '<select name="users2" onchange="showSlider(this.value)">';
	 echo '<option selected disabled value="">Виберіть розділ</option>';
    echo '</select>';
}
$conn->close();*/

?>

	<h2>AJAX-ZOOM (for developers)<br />tagging images with hotspots, adding title and description;<br />$.fn.axZm.createNewHotspot() API tutorial;</h2>
	
	<table cellspacing="0" cellpadding="0" width="100%"><tr>
		<td style="width: 722px;">
			<p style="margin-top: 0;">Ver. 4.2.1 - the old example got obsolete and has been replaced with a tutorial 
				for developers of how to add "tags" to the images and let the users add title and description. 
			</p>
			
			<p>Click somewhere on the image. A hotspot is created. You can drag & drop it to adjust the position. 
				Click on the hotspot to add / read title and description. 
				You can right click on the hotspot to remove it (can be disabled).
			</p>
		</td>
		<td style="padding-left: 20px; vertical-align: bottom;">
			<h3 style="padding-top: 0;">HTML output console</h3>
		</td>
	</tr></table>
	
	<table cellspacing="0" cellpadding="0" width="100%">
		<tr>
			<td style="width: 722px; vertical-align: top;">
				<!-- Div where AJAX-ZOOM is loaded into -->
				<div id="azParentContainer" style="min-height: 462px; width: 722px;">Loading, please wait...</div>
				
				<!-- Parent container for "mNavi" -->
				<div id="azCustomNavi" class="azCustomNavi" style="width: 722px;"></div>
			</td>
			<td style="padding-left: 20px; vertical-align: top;">
				<!-- "console" to display results which could be saved -->
				<div id="azTaggingResults" class="azTaggingResults">>> HTML console</div>
			</td>
		</tr>
	</table>
	
	
		<script type="text/javascript">
		// Inject any js file
		function loadJS(jsFile){
			var js = document.createElement('script');
			js.setAttribute("type","text/javascript")
			js.setAttribute('src', jsFile);
			document.getElementsByTagName("head")[0].appendChild(js);			
		}
		
		//  Check, if jquery is loaded
		if (typeof jQuery == 'undefined'){
			loadJS('http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js');
		}
	</script>
	
	<style type="text/css" media="screen"> 
	form{
		margin: 0px; 
		padding: 0px;
	}
	
	.txt{
		font-size: 11pt;
		font-family: Tahoma, Arial; 
		background-color: #FCFCEF;
		border: #CCCCCC 1px solid;
		padding: 3px;
	}
	
	textarea{
		font-size: 11pt;
		font-family: Tahoma, Arial; 
		background-color: #FCFCEF;
		border: #CCCCCC 1px solid;
		padding: 3px;
	}
	
	select{
		margin: 0px;
		padding: 0px;
	}
	
	.ttdl{
		padding: 3px 3px 3px 0px;
		border-bottom: 1px solid #CCCCCC;
	}
	
	.ttdr{
		padding: 3px 3px 3px 3px;
		border-bottom: 1px solid #CCCCCC;
	}
	
	.optdl{
		padding: 5px 3px 3px 0px;
		border-bottom: 1px solid #CCCCCC;
		vertical-align: top; 
	}
	
	.optdm{
		padding: 5px 3px 3px 0px;
		border-bottom: 1px solid #CCCCCC;
		vertical-align: top; 
	}

	.gravatar{
		float: left; margin: 3px 10px 1px 0px; width: 64px; height: 64px; border: #000000 1px solid;
	}

	.optdr{
		padding: 5px 3px 3px 3px;
		border-bottom: 1px solid #CCCCCC;
		vertical-align: top; 
	}
	
	.opt{
		padding: 3px 0px 3px 0px;
		vertical-align: top; 
	}
	
	.optcr{
		padding: 4px 0px 0px 0px;
		vertical-align: top; 
	}

	.rowBox{
		clear: both; 
		float: left;
		font-size: 2px;
		line-height: 5px;
	}
	
	.rowBox-top-left {
		margin-right: 5px;
		background-image: url('/pic/layout/comments.jpg'); 
		height: 5px;
		line-height: 5px;
		font-size: 2px;
	}
	
	.rowBox-top-right {
		margin-top: -5px;
		margin-left: 5px;
		background-image: url('/pic/layout/comments.jpg'); 
		background-position: 100% 0;
		height: 5px; 
		line-height: 5px;
		font-size: 2px;
	}
	
	.rowBox-bottom-left {
		margin-right: 5px;
		background-image: url('/pic/layout/comments.jpg'); 
		background-position: 0 -5px;
		height: 5px;
		line-height: 5px;
		font-size: 2px;
	}
	
	.rowBox-bottom-right {
		margin-top: -5px;
		margin-left: 5px;
		background-image: url('/pic/layout/comments.jpg'); 
		background-position: 100% -5px;
		height: 5px; 
		line-height: 5px;
		font-size: 2px; 
	}
	.row { 
		clear: both; 
		overflow: hidden; 
		padding: 5px 5px 5px 5px;
		border: #AAAAAA 1px solid;
		background-color: #FDFDFD;
		border-radius: 5px;
	}
	
	.rowName {
		float: left;
	}
	
	.rowTime {
		float: right;
	}
	
	.comment { 
		clear: both; 
		color: #000000; 
		padding-top: 10px;
	}
	#comments{
		 
	}
	
	#commentText{
		width: 100%;
		height: 150px;
		padding: 3px;
	    box-sizing: border-box;
	    -moz-box-sizing: border-box;
	    -webkit-box-sizing: border-box;
	}
	</style>
	
	
	

<script type="text/javascript">
	// some var to hold everyting else
	window.ajaxZoom = {};

	// the ID of the div element where ajax-zoom has to be inserted into
	ajaxZoom.divID = "azParentContainer";	
	
	// path to the axZm folder
	ajaxZoom.path = "../axZm/"; 
	
	// zoomData - defines which image should be loaded
	ajaxZoom.parameter = "<?php echo $path; ?>";
	
	// example - defines which "options set" is taken
	// options in /axZm/zoomConfig.inc.php are overriden in /axZm/zoomConfigCustom.inc.php  
	// after elseif ($_GET['example'] == 'tagging'){
	ajaxZoom.parameter += "&example=tagging";
	
	// Local time ahead server time (PHP solution), not needed, you can set timeDiff to 0
	ajaxZoom.timeDiff = (new Date()).getTime() - 1463509027466;
	
	// switch for tagging mode
	ajaxZoom.taggingMode = true;
	
	// some var where we will store user defined title and description
	ajaxZoom.myTags = {};
	
	// define some text strings
	ajaxZoom.taggingTxt = {
		"msg": "&raquo; click somewhere to place a hotspot; right-click to remove",
		"disable": "Disable tagging mode",
		"enable": "Enable tagging mode",
		"title": "Title",
		"description": "Description",
		"confirmDelete": "Really delete?",
		"notes": "Notes",
		"noDescr": "No notes left"
	};

	// add tagging message and manage other tasks when tagging mode is enabled
	ajaxZoom.setTaggingMsg = function(){
		// append tagging message 
		if (!$("#azTaggingMsg").length){
			$("<div />").attr("id", "azTaggingMsg").addClass("azTaggingMsg")
			.html(ajaxZoom.taggingTxt.msg)
			.appendTo("#axZm_zoomLayer");
		}else{
			$("#azTaggingMsg").css("display", "block");
		}
		
		// change cursor
		$("#axZm_zoomLayerImg").addClass("azTagging");
		
		// change src and description of the custom button which changes states
		$("#customBtn_mCustomBtn1")
		.data("btnSrc", $.axZm.icon + $.axZm.buttonSet + "/button_iPad_tag_switched.png")
		.data("bAlt", ajaxZoom.taggingTxt.disable)
		.attr("src", $.axZm.icon + $.axZm.buttonSet + "/button_iPad_tag_switched.png");
		
		// make hotspots draggable
		$.fn.axZm.hotspotsDraggable();
	};
	
	// hide tagging message and manage other tasks when tagging mode is disabled
	ajaxZoom.removeTaggingMsg = function(){
		// hide tagging message
		$("#azTaggingMsg").css("display", "none");
		
		// remove class which changed the cursor
		$("#axZm_zoomLayerImg").removeClass("azTagging");
		
		// change src and description of the custom button which changes states
		$("#customBtn_mCustomBtn1")
		.data("btnSrc", $.axZm.icon + $.axZm.buttonSet + "/button_iPad_tag.png")
		.data("bAlt", ajaxZoom.taggingTxt.enable)
		.attr("src", $.axZm.icon + $.axZm.buttonSet + "/button_iPad_tag.png");
		
		// make hotspots not traggable any more
		$.fn.axZm.hotspotsDraggable(true);
		
		// close all opened tooltips
		$.fn.axZm.removeAllToolTips();
	};
	
	// function which will be executed in onZoomInClickStart AJAX-ZOOM callback
	// important is that when you do not want AJAX-ZOOM to zoom, this function should return false;
	ajaxZoom.evaluateClick = function(info){
		// do not do anything if ajaxZoom.taggingMode (a switch var) is false
		if (!ajaxZoom.taggingMode){return;}
		
		// position of the click related to its original size
		var xClick = info.viewport.x;
		var yClick = info.viewport.y;
		
		// file (image) name
		var currentImageName = $.axZm.zoomGA[$.axZm.zoomID].img;
		
		// position of the hotspot in this file
		// there could be same hotspot on an image in the gallery, 
		// this is why we need image name here and it is defined this way
		var posObj = {}; posObj[currentImageName] = {left: xClick, top: yClick};
		
		// show hotspots in case they are disabled
		$.fn.axZm.showHotspotLayer();
		
		// after we know the position create hotspot "on-the-fly"
		$.fn.axZm.createNewHotspot({
			// generate some image name 
			// image name could contain the creation date and time
			// you might also want to get it from server before creating hotspot 
			// or calculate the difference between server time and client time as it is done here
			// prepend the hotspot name with some random string anyway
			name: Math.random().toString(36).substring(2) + "_" + ((new Date()).getTime() - ajaxZoom.timeDiff), 
			autoTitle: false, // we do not want alt title to be like hotspot name
			autoPos: false, // we know at wich positions to put hotspot at (posObj)
			noInit: false, // we want that the hotspot is added right away
			draggable: true, // and it should be draggable
			noRightClickRemove: false, // could be removed with right mouse click
			posObj: posObj, // our coordinates
			settings: {
				shape: "point", // shape is point (not rect)
				altTitle: false, // mouseover title is disabled
				labelGravity: "bottom", // position of the title shown as label
				labelOffsetY: -2, // vertical offset of the label
				hotspotImage: "hotspot64_map_red.png", // default image from /axZm/icons
				gravity: "top", // important - display hotspot image above the click point
				width: 32, // width of the icon
				height: 32, // height of the icon
				
				/* tooltip settings */
				toolTipWidth: 300, // width of the tooltip
				toolTipHeight: 120, // min-height of the tooltip
				toolTipGravity: "left", // show tooltip left to the hotspot
				toolTipAutoFlip: true, // but also right depending on position
				toolTipAdjustX: 25, // horizontal space between hotspot and toolTip
				toolTipCloseIcon: "close_blue_16.png", // close button icon from /axZm/icons
				toolTipCloseIconOffset: {right: 5, top: 5}, // position of the close button
				toolTipOverlayShow: false, // do not show overlayes
				
				// toolTipTitle can be also a JS function 
				toolTipTitle: ajaxZoom.toolTipTitle,
				
				// toolTipHtml can be also a JS function which returns something
				toolTipHtml: ajaxZoom.toolTipHtml
			},
			// callback after hotspot is added
			callback: function(info){
				// we have created the hotspot so update ajaxZoom.myTags
				ajaxZoom.myTags[info.name] = {};
				
				// save / update console
				ajaxZoom.updateConsole();
				
				// trigger tooltip after it has been added
				// if you remove the line below the user would need to extra click on the hotspot
				$("#axZmHotspot_"+info.name).trigger("click");
			}
		});
		
		// important to return false; otherwise AJAX-ZOOM will zoom
		return false; 
	};
	
	// delete hotspot wrapper
	ajaxZoom.deleteHotspot = function(name){
		// ask if the user wants to delete the hotspot
		var sureDelete = window.confirm(ajaxZoom.taggingTxt.confirmDelete);
		if (sureDelete){
			// delete hotspot
			$.fn.axZm.deleteHotspot(name);
			
			// close all tooltips
			$.fn.axZm.removeAllToolTips();
		}
	};
	
	// title which is shown in the popup when the user clicks on the hotspot
	ajaxZoom.toolTipTitle = function(info){
		// we simply return a string but it could be extended
		return ajaxZoom.taggingTxt.notes;
	};
	
	// html which is shown in the popup when the user clicks on the hotspot
	ajaxZoom.toolTipHtml = function(info){
		// get already prsent information sored in ajaxZoom.myTags
		var myTags = ajaxZoom.myTags[info.name] || {},
			ret = ""; // empty string
		
		// if tagging mode return form fields
		if (ajaxZoom.taggingMode){
			// simple form
			ret = "<div>";
				// title
				ret += "<input type=\"text\" id=\"azTextField\" class=\"azTextField\" value=\"" + (info.labelTitle || ajaxZoom.taggingTxt.title) + "\">";
				
				// description
				ret += "<textarea id=\"azTextArea\" class=\"azTextArea\">" + (myTags.descr || ajaxZoom.taggingTxt.description) + "</textarea>";
				
				// name of the hotspot
				ret += "<input id=\"azTextHotspotName\" type=\"hidden\" value=\"" +info.name + "\">";
				
				// save and delete buttons
				ret += "<div style=\"text-align: right\">";
					ret += "<input type=\"button\" class=\"azButton\" value=\"Delete\" onclick=\"ajaxZoom.deleteHotspot('" + info.name + "');\">";
					ret += "<input type=\"button\" class=\"azButton\" value=\"Save\" onclick=\"ajaxZoom.saveInfo()\">";
				ret += "</div>";
			ret += "</div>";
			
			setTimeout(function(){
				// Prevent bubbling when clicked on the textarea
				$("#azTextArea, #azTextField").on("mousedown touchstart", function(e){e.stopPropagation();});
				
				// Show names of the form fields within formfields and remove them on focus
				$("#azTextField").on("focus", function(e){
					if ($(this).val() == ajaxZoom.taggingTxt.title){$(this).val("");}
				}).on("blur", function(e){
					if ($(this).val() == ""){$(this).val(ajaxZoom.taggingTxt.title);}
				});
				
				$("#azTextArea").on("focus", function(e){
					if ($(this).val() == ajaxZoom.taggingTxt.description){$(this).val("");}
				}).on("blur", function(e){
					if ($(this).val() == ""){$(this).val(ajaxZoom.taggingTxt.description);}
				});
			}, 100);
		} 
		// return when tagging mode is disabled
		else {
			// Calculate time from hotspot name (if not changed)
			var time = info.name.split("_")[1];
			
			// Date from Unix timestamp
			var date = new Date(parseInt(time));
			
			// Return what is stored in ajaxZoom.myTags.descr
			ret = "<div class='azTextArea'>"+(myTags.descr || ajaxZoom.taggingTxt.noDescr)+"</div>\
			Created: " + date + "\
			";
		}
		
		return ret;
	};
	
	// store description and title under ajaxZoom.myTags 
	ajaxZoom.saveInfo = function(){
		// read values from formfields 
		var name = $("#azTextHotspotName").val();
		var title = $("#azTextField").val();
		var descr = $("#azTextArea").val();
		
		// calculate date and time
		var time = (new Date()).getTime() - ajaxZoom.timeDiff;
		
		// create new / emtty object under ajaxZoom.myTags
		ajaxZoom.myTags[name] = {};
		
		// store description from formfields
		if (descr != ajaxZoom.taggingTxt.description){
			ajaxZoom.myTags[name].descr = descr;
			ajaxZoom.myTags[name].lastChanged = time;
		}
		
		// store title from formfields
		if (title != ajaxZoom.taggingTxt.title){
			ajaxZoom.myTags[name].title = title;
			ajaxZoom.myTags[name].lastChanged = time;
			
			// Update label title
			$.axZm.hotspots[name].labelTitle = title;
			
			// Redraw hotspot with $.fn.axZm.initHotspots and make them draggable again
			$.fn.axZm.initHotspots(null, $.fn.axZm.hotspotsDraggable);
		}
		
		// close tooltip
		$.fn.axZm.removeAllToolTips();
		
		// save / update console
		ajaxZoom.updateConsole();
	};
	
	// save / update console function 
	// this is the function which you would need to extend
	ajaxZoom.updateConsole = function(){
		var json = {};
		
		// eterate over ajaxZoom.myTags and gather information you would like to store
		$.each(ajaxZoom.myTags, function(name, obj){
			if ($.axZm.hotspots[name] 
				&& $.axZm.hotspots[name]["position"] 
				&& !$.isEmptyObject($.axZm.hotspots[name]["position"])){
				json[name] = {
					title: obj.title,
					descr: obj.descr,
					timestamp: obj.lastChanged,
					position: $.fn.axZm.convertHotspotPositionToPx($.axZm.hotspots[name]["position"][$.axZm.zoomID])
				};
			}
		});
		
		// here we simply visually show that created json without any other action
		$("#azTaggingResults").html("<pre class='azPre'>" + JSON.stringify(json, null, "\t")+"</pre>");
		
		// todo: for example save it to session and restore when loaded	
	};

	// AJAX-ZOOM callbacks
	ajaxZoom.opt = {
		// some (not all) options from /axZm/zoomConfig.inc.php and 
		// from /axZm/zoomConfigCustom.inc.php 
		// could be set in this "onBeforeStart" callback
		onBeforeStart: function(){
			// Remove hotspot entirely when right clicked on it
			// normally it is only disabled on the current image
			$.axZm.hsRightClickDel = true;
			
			// Do not zoom out at 100% on click
			$.axZm.zoomOutClick = false;
			
			// enable and configure the "mNavi" option
			// which is the toolbar below the player or in the player
			$.axZm.mNavi.enabled = true; // enable it
			$.axZm.mNavi.parentID = "azCustomNavi"; // set ID where it has to be appended to
			$.axZm.mNavi.buttonDescr = true; // enable description of the buttons
			$.axZm.mNavi.alt.enabled = false; // disable description simmilar to alt
			$.axZm.mNavi.fullScreenShow = true; // also show "mNavi" at fullscreen mode
			$.axZm.mNavi.offsetVertFS = 10; // vertical offset of mNavi at fullscreen mode
			
			// this is a list of buttons which we want to show in the toolbar
			// number value is margin to the next button
			$.axZm.mNavi.order = {
				mZoomOut: 5, // zoom out button
				mZoomIn: 20, // zoom in button
				mReset: 20, // reset button
				mPan: 5, // pan mode button
				mCrop: 20, // crop mode button
				mHotspots: 5, // show / hide hotspots button
				mCustomBtn1: 0 // our "whatever" button
			};
			
			// there can be as many "whatever" (custom) buttons as you want
			// call them mCustomBtn1, mCustomBtn2, ...
			
			// now we define how this mCustomBtn1 should look like
			$.axZm.icons.mCustomBtn1 = {file: $.axZm.buttonSet + "/button_iPad_tag", ext: "png", w: 50, h: 50};
			
			// and the title of mCustomBtn1
			$.axZm.mapButTitle.customBtn1 = ajaxZoom.taggingTxt.disable; // description of the button
			
			// attach a JS function to the mCustomBtn1
			$.axZm.mNavi.mCustomBtn1 = function(){
				// when tagging mode is already on, disable it
				if (ajaxZoom.taggingMode == true){
					// Update state of the tagging mode
					ajaxZoom.taggingMode = false;
					
					// Do other things
					ajaxZoom.removeTaggingMsg();
				}
				// enable tagging mode
				else {
					// Update state of the tagging mode
					ajaxZoom.taggingMode = true;
					
					// Do other things
					ajaxZoom.setTaggingMsg();
				}
			};

		},
		
		// when image loads
		onLoad: function(){
			// Add message that tagging mode is activated and activate it
			ajaxZoom.setTaggingMsg();
		},
		
		// callback executed on any hotspot deletion over API
		onHotspotDelete: function(name){
			// Save / update console
			ajaxZoom.updateConsole();
		},
		
		// callback triggered after hotspot is moved
		onHotspotsDragEnd: function(){
			// Save / update console
			ajaxZoom.updateConsole();
		},
		
		// callback triggered when the user clicks on the image
		onZoomInClickStart: function(info){
			return ajaxZoom.evaluateClick(info);
		}
	};
	
	// load AJAX-ZOOM not responsive
	$(document).ready(function(){
		$.fn.axZm.load({
			opt: ajaxZoom.opt,
			path: ajaxZoom.path,
			parameter: ajaxZoom.parameter,
			divID: ajaxZoom.divID
		});
	});
	
	// open AJAX-ZOOM responsive
	// Documentation - http://www.ajax-zoom.com/index.php?cid=docs#api_openFullScreen
	/*
	$.fn.axZm.openFullScreen(
		ajaxZoom.path, // Absolute path to AJAX-ZOOM directory, e.g. '/axZm/'
		ajaxZoom.parameter, // Defines which images and which options set to load
		ajaxZoom.opt, // callbacks
		ajaxZoom.divID, // target - container ID (default 'window' - fullscreen)
		false, // apiFullscreen- use browser fullscreen mode if available
		true, // disableEsc - prevent closing with Esc key
		false // postMode - use POST instead of GET
	);
	*/

</script>



</body>
</html>