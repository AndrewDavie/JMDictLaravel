<?php
//ASD 260919 Import Japanese-English dictionary from XML file.
include "Conversion.php";
$servername = "localhost";
$username = "laravel";
$password = "laravel";
$dbname="JMDict";

$conn = new mysqli($servername, $username, $password,$dbname);

$entry = array();
$currElement = "";

function startElements($parser, $name, $attrs){
	global $entry, $currElement;
	$currElement=$name;
	switch ($name) {
		case "ENTRY" :
			$entry = array();
            $entry['keb']='';
            $entry['reb']='';
			$entry['ke_pri']='';
			$entry['re_pri']='';
            $entry['gloss']='';
            $entry['rebRomaji']='';
			break;
		default:
			$currElement=$name;
			break;
	}
}
function endElements($parser,$name){
//Got to end of entry, save the data to the db.
	global $conn, $entry;
	if ($name=="ENTRY"){
		$entry['rebRomaji']=convertToRomaji($entry['reb']);
		$entry['gloss']=$conn->real_escape_string($entry['gloss']);
		$sql = "INSERT into words (ent_seq,keb,reb,ke_pri,re_pri,gloss,rebRomaji)
			VALUES (
			".$entry['ent_seq'].",
			'".substr($entry['keb'],1)."',
			'".substr($entry['reb'],1)."',
			'".substr($entry['ke_pri'],1)."',
			'".substr($entry['re_pri'],1)."',
			'".substr($entry['gloss'],1)."',
			'".substr($entry['rebRomaji'],1)."')";
		if ($conn->query($sql) === TRUE) {
			//echo "New record created successfully";
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
		unset($entry);

	}
}
function characterData($parser,$data){
	global $entry, $currElement;
	$data=trim($data);
	if (empty($data)) return;
    switch ($currElement){
        case "ENT_SEQ":
			if (is_numeric($data)){
            	$entry['ent_seq']=$data;
			}
            break;
        case "KEB":
            $entry['keb']=(isset($entry['keb'])?$entry['keb']:'').";".$data;
			print_r($entry);
            break;
        case "REB":
            $entry['reb']=(isset($entry['reb'])?$entry['reb']:'').";".$data;
            break;
        case "KE_PRI":
            $entry['ke_pri']=(isset($entry['ke_pri'])?$entry['ke_pri']:'').";".$data;
            break;
        case "RE_PRI":
            $entry['re_pri']=(isset($entry['re_pri'])?$entry['re_pri']:'').";".$data;
            break;
        case "GLOSS":
            $entry['gloss']=$entry['gloss'].",".$data;
            break;
    }
}
    $parser = xml_parser_create("UTF-8");

   xml_set_element_handler($parser, "startElements", "endElements");
   xml_set_character_data_handler($parser, "characterData");

   if (!($handle = fopen('JMdict_e', "r"))) {
      die("could not open XML input");
   }

   while($data = fread($handle, 4096)) {
      xml_parse($parser, $data);
   }

   xml_parser_free($parser);


?>
