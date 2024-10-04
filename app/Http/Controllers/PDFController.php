<?php

namespace App\Http\Controllers;

use Barryvdh\Snappy\Facades\SnappyImage;
use Barryvdh\Snappy\Facades\SnappyPdf as PDF;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PDFController extends Controller
{
    public function generatePDF()
    {
        $user = Auth::user(); 
        $html = view('id_card', compact('user'))->render(); 
        return PDF::loadHTML($html)->download('id_card.pdf');
    }
}
