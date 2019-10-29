<?php
/**
 * ASD 151019 Import Japanese character dictionary from XML file.
 * DON'T USE THIS ONE.  USE ImportJMDictXML as the character encoding isn't clean.
 */

use App\Word;
include "Conversion.php";

$word = null;
$currElement = "";


function startElements($parser, $name, $attrs){
	global $word, $currElement;
	//echo "in start elements".$name;
	$currElement=$name;
	switch ($name) {
		case "ENTRY" :
			//echo "new entry";
			$word = new Word();
			break;
	}
}
function endElements($parser,$name){
//Got to end of entry, save the data to the db.
	//
	global $word;
	if ($name=="ENTRY"){
		$word->rebRomaji =convertToRomaji($word->reb);

        $word->save();

	}
}
function characterData($parser,$data){
	global $word, $currElement;
	//echo $currElement;
	//echo "in cdata:".$currElement;
	$data=trim($data);
	if (empty($data)) return;
    if (empty($word)) return;
    switch ($currElement){
        case "ENT_SEQ":
			if (is_numeric($data)){
            	$word->ent_seq =$data;
			}
            break;
        case "KEB":
            $word->keb=(isset($word->keb)?$word->keb.";":'').$data;
			print_r($word->keb);
            break;
        case "REB":
            $word->reb=(isset($word->reb)?$word->reb.";":'').$data;
            break;
        case "KE_PRI":
            $word->ke_pri=(isset($word->ke_pri)?$word->ke_pri.";":'').$data;
            break;
        case "RE_PRI":
            $word->re_pri=(isset($word->re_pri)?$word->re_pri.";":'').$data;
            break;
        case "GLOSS":
            $word->gloss=(isset($word->gloss)?$word->gloss.'\n':'').$data;
            break;
    }
}
function importwords(){
    $parser = xml_parser_create("UTF-8");

   xml_set_element_handler($parser, "startElements", "endElements");
   xml_set_character_data_handler($parser, "characterData");

   // open xml file
   if (!($handle = fopen('/home/laravel/JMDict/JMdict_e', "r"))) {
      die("could not open XML input");
   }

   while($data = fread($handle, 4096)) {
      xml_parse($parser, $data);  // start parsing an xml document
   }

   xml_parser_free($parser); // deletes the parser
}

?>
