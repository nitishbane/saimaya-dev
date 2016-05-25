<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use PDF;
use App;
class PdfController extends Controller
{
	public function createPdf()
	{
		$pdf = App::make('dompdf.wrapper');
		$pdf->loadView('pdf');
		return $pdf->download('test.pdf');	
	}
    
}
