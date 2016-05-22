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
/*
echo "<table>
<tr>
<th>Firstname</th>
<th>Lastname</th>
<th>Age</th>
<th>Hometown</th>
<th>Job</th>
</tr>";*/
$path='';
while($row = mysqli_fetch_array($result)) {
/*    echo "<tr>";
    echo "<td>" . $row['id'] . "</td>";
    echo "<td>" . $row['id_chapter'] . "</td>";
    echo "<td>" . $row['N_page'] . "</td>";
    echo "<td>" . substr($row['path'],1,strlen($row['path'])-1) . "</td>";
    echo "<td>" . $row['date'] . "</td>";
    echo "</tr>";*/
	$path=substr($row['path'],1,strlen($row['path'])-1);
}
//echo "</table>";
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
echo $path;
?>

	
	
	
	
	
