<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LeakController extends Controller
{
    public function index()
    {

    }

    public function recordLeak()
    {
        $currentDate = date('Y-m-d H:i:s');
        $YM = date('Ym');
        $LNCL_LEAKANDROOT_ID = '';
        $findPreviousMaxID = DB::table('LNCL_LEAKANDROOT_TBL')
            ->select('LNCL_LEAKANDROOT_ID')
            ->orderBy('LNCL_LEAKANDROOT_ID', 'DESC')
            ->get();
        if (empty($findPreviousMaxID[0])) {
            $LNCL_LEAKANDROOT_ID = 'LKANDRT-' . $YM . '-000001';
        } else {
            //* Helper > GenkeyHelper.php > AutogenerateKey()
            $LNCL_LEAKANDROOT_ID = AutogenerateKey('LKANDRT', $findPreviousMaxID[0]->DLCH_ID);
        }

        $insert = DB::table('LNCL_LEAKANDROOT_TBL');

        if(empty($insert)){
            $recLK = [

            ];

        }


    }
}
