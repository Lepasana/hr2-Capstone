<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class LearningManagementController extends Controller
{
  public function getCertificate(Request $request)
  {
    $pdf = Pdf::loadView('content.apps.learning-management.certificate');
    return $pdf->download('document.pdf');
  }
}
