<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Display the about page with teachers data
     */
    public function index()
    {
        // Mengambil 4 guru untuk ditampilkan di about page
        // Urutkan berdasarkan experience jika ada, atau berdasarkan ID terbaru
        $teachers = Teacher::orderBy('id', 'desc')
                        ->take(4)
                        ->get();

        return view('about', compact('teachers'));
    }
}
