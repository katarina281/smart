<?php
//definiše se mime type
header("Content-type: application/xml");
include("../model/konekcija.php");
//priprema upita
$sql="SELECT * FROM countries ORDER BY id ASC";
//kreiranje XMLDOM dokumenta
$dom = new DomDocument('1.0','utf-8');

//dodaje se koreni element
 $countries = $dom->appendChild($dom->createElement('countries'));

//izvršavanje upita
if (!$q=$mysqli->query($sql)){
//ako se upit ne izvrši
  //dodaje se element <greska> u korenom elementu <countries>
 $greska = $countries->appendChild($dom->createElement('greska'));
 //dodaje se elementu <greska> sadrzaj cvora
 $greska->appendChild($dom->createTextNode("Došlo je do greške pri izvršavanju upita"));
} else {
//ako je upit u redu
if ($q->num_rows>0){
//ako ima rezultata u bazi
$niz = array();
while ($red=$q->fetch_object()){
  //dodaje se element <cont> u korenom elementu <countries>
 $cont = $countries->appendChild($dom->createElement('cont'));

 //dodaje  se <id> element u <cont>
 $id = $cont->appendChild($dom->createElement('id'));
 //dodaje se elementu <id> sadrzaj cvora
 $id->appendChild($dom->createTextNode($red->id));

 //dodaje  se <naziv> element u <cont>
 $naziv = $cont->appendChild($dom->createElement('naziv'));
 //dodaje se elementu <naziv> sadrzaj cvora
 $naziv->appendChild($dom->createTextNode($red->naziv));
}
} else {
//ako nema rezultata u bazi
  //dodaje se element <greska> u korenom elementu <countries>
 $greska = $countries->appendChild($dom->createElement('greska'));
 //dodaje se elementu <greska> sadrzaj cvora
 $greska->appendChild($dom->createTextNode("Nema unetih conta"));
}
}
//cuvanje XML-a
$xml_string = $dom->saveXML(); 
echo $xml_string;
//zatvaranje konekcije
$mysqli->close()
?>
