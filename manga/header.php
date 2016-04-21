<!doctype html>
<html  >
	<head>
		<meta charset="utf-8">
		<title>Title</title>
  <link rel="stylesheet" href="./css/main.css">
   
   </head>

	<body >

		
			<!-- header -->
			<header>
			<?php
			//functions
			function gonext() {
										
				$test=$_GET["page"];
				$test=$test+1;
				$test1=$_GET["chapter"];
		echo "<script>window.location = 'http://avtomag.url.ph/manga/?chapter=".$test1."&page=".$test."#'</script>";
			}
			
			
			?>
			
			
			
                <div class="main">
                    <div class="wrapper">
                        <h1><a href="http://avtomag.url.ph">logo</a></h1>
                        <div class="fright">
                            <div class="indent">
                                <span class="address">вул. Степана Бандери, 12, Львів, Львівська область, 79000</span>
                                <span class="phone">Tel: +38 0322 724 733</span>
                            </div>
                        </div>
                    </div>
                   
			<nav class="nav" role="navigation">
				<ul class="menu">
				
				 </ul>
				 
				 	<?php

/*if (isset($_GET['id']) {
	$id= $_GET['id'];
}
else {*/
	$id = 1;/*
}
if (isset($_GET["page"]) {
	$page=$_GET["page"];
}
else {*/
	$page = 1;
//}
if (isset($_GET["chapter"])) {
	$chapter=$_GET["chapter"];
}
else {
	$chapter = 1;
}
					
// Соединяемся, выбираем базу данных
/*$link = mysql_connect('localhost', 'root', '')
    or die('Не удалось соединиться: ' . mysql_error());
echo 'Соединение успешно установлено';*/

$conn = new mysqli('mysql.hostinger.com.ua', 'u450252009_admin', 'QdMWc5XJGfPg', 'u450252009_autom');
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

//mysql_select_db('u450252009_autom') or die('Не удалось выбрать базу данных');

// Выполняем SQL-запрос
/*$query = 'SELECT db_manga.id, db_manga.name, db_chapter.N_chapter,db_page.N_page, db_page.path
FROM db_manga LEFT JOIN manga.db_chapter ON db_manga.id=db_chapter.id_manga 
RIGHT JOIN manga.db_PAGE ON db_chapter.id=db_page.id_chapter
where db_manga.id='.$id.' order by db_page.N_page';
//$result = mysql_query($query) or die('Запрос не удался: ' . mysql_error());
*/
$query = 'SELECT db_manga.id, db_manga.name, db_chapter.N_chapter,db_page.N_page, db_page.path FROM db_manga 
left join db_chapter on db_manga.id=db_chapter.id_manga
    right join db_page on db_chapter.id=db_page.id_chapter
     WHERE db_manga.id='.$id.' order by db_page.N_page';

$result = $conn->query($query);

$data_chapt=array();
$data_page=array();
//$data_path=array();

if ($result->num_rows > 0) {
    // output data of each row
	  //  echo '<select name="siinnst" id="iinst" onChange="form1.submit();" style="width:100%; height:100%;">';
	//	echo '<option selected disabled value="0">Виберіть інститут</option>';
		//$id_inst="";
	 while($row = $result->fetch_assoc()) {
      echo "id: " . $row["N_page"]. " - Name: " . $row["name"]. " " . $row["path"]. "<br>";
		 // echo '<option value='. $row["id"].' '.(option_selected($_GET["siinnst"], $row["id"]) ).'>'. $row["sname"].'</option> ';
    //array_push($data_chapt,$row["N_chapter"]);
	//array_push($data_chapt,$row["N_chapter"]);
	
	$data_chapt[]=$row["N_chapter"];
	$data_chapt = array_unique($data_chapt);
	if(isset($_GET["chapter"])){
		if($row["N_chapter"]==$_GET["chapter"]){
			$data_page[$row["N_page"]]=$row["path"];
		}
			
		//	echo '<img src="'.$data_page[1].'" style=" width:100%;" alt="image" />'; 
		} else{
			if($row["N_chapter"]==$data_chapt[1]){
			$data_page[$row["N_page"]]=$row["path"];
		}
			}
	
	}
	echo '</select>';
} else {
    echo "0 results";
}


// Выводим результаты в html

/*echo '<div style="width:1000px;">';
echo "\n";
echo "<table>\n";
while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
    echo "\t<tr>\n";
    foreach ($line as $col_value) {
        echo "\t\t<td>$col_value</td>\n";
//додаємо результати в масив
	array_push($data_path,$col_value);
	echo '<label id="lab" style=" position: absolute; top:100px;right:500px;">Male</label>';
    }
    echo "\t</tr>\n";
}
//echo "<img src=".$data_path[0]." width=100% />";
echo "</table>\n";
echo "</div>\n";
// Освобождаем память от результата
mysql_free_result($result);

// Закрываем соединение
mysql_close($link);*/
$conn->close();



// Соединяемся, выбираем базу данных
/*$link = mysql_connect('localhost', 'root', '')
    or die('Не удалось соединиться: ' . mysql_error());
echo 'Соединение успешно установлено';*/

$conn = new mysqli('mysql.hostinger.com.ua', 'u450252009_admin', 'QdMWc5XJGfPg', 'u450252009_autom');
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

//mysql_select_db('u450252009_autom') or die('Не удалось выбрать базу данных');

// Выполняем SQL-запрос

//$result = mysql_query($query) or die('Запрос не удался: ' . mysql_error());

/*$query = 'SELECT id, text, x, y, width, height FROM db_textbox 
left join db_chapter on db_manga.id=db_chapter.id_manga
    right join db_page on db_chapter.id=db_page.id_chapter
     WHERE db_manga.id='.$id.' order by db_page.N_page';*/

	 $query = 'SELECT id, text, x, y, width, height FROM db_textbox 
	 left join db_page on db_textbox.id_page=db_page.id
     WHERE id_page='.$page;

	 $result = $conn->query($query) or die('Запрос не удался: ' . mysql_error());

$array_textbox=array();

//$data_path=array();

if ($result->num_rows > 0) {
    // output data of each row
	 
	 while($row = $result->fetch_assoc()) {
     // echo "id: " . $row["N_page"]. " - Name: " . $row["name"]. " " . $row["path"]. "<br>";
		
	array_push($array_textbox, 	array($row["text"],$row["x"],$row["y"],$row["width"],$row["height"]));
echo "id: " . $row["id"]. " - Name: " . $row["text"];
	}
	//echo '</select>';
} else {
    echo "0 results";
}


$conn->close();


?>
				
			</nav>


                    
                </div>
            </header>
			<!-- /header -->
