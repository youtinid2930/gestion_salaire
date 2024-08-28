<?php

namespace App\Http\Controllers;

use App\Services\DataService;
use Illuminate\Http\Request;

class DataController extends Controller
{
    protected $dataService;

    public function __construct(DataService $dataService)
    {
        $this->dataService = $dataService;
    }

    public function showAddForm()
    {
        $year = date('Y');
        $months = $this->dataService->getMonthsByYear($year);
        return view('add_data', [
            'year' => $year,
            'months' => $months,
        ]);
    }

    public function save(Request $request)
    {
        $year = $request->input('year');
        $monthName = $request->input('month');
        $offDays = $request->input('off_days');

        $this->dataService->saveData($year, $monthName, $offDays);

        return redirect('/add')->with('success', 'Data saved successfully!');
    }

    public function getDaysInMonthAjax(Request $request)
{
    $year = $request->input('year');
    $month = $request->input('month');
    $daysInMonth = $this->dataService->getDaysInMonth($year, $month);

    return response()->json(['days_in_month' => $daysInMonth]);
}

public function show($year = null)
    {
        $year = $year ?: date('Y'); // or any specific year you want
        $months = $this->dataService->getMonthsByYear($year);

        return view('view', [
            'year' => $year,
            'months' => $months,
        ]);
    }
    public function showSalaries($year = null)
    {
        $year = $year ?: date('Y'); // Use current year if not provided
        $months = $this->dataService->getMonthsByYear($year);
        $salaries = $this->dataService->getSalariesByYear($year); // Fetch existing salaries
        return view('salaries', [
            'year' => $year,
            'months' => $months,
            'salaries' => $salaries,
        ]);
    }

    // Save a new salary record
    public function saveSalary(Request $request)
    {
        $request->validate([
            'year' => 'required|integer',
            'month' => 'required|string',
            'salary_amount' => 'required|numeric',
        ]);

        $year = $request->input('year');
        $month = $request->input('month');
        $salaryAmount = $request->input('salary_amount');

        $this->dataService->saveSalary($year, $month, $salaryAmount);

        return redirect()->route('salaries', ['year' => $year])->with('success', 'Salary record saved successfully!');
    }
}

