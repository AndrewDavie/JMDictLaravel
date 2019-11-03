<?php
/*
 * ASD 151019 Import Japanese character dictionary from XML file.
 */

use App\Character;

include "Conversion.php";

$char = null;
$currElement = "";

function startElements($parser, $name, $attrs)
{
    global $char, $currElement;
    $currElement = $name;

    switch ($name) {
        case "CHARACTER" :
            $char = new Character();
            break;
        case "READING":
            $currElement = $attrs['R_TYPE'];
            break;
        case "Q_CODE":
            $currElement = $attrs['QC_TYPE'];
            break;
        case "RAD_VALUE":
            $currElement = $attrs['RAD_TYPE'];
            break;
        case "MEANING":
            if (count($attrs) <> 0) {
                $currElement = "Junk";//don't save this meaning - it's in a language other than English
            } else {
                $currElement = $name;
            }
            break;
        default:
            $currElement = $name;
    }
}

function endElements($parser, $name)
{
    global $char;
    if ($name == "CHARACTER") {
        //Got to end of entry, save the data to the db.
        $char->save();
    }
}

function characterData($parser, $data)
{
    global $char, $currElement;
    $data = trim($data);
    if (empty($data)) return;
    if (empty($char)) return;
    switch ($currElement) {
        case "LITERAL":
            $char->literal = $data;
            print_r($data); //show that it's working.
            break;
        case "classical":
        case "nelson_c":
        case "GRADE":
        case "STROKE_COUNT":
        case "FREQ":
        case "skip":
        case "sh_desc":
        case "four_corner":
        case "deroo":
        case "ja_on":
        case "ja_kun":
            $char[$currElement] = $data;
            break;
        case "MEANING":
            //If it already has a meaning entry, append to it.
            $char->meaning = (isset($char->meaning) ? $char->meaning . '\n' : '') . $data;
            break;
    }
}

function importchars()
{

    $parser = xml_parser_create("UTF-8");

    xml_set_element_handler($parser, "startElements", "endElements");
    xml_set_character_data_handler($parser, "characterData");

    // open xml file
    if (!($handle = fopen('/home/laravel/JMDict/kanjidic2.xml', "r"))) {
        die("could not open XML input");
    }

    while ($data = fread($handle, 4096)) {
        xml_parse($parser, $data);  // start parsing an xml document
    }

    xml_parser_free($parser); // deletes the parser
}

?>
