<?php
namespace App\Repository;

use App\Models\Message;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Models\Report;
class ReportRepository
{
    public function countUntreatedReports():int
    {
        return DB::table('reports' )
        ->whereNull('treatedAt')->count('id');
        

    }

    public function findAllReports()
    {
        return Report::all();
    }

    public function findByMessage(Message $message)
    {
        return DB::table('reports')
        ->where('message_id','id', $message->id)
        ->select('*')
        ->get();
    }
}

?>