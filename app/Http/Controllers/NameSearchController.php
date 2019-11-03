<?php
/**
 *  ASD 211019 Controller to handle japanese name searches.
 * Returns all the words that match to the names.index
 * Based very closely on the WordSearchController.
 */
namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Name;

use Illuminate\Http\Request;

class NameSearchController extends Controller
{
    public function search(Request $request)
    {
        $request->flash();//save the request values into the session.
        $begin = $request->nameSearchBegins;
        $middle = $request->nameSearchContains;
        $end = $request->nameSearchEnds;
        $type = $request->namesType;

        $names = DB::table('names');
        $this->buildQueryFragment($names, $begin, "begin");
        $this->buildQueryFragment($names, $middle, "middle");
        $this->buildQueryFragment($names, $end, "end");
        $this->buildQueryFragment($names, $type, "type");
        $results = $names->get();
        //echo $names->toSql();
        return view('names.index', ['names' => $results]);
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
        //ignore the above if it's a type.
        if ($type == "type") {
            $querybuilder->where('name_type', "=", $input);
        }
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
