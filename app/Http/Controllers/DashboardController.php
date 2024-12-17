<?php

namespace App\Http\Controllers;

use App\Models\Dashboard;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Data kategori (bisa diambil dari database)
        $categories = [
            (object) ['name' => 'General'],
            (object) ['name' => 'Pustaka'],
            (object) ['name' => 'HRGA'],
            (object) ['name' => 'Finance'],
            (object) ['name' => 'Project & Services'],
            (object) ['name' => 'System & Design Analyst'],
            (object) ['name' => 'Business Development'],
            (object) ['name' => 'Public Relations & Partnership'],
            (object) ['name' => 'Research & Technical Solution'],
            (object) ['name' => 'Health Care Solution'],
        ];

        return view('dashboard', compact('categories'));
    }
}
