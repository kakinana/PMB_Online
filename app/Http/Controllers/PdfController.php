<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PdfController extends Controller
{
    public function generatePdf($id)
    {
        $daftar = Pendaftaran::with('provinsi')->findOrFail($id);

        $pdf = PDF::loadView('pdfGenerate', compact('daftar'));

        return $pdf->download('Hasil-Pendaftaran.pdf');
    }
}
