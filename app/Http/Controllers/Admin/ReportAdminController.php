<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\Report;
use App\Repository\ReportRepository;
use App\Services\ReportService;
use Illuminate\Http\Request;

class ReportAdminController extends Controller
{

    private $reportRepository;

    public function __construct()
    {
        $this->reportRepository = new ReportRepository();
    }

    public function index(Request $request)
    {
        $page = $request->get('page',1);
        $paginate = $this->reportRepository->findAllReports()->forPage($page , 25);
        return view('admin.report.index',[
            'pagination'=> $paginate,
            'nbUntreatedReports'=> $this->reportRepository->countUntreatedReports()
        ]);
    }

    public function show(int $id)
    {
         $report = new Report();
        return view('admin.report.show',[
            'report' => $report,
            'messageReports' => $this->reportRepository->findByMessage(Message::find($id))
        ]);
    }

    public function delete(int $id)
    {
        $reportService = new ReportService();
        $reportService->deleteReport(Report::find($id));
        $request = new Request();
        $request->session()->flash('flash' , ['type'=>'success' , 
        'title'=>'forum' , 'message' => 'abrakad']);
      return  redirect('admin.report.index');

    }

    public function close(int $id)
    {
        $reportService = new ReportService();
        $reportService->closeReport(Report::find($id));
        $request = new Request();
        $request->session()->flash('flash' , ['type'=>'success' , 
        'title'=>'forum' , 'message' => 'abrakad']);
      return  redirect('admin.report.index');
    }
}

?>