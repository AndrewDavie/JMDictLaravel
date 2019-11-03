<?php
/**
 *  ASD 300919 Controller to handle japanese word searches.
 * Returns all the words that match to the words.index
 */
namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Character;

use Illuminate\Http\Request;

class CharacterSearchController extends Controller
{
    public function skipSearch(Request $request)
    {
        $request->flash();//save the request values into the session.
        $skipcode = $request->skipcode;
        $radical = $request->radical;

        $characters = DB::table('characters');
        $this->buildQueryFragment($characters, $skipcode, "skipcode");
        $this->buildQueryFragment($characters, $radical, "radical");
        $results = $characters->get();
        return view('characters.index', ['characters' => $results]);
    }

    /*
     * Build up query depending on the charType of kana,kanji or romaji.
     */
    private function buildQueryFragment($querybuilder, $input, $type)
    {
        if (empty($input)) return;
        if (!empty($input)) {
            if ($type == "skipcode") {
                $querybuilder->where("skip", "like", $input . "%");
            }
            if ($type == "radical") {
                //FIXME : Why not just pass the unicode value from the frontend?
                $querybuilder->where('classical', "=", $input);  //turn the radical input into the relevant classical number.
            }
            if ($type == "character"){
                $querybuilder->where("literal","=",$input);
            }
            if ($type == "meaning"){
                $querybuilder->where("meaning","like","%".$input."%");
            }
        }
        return;
    }


    /**
     * determine what type of character is in the first letter of the string.
     * eg. kana, kanji, romaji
     * Making the assumption that all characters input will be of those 3 types.
     * If another language is input, it will give the wrong result, but it doesn't matter
     * since it won't find those values anyway.
     */
    private function charType($str)
    {
        $num = mb_ord($str);
        if ($num <= ord("z")) {
            return "romaji";
        }
        if ($num <= mb_ord("を")) {
            return "kana";
        }
        return "kanji";
    }

    /**
     * ASD 211019 search for a kanji character by character or meaning.
     * @param Request $request
     */
    public function characterSearch(Request $request){
        $request->flash();//save the request values into the session.
        $kanjiChar = $request->kanjiChar;
        $kanjiMeaning = $request->kanjiMeaning;

        $characters = DB::table('characters');
        $this->buildQueryFragment($characters, $kanjiChar, "character");
        $this->buildQueryFragment($characters, $kanjiMeaning, "meaning");

        $results = $characters->get();
        return view('characters.index', ['characters' => $results]);
    }
}
