<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SalaryController extends Controller
{
    public function index()
    {
        $jsonData = json_decode(file_get_contents(storage_path('app/data.json')), true);
        $year = date('Y');
        $salaries = $jsonData['salaries'][$year] ?? [];
        $months = $jsonData['year_months'][$year] ?? [];

        $totalWorkDays = 0;
        $totalOffDays = 0;
        $finalAmount = 0;
        $amountReceived = 0;

        foreach ($months as $month) {
            $totalWorkDays += (int)$month['work_days'];
            $totalOffDays += (int)$month['off_days'];
        }

        foreach ($salaries as $salary) {
            $amountReceived += (int)$salary['amount'];
        }
        $fixed_salarie = 70;
        $finalAmount = $totalWorkDays * $fixed_salarie;

        $remainingAmount = $finalAmount - $amountReceived;


        return view('index', compact('year','fixed_salarie','totalWorkDays', 'totalOffDays', 'salaries', 'finalAmount', 'amountReceived', 'remainingAmount'));
    }

    public function create()
    {
        return view('form');
    }

    public function store(Request $request)
    {
        $filePath = storage_path('app/data.json');
        $data = file_exists($filePath) ? json_decode(file_get_contents($filePath), true) : [];

        $data[] = [
            'base_salary' => $request->input('base_salary'),
            'bonus' => $request->input('bonus'),
            'deductions' => $request->input('deductions'),
            'total_salary' => $request->input('base_salary') + $request->input('bonus') - $request->input('deductions'),
            'year' => $request->input('year'),
            'month' => $request->input('month')
        ];

        file_put_contents($filePath, json_encode($data));

        return redirect('/view');
    }

    public function show()
    {
        $filePath = storage_path('app/data.json');
        $data = file_exists($filePath) ? json_decode(file_get_contents($filePath), true) : [];

        return view('view', ['salaries' => $data]);
    }
}

