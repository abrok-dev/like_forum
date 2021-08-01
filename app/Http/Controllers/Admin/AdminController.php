<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repository\ReportRepository;

class AdminController extends Controller
{

  public function  __invoke()
    {

    }
    private ReportRepository $reportRepository ;

public function __construct()
{
  $this->reportRepository = new ReportRepository();
}
    public function homepage()
    {
      return view('admin.homepage' ,
       [ 'nbUntreatedReports' => $this->reportRepository->countUntreatedReports()]);
    }
}
?>