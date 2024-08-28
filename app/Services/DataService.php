<?php
// app/Services/DataService.php

namespace App\Services;

use Illuminate\Support\Facades\Storage;

class DataService
{
    protected $data;

    public function __construct()
    {
        // Ensure the data file exists and has content
        $this->initializeDataFile();

        $this->data = json_decode(Storage::get('data.json'), true);


        $this->initializeYears();
    }

    protected function initializeDataFile()
    {
        if (!Storage::exists('data.json')) {
            Storage::put('data.json', json_encode(['year_months' => [],'salaries' => []], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
        }
    }

    public function getMonthsByYear($year)
    {
        if (!isset($this->data['year_months'][$year])) {
            $this->initializeYear($year);
        }
        return $this->data['year_months'][$year];
    }

    public function getDaysInMonth($year, $monthName)
    {
        $months = $this->getMonthsByYear($year);
        foreach ($months as $month) {
            if ($month['month'] === $monthName) {
                return $month['days_in_month'];
            }
        }
        return null;
    }
    public function getSalariesByYear($year)
    {
        return $this->data['salaries'][$year] ?? [];
    }

    public function saveSalary($year, $month, $amount)
    {
        $this->data['salaries'][$year][] = [
            'month' => $month,
            'amount' => $amount
        ];

        Storage::put('data.json', json_encode($this->data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    }

    protected function initializeYears()
    {
        $currentYear = date('Y');

        // Example: Initialize data for the last 10 years
        for ($year = $currentYear - 3; $year <= $currentYear; $year++) {
            if (!isset($this->data['year_months'][$year])) {
                $this->initializeYear($year);
            }
        }

        for ($year = $currentYear; $year <= $currentYear + 3; $year++) {
            if (!isset($this->data['year_months'][$year])) {
                $this->initializeYear($year);
            }
        }
    }
    protected function initializeYear($year)
{
    $monthNames = [
        'يناير', 'فبراير', 'مارس', 'أبريل', 'مايو', 'يونيو',
        'يوليو', 'أغسطس', 'سبتمبر', 'أكتوبر', 'نوفمبر', 'ديسمبر'
    ];

    $this->data['year_months'][$year] = array_map(function ($monthName) use ($monthNames, $year) {
        return [
            'month' => $monthName,
            'days_in_month' => cal_days_in_month(CAL_GREGORIAN, array_search($monthName, $monthNames) + 1, $year),
            'work_days' => '0',  // Default value
            'off_days' => '0'    // Default value
        ];
    }, $monthNames);

    Storage::put('data.json', json_encode($this->data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
}

    public function saveData($year, $monthName, $offDays)
    {
        $this->initializeYears();

        foreach ($this->data['year_months'][$year] as &$month) {
            if ($month['month'] === $monthName) {
                $month['off_days'] = $offDays;
                $month['work_days'] = $month['days_in_month'] - $offDays;
                break;
            }
        }

        Storage::put('data.json', json_encode($this->data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    }

}
