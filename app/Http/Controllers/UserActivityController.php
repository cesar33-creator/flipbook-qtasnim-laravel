<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserActivityController extends Controller
{
    public function index()
    {
        
        $activities = [
            ["no" => 1, "date_time" => "2024-12-04 11:00", "username" => "Jhon", "action" => "Upload", "document_name" => "Kode Etik Qtasnim", "division" => "HR"],
            ["no" => 2, "date_time" => "2024-12-04 11:02", "username" => "Lucky", "action" => "Read", "document_name" => "Kode Etik Qtasnim", "division" => "General"],
            ["no" => 3, "date_time" => "2024-12-04 11:10", "username" => "Vino", "action" => "Delete", "document_name" => "Kode Etik Qtasnim", "division" => "HR"],
            ["no" => 4, "date_time" => "2024-12-04 11:10", "username" => "Jhon", "action" => "Upload", "document_name" => "Laporan Keuangan", "division" => "HR"],
            ["no" => 5, "date_time" => "2024-12-04 11:10", "username" => "Jessica", "action" => "Share", "document_name" => "Laporan Keuangan", "division" => "Finance"],
            ["no" => 6, "date_time" => "2024-12-04 11:20", "username" => "Lucky", "action" => "Read", "document_name" => "Kode Etik Qtasnim", "division" => "General"],
            ["no" => 7, "date_time" => "2024-12-04 11:22", "username" => "Lucky", "action" => "Download", "document_name" => "Kode Etik Qtasnim", "division" => "General"],
            ["no" => 8, "date_time" => "2024-12-04 11:22", "username" => "Viko", "action" => "Read", "document_name" => "Laporan Keuangan", "division" => "Finance"],
            ["no" => 9, "date_time" => "2024-12-04 11:22", "username" => "Viko", "action" => "Download", "document_name" => "Laporan Keuangan", "division" => "Finance"],
        ];

        return view('UserActivity.user_activity', compact('activities'));
    }
}
