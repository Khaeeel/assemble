<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HealthRecord;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $latestRecords = HealthRecord::latest()->take(10)->get();
        return view('dashboard', compact('latestRecords'));
    }

    public function dashboard()
    {
        $ageGroups = [
            '0-14' => DB::table('health_records')->whereBetween('age', [0, 14])->count(),
            '15-19' => DB::table('health_records')->whereBetween('age', [15, 19])->count(),
            '20-65' => DB::table('health_records')->whereBetween('age', [20, 64])->count(),
            '60+'   => DB::table('health_records')->where('age', '>=', 60)->count(),
        ];

        $genderCount = [
            'Male' => DB::table('health_records')->where('gender', 'Male')->count(),
            'Female' => DB::table('health_records')->where('gender', 'Female')->count(),
        ];

        $diagnoses = DB::table('health_records')
            ->select('diagnosis', DB::raw('count(*) as total'))
            ->groupBy('diagnosis')
            ->pluck('total', 'diagnosis');

        return view('dashboard', compact('ageGroups', 'genderCount', 'diagnoses'));
    }
    
}
