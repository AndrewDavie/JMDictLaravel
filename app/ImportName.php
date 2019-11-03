<?php

use App\Name;
include "Conversion.php";

$name = null;
$currElement = "";


function startElements($parser, $elementname, $attrs){
	global $name, $currElement;
	//echo "in start elements".$elementname;
	$currElement=$elementname;
	switch ($elementname) {
		case "ENTRY" :
			echo "new entry";
            $name = new Name();
			break;
	}
}
function endElements($parser,$elementname){
//Got to end of entry, save the data to the db.
	//
	global $name;
	if ($elementname=="ENTRY"){
        $name->rebRomaji =convertToRomaji($name->reb);

        $name->save();

	}
}
function characterData($parser,$data){
	global $name, $currElement;
	//echo $currElement;
	//echo "in cdata:".$currElement;
	$data=trim($data);
	if (empty($data)) return;
    if (empty($name)) return;
    switch ($currElement){
        case "KEB":
            $name->keb=(isset($name->keb)?$name->keb.";":'').$data;
			print_r($name->keb);
            break;
        case "REB":
            $name->reb=(isset($name->reb)?$name->reb.";":'').$data;
            break;
        case "NAME_TYPE":
            $name->name_type=(isset($name->name_type)?$name->name_type.";":'').$data;
            break;
        case "TRANS_DET":
            $name->trans_det=(isset($name->trans_det)?$name->trans_det.'\n':'').$data;
            break;
    }
}
function importnames(){
    $parser = xml_parser_create("UTF-8");

   xml_set_element_handler($parser, "startElements", "endElements");
   xml_set_character_data_handler($parser, "characterData");

   // open xml file
   if (!($handle = fopen('/home/laravel/JMDict/JMnedict.xml', "r"))) {
      die("could not open XML input");
   }

   while($data = fread($handle, 4096)) {
      xml_parse($parser, $data);  // start parsing an xml document
   }

   xml_parser_free($parser); // deletes the parser
}

?>
