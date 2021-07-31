<?php

namespace App\Services;

use App\Models\Message;
use App\Models\Report;
use App\Models\User;
use DateTime;
use Illuminate\Support\Facades\DB;

class ReportService
{

    public function createReport(Message $message, string $reason ,User $user)
    {
        $report = new Report();
        $report->reportedByUser_id = $user->id;
        $report->reason = $reason;
        $report->message_id = $message->id;
        $report->save();
        
    }   

    public function deleteReport(Report $report)
    {
        DB::table('reports')->where('id','=',$report->id)->delete();

    }

    public function closeReport(Report $report)
    {
        $report->treatedAt = new DateTime();
        $report->save();
    }

    public function deleteReportsByUser(User $user)
    {
        $messages = $user->messages;
        foreach($messages as $message){
            DB::table('reports')->where('message_id','=', $message->id)
            ->delete();
        }
        
    }

}


?>