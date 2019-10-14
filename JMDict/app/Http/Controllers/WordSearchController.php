<?php
/**
 *  ASD 300919 Controller to handle japanese word searches.
 * Returns all the words that match to the words.index
 */
namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Word;

use Illuminate\Http\Request;

class WordSearchController extends Controller
{
    public function search(Request $request)
    {
        $begin = $request->wordSearchBegins;
        $middle = $request->wordSearchContains;
        $end = $request->wordSearchEnds;
        $means = $request->wordSearchMeans;

        $words = DB::table('words');
        $this->buildQueryFragment($words, $begin, "begin");
        $this->buildQueryFragment($words, $middle, "middle");
        $this->buildQueryFragment($words, $end, "end");
        $this->buildQueryFragment($words, $means, "means");
        $results = $words->get();
        return view('words.index', ['words' => $results]);
    }

    /*
     * Build up query depending on the charType of kana,kanji or romaji.
     */
    private function buildQueryFragment($querybuilder, $input, $type)
    {
        if (empty($input)) return;
        switch ($this->charType($input)) {
            case "romaji":
                $fieldname = "rebRomaji";
                break;
            case "kana":
                $fieldname = "reb";
                break;
            case "kanji":
                $fieldname = "keb";
                break;
        }
        if ($type == "means") $fieldname = "gloss"; //override the above if it's the gloss field.
        if (!empty($input)) {
            if ($type == "begin") {
                $querybuilder->where($fieldname, "like", $input . "%");
            }
            if ($type == "middle") {
                $querybuilder->where($fieldname, "like", "%" . $input . "%");
            }
            if ($type == "end") {
                $querybuilder->where($fieldname, "like", "%" . $input);
            }
            if ($type == "means") {
                $querybuilder->where($fieldname, "like", "%" . $input . "%");
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
}
