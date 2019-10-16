<?php
/**
 * ASD 161019
 * Return list of radicals available for the selection of characters filtered by skip code.
 * This is used for the front end radical dropdown in the skip code search.
 * TODO: decide whether to return XML which makes it easy to put into the SELECT or as JSON which is easy on this side.
 *
 */
namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Radical;

use Illuminate\Http\Request;

class RadicalBySkipController extends Controller
{
    function radicalSearch(Request $request){
        $request->flash();//save the request values into the session.
        $skip = $request->skipcode;

        $characters = DB::table('characters');
        $this->buildQueryFragment($characters, $skip);
        $results = $characters->get();
        return $results;
    }

    /**
     * Find the characters that match the skipcode.
     * TODO : Allow partial skipcodes?
     * join with the radical table and return the sorted list.
     * @param $querybuilder
     * @param $skipcode
     */
    private function buildQueryFragment($characters, $skipcode)
    {
        $characters->join('radicals','classical','radicals.character');
        $characters->where('skip',"=",$skipcode);

        $characters->select('radicals.character', 'radicals.chinese')->distinct();

        return;
    }
}
