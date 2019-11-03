<?php
/**
 * ASD 221019
 * Return list of name types available.
 * This is used for the front end name type dropdown in the name search.
 *
 */
namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Name;

use Illuminate\Http\Request;

class NameTypeController extends Controller
{
    function typeList(Request $request){
        $names = DB::table('names');
        $this->buildQueryFragment($names);
        //echo $names->toSql();
        $results = $names->get();
        return $results;
    }

    /**
     * Just get the list of distinct name types.
     * @param $querybuilder
     */
    private function buildQueryFragment($names)
    {
        $names->where('name_type','not like','%;%');
        $names->select('name_type')->distinct();

        return;
    }
}
