<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:og="http://opengraphprotocol.org/schema/">
<head>
<title>AJAX-ZOOM image tagging with hotspots</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="imagetoolbar" content="no">

<meta property="og:type" content="article"/>
<meta property="og:title" content="AJAX-ZOOM image tagging with hotspots"/>
<meta property="og:description" content="Tag images with hotspots, title and descriptions"/>
<meta name="description" content="Tag images with hotspots, title and descriptions." />
<meta property="og:image" content="http://www.ajax-zoom.com/pic/layout/image-zoom_12.jpg"/>



	<meta name="viewport" content="width=device-width,  minimum-scale=1, maximum-scale=1, user-scalable=no">

<!-- Include jQuery core into head section if not already present -->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>

<!-- JSON -->
<script type="text/javascript" src="../axZm/plugins/JSON/jquery.json-2.3.min.js"></script>

<!--  AJAX-ZOOM javascript -->
<script type="text/javascript" src="../axZm/jquery.axZm.js"></script>
<link type="text/css" href="../axZm/axZm.css" rel="stylesheet" />
<script type="text/javascript" src="../axZm/plugins/jCrop/js/jquery.Jcrop.js"></script>
<script type="text/javascript" src="../axZm/extensions/axZmThumbSlider/lib/jquery.mousewheel.min.js"></script>
<link type="text/css" href="../axZm/plugins/jCrop/css/jquery.Jcrop.css" rel="stylesheet">
<link href="../axZm/plugins/demo/jquery.fancybox/jquery.fancybox-1.3.4.zIndex.css" type="text/css" media="screen" rel="stylesheet">
<script type="text/javascript" src="../axZm/extensions/axZmThumbSlider/lib/jquery.axZm.thumbSlider.js"></script>

<script type="text/javascript" src="../axZm/extensions/jquery.axZm.imageCropEditor2.js"></script>
<link rel="stylesheet" type="text/css" href="../axZm/extensions/jquery.axZm.imageCropEditor.css">
<script type="text/javascript" src="../axZm/plugins/jquery.ui/js/jquery-ui-1.8.24.custom.min.js"></script>
<!--
<script type="text/javascript" src="../axZm/extensions/jquery.axZm.expButton.js"></script>
<script type="text/javascript" src="../axZm/plugins/js-beautify/beautify-all.min.js"></script>
<script type="text/javascript" src="../axZm/plugins/jquery.scrollTo.min.js"></script>

<script type="text/javascript" src="../axZm/plugins/CLEditor/jquery.cleditor.min.js"></script>
<script type="text/javascript" src="../axZm/plugins/CLEditor/jquery.cleditor.table.min.js"></script>
<script type="text/javascript" src="../axZm/plugins/demo/syntaxhighlighter/src/shCore.js"></script>
<script type="text/javascript" src="../axZm/plugins/demo/syntaxhighlighter/scripts/shBrushJScript.js"></script>
<script type="text/javascript" src="../axZm/plugins/demo/syntaxhighlighter/scripts/shBrushPhp.js"></script>
<script type="text/javascript" src="../axZm/plugins/demo/syntaxhighlighter/scripts/shBrushCss.js"></script>
<script type="text/javascript" src="../axZm/plugins/demo/syntaxhighlighter/scripts/shBrushXml.js"></script>
<script type="text/javascript" src="/axZm/plugins/jquery.requestAnimationFrame.min.js"></script>
 -->

<style type="text/css" media="screen"> 
	html {font-family: Tahoma, Arial; font-size: 10pt;}
	a {color: blue; outline: 0; outline-style: none; text-decoration: none;} a:visited {color: blue;} a:hover {color: green;}
	h2 {padding:0px; margin: 35px 0px 15px 0px; font-size: 22px;}
	h3 {font-family: Arial; color: #1A4A7A; font-size: 18px; padding: 20px 0px 3px 0px; margin: 0;}
	p {text-align: justify; text-justify: newspaper;}
	
	/* cursor in tagging mode */
	.azTagging {cursor: crosshair !important;}
	
	/* title textfield */
	.azTextField {width: 100%; margin-bottom: 5px; box-sizing: border-box !important; padding: 5px; font-family: arial; font-size: 12px; border: 1px solid #999999; border-radius: 3px;}
	
	/* description textarea */
	.azTextArea {width: 100%; height: 100px; box-sizing: border-box !important; padding: 5px; background-color: #FFF; font-family: arial; font-size: 12px; border: 1px solid #999999; border-radius: 3px;}
	
	/* save, delete button */
	.azButton {margin-top: 5px;}
	
	/* message about click to place a hotspot */
	.azTaggingMsg {position: absolute; background-color: #B50904; width: 290px; margin-left: -140px; top: -1px; left: 50%; border: #000 1px solid; border-bottom-right-radius: 5px; border-bottom-left-radius: 5px; font-size: 11px; color: #FFF; padding: 1px 5px 1px 5px; z-index: 1; pointer-events: none;}
	
	/* parent container for navigation (mNavi) */
	.azCustomNavi{background-color: #AAA; box-sizing: border-box; height: 58px; padding: 4px 0px 4px 0px; border-left: #000 1px solid; border-bottom: #000 1px solid; border-right: #000 1px solid;}
	
	/* html console */
	.azTaggingResults{background-color: #101010; color: #3cc628; padding: 5px; margin: 0; height: 530px; overflow: hidden; overflow-y: auto;}
	.azPre{tab-size: 2; -moz-tab-size: 2; margin: 0; font-size: 11px; font-family: monospace;}
	
	/* Overwrite css from /axZm/jquery.axZm.js */
	.axZmToolTipInner {background-color: #c5d8e1; border-color: #5583b4; border-width: 3px;}
	
	.axZmToolTipTitle {color: #FFF; /* #1a4a7a*/ font-size: 16px; line-height: 18px; min-height: 24px; text-shadow: 0px 0px 2px rgba(150, 150, 150, 0.75);}
	
	.axZm_zoomCustomNaviParentID {margin: 0 auto;}
	
	#axZm_zoomLogHolder {width: 55px;}
</style>
<script>
function showUser(str) {
    if (str == "") {
        document.getElementById("chapter").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("chapter").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET","/manga/db_manga.php?q="+str,true);
        xmlhttp.send();
    }
}

function showPage(str) {
  if (str=="") {
    document.getElementById("txtHint").innerHTML="";
    return;
  } 
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else {  // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
    }
  }
  xmlhttp.open("GET","/manga/db_chapter.php?q="+str,true);
  xmlhttp.send();
}
function showSlider(str) {
  /*if (str=="") {
    document.getElementById("slider").innerHTML="";
    return;
  } */
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else {  // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
     //document.getElementById("slider").innerHTML=
	  myFunction(xmlhttp.responseText);
    }
  }
  xmlhttp.open("GET","/manga/db_page.php?q="+str,true);
  xmlhttp.send();
}
</script>
<?php include 'functions.php'; ?>
</head>
<body>

<form action="#" id="carform">

  <?php mangaName(); ?>
<!--
<select name="users" onchange="showUser(this.value)">
  <option value="">Select a person:</option>
  <option value="1">Peter Griffin</option>
  <option value="2">Lois Griffin</option>
  <option value="3">Joseph Swanson</option>
  <option value="4">Glenn Quagmire</option>
  </select>
  -->
  <?php
// if (isset($_GET["users"])) {
	//chapterName();
//} 
?>
  
</form>
<br>
<div id="chapter"><b>Person info will be listed here...</b></div>
<br>
<div id="txtHint"><b>Person info will be listed here...</b></div>
<div id="slider" style="width: 1250px; margin: 0px auto; overflow-x: hidden;">

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
function myFunction(arg1){
	// some var to hold everyting else
	window.ajaxZoom = {};

	// the ID of the div element where ajax-zoom has to be inserted into
	ajaxZoom.divID = "azParentContainer";	
	
	// path to the axZm folder
	ajaxZoom.path = "../axZm/"; 
	
	// zoomData - defines which image should be loaded
	//var text = e.options[e.selectedIndex].text;
	/*if (arg1=="" or arg1==null)
	{
		ajaxZoom.parameter = "zoomData=/manga/manga/carton_hero/ch0/ch0-01.jpg";
	}else*/
	ajaxZoom.parameter = "zoomData=/manga"+arg1;
	
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
					position: $.fn.axZm.convertHotspotPositionToPx($.axZm.hotspots[name]["position"][$.axZm.zoomID]),
					//length: $.fn.axZm.convertHotspotPositionToPx($.axZm.hotspots[name]["position"][$.axZm.zoomID])
				};
			}
		});
		
		// here we simply visually show that created json without any other action
		$("#azTaggingResults").html("<pre class='azPre'>" + JSON.stringify(json, null, "\t")+"</pre>");
		
		// todo: for example save it to session and restore when loaded	
	};

	readJsonData=function(info){
		// do not do anything if ajaxZoom.taggingMode (a switch var) is false
		if (!ajaxZoom.taggingMode){return;}
		
		// position of the click related to its original size
		var xClick = info.crop[0];
		var yClick = info.crop[1];
		var width = Math.abs(info.crop[0]-info.crop[2]);
		var height = Math.abs(info.crop[1]-info.crop[3]);
		
		/*var dataObj = {
						thumbNumber: jcrop_az.countThumbs,
						crop: gCV[1],
						//url: imgCropperPath,
						//qString: imgCropperPath.replace(axZmPath+'zoomLoad.php?', ''),
						zoomID: $.axZm.zoomID,
						imgName: $.axZm.zoomGA[$.axZm.zoomID]['img'],
						//contentLocation: contentLocation,
						azPar: $.fn.axZm.getParameter()
					};
		*/
		
		// file (image) name
		var currentImageName = $.axZm.zoomGA[$.axZm.zoomID].img;
		
		// position of the hotspot in this file
		// there could be same hotspot on an image in the gallery, 
		// this is why we need image name here and it is defined this way
		var posObj = {}; posObj[currentImageName] = {left: xClick, top: yClick, width: width, height: height};
		
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
				shape: "rect", // shape is point (not rect)
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
				mCustomBtn1: 5, // our "whatever" button
				mCustomBtn3: 5 // our "whatever" button
			};
			
			// there can be as many "whatever" (custom) buttons as you want
			// call them mCustomBtn1, mCustomBtn2, ...
			
			// now we define how this mCustomBtn1 should look like
			$.axZm.icons.mCustomBtn1 = {file: $.axZm.buttonSet + "/button_iPad_tag", ext: "png", w: 50, h: 50};
			$.axZm.icons.mCustomBtn3 = {file: $.axZm.buttonSet + "/zoombutton_crop", ext: "png", w: 50, h: 50};
			
			
			// and the title of mCustomBtn1
			$.axZm.mapButTitle.customBtn1 = ajaxZoom.taggingTxt.disable; // description of the button
			$.axZm.mapButTitle.customBtn2 = "Text"; // description of the button
			
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
			// function when clicked on this custom button (mCustomBtn1)
				jQuery.axZm.mNavi.mCustomBtn3 = function(){
					var temp=jQuery.aZcropEd.jCropMethod('toggle');
					if(temp!='undefined'){
						readJsonData(temp);
					console.log("Ex12 >>>"+temp);
					}
					
				
					return false;
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
}
</script>

</div>

</body>
</html>