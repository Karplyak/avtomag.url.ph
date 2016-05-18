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
$q = intval($_GET['q']);
/*
$con = mysqli_connect('localhost', 'root', '', 'manga');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}
$query = 'id, name, sec_name,autor, trans FROM db_manga 
left join db_chapter on db_manga.id=db_chapter.id_manga
    right join db_page on db_chapter.id=db_page.id_chapter
     WHERE db_manga.id='.$id.' order by db_page.N_page';
	 
mysqli_select_db($con,"ajax_demo");
$sql="SELECT * FROM db_page where id_chapter=".$q;
$result = mysqli_query($con,$sql);

echo "<table>
<tr>
<th>Firstname</th>
<th>Lastname</th>
<th>Age</th>
<th>Hometown</th>
<th>Job</th>
</tr>";
while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['id'] . "</td>";
    echo "<td>" . $row['id_chapter'] . "</td>";
    echo "<td>" . $row['N_page'] . "</td>";
    echo "<td>" . $row['path'] . "</td>";
    echo "<td>" . $row['date'] . "</td>";
    echo "</tr>";
}
echo "</table>";
mysqli_close($con);*/

$servername = "mysql.hostinger.com.ua";//'mysql.hostinger.com.ua', 'u450252009_admin', 'QdMWc5XJGfPg' u450252009_autom
$username = "u450252009_admin";
$password = "QdMWc5XJGfPg";
$dbname = "u450252009_autom";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, N_page FROM db_page where id_chapter=".$q;

/*	id, id_manga, N_chapter, id_lang


$query = 'SELECT id, text, x, y, width, height FROM db_textbox 
left join db_chapter on db_manga.id=db_chapter.id_manga
    right join db_page on db_chapter.id=db_page.id_chapter
     WHERE db_manga.id='.$id.' order by db_page.N_page';*/

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
	    echo '<select name="users2" onchange="showSlider(this.value)">';
		echo '<option selected disabled value="">Виберіть Срозділ</option>';
		$id_inst="";
	 while($row = $result->fetch_assoc()) {
     //   echo "id: " . $row["id"]. " - Name: " . $row["sname"]. " " . $row["fname"]. "<br>";
	 echo '<option value='. $row["id"].'>Page '.$row["N_page"].'</option> ';
   	}
	echo '</select>';
} else {
	 echo '<select name="users2" onchange="showSlider(this.value)">';
	 echo '<option selected disabled value="">Виберіть СТОРІНКУ</option>';
    echo '</select>';
}
$conn->close();
?>
</body>
</html>