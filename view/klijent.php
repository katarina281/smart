<!DOCTYPE html>
<html>
<head>
	<style>
#customers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}
</style>
<meta http-equiv='Content-Type' content='Type=text/html; charset=utf-8'>
<title>Drzave</title>
</head>
<body>
<?php
//Zameniti URL putanjom serverskog dela REST servisa
$url = 'http://localhost/Kuca/controller/server.php';
$curl = curl_init($url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POST, false);
$curl_odgovor = curl_exec($curl);
curl_close($curl);
$countries = new SimpleXMLElement($curl_odgovor,null,false);
if (property_exists($countries,"greska")){
echo ($countries->greska);
} else {
// ako nema greske, generise se tabela
?>
<h2>Drzave u kojima je dostupna aplikacija</h2>
<table id="customers">
<tr>
<td>ID</td>
<td>Naziv</td>
</tr>
<?php
foreach ($countries as $p){
// prolazi se kroz cvorove XML dokumenta i cvorovi se prikazuju u tabeli
?>
<tr>
<td><?php echo $p->id;?></td>
<td><?php echo $p->naziv;?></td>
</tr>
<?php
}
?>
</table>
<?php
}
?>
</body>
</html>
 
