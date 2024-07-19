<?php

namespace App\Http\Controllers;
use App\Models\LNCL_HREC_TBL;
use App\Models\LNCL_IMAGES;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ProblemController extends Controller
{
    public function index()
    {

    }

    public function recordPrb(Request $request){
        $YM = date('Ym');
        $LNCL_HREC_ID = '';

        $findPreviousMaxID = DB::table('LNCL_HREC_TBL')
            ->select('LNCL_HREC_ID')
            ->orderBy('LNCL_HREC_ID', 'DESC')
            ->get();

        if (empty($findPreviousMaxID[0])) {
            $LNCL_HREC_ID = 'LNCLREC-' . $YM . '-000001';
        } else {
            //* Helper > GenkeyHelper.php > AutogenerateKey()
            $LNCL_HREC_ID = AutogenerateKey('LNCLREC', $findPreviousMaxID[0]->LNCL_HREC_ID);
        }

        return response()->json($findPreviousMaxID);

    }

}
