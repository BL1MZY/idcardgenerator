<?php

namespace App\Http\Controllers;
use Barryvdh\Snappy\Facades\SnappyImage;
use Illuminate\Support\Facades\Auth;
use Spatie\Browsershot\Browsershot;

class ImageController extends Controller
{
    public function front()
    {
        $user = Auth::user(); 
        $html = view('id_card_front', compact('user'))->render();
        
        $image = SnappyImage::loadHTML($html)
                            ->setOption('format', 'png')
                            ->setOption('width', 633)
                            ->setOption('height', 374);
    
        $fileName = $user->name.'_id_card_front_cover.png';
        $filePath = public_path($fileName);
        
        $image->save($filePath);
    
        return response()->download($filePath)->deleteFileAfterSend(true);
    }
    public function back()
    {
        $user = Auth::user(); 
        $html = view('id_card_back', compact('user'))->render();
        
        $image = SnappyImage::loadHTML($html)
                            ->setOption('format', 'png')
                            ->setOption('width', 633)
                            ->setOption('height', 374);
    
        $fileName = $user->name.'_id_card_back_cover.png';
        $filePath = public_path($fileName);
        
        $image->save($filePath);
    
        return response()->download($filePath)->deleteFileAfterSend(true);
    }

}
