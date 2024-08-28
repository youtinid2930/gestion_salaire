@extends('layouts.app')

@section('title', 'إضافة سجل راتب')

@section('content')
    <h2>إضافة سجل راتب</h2>
    <form method="post" action="{{ url('/add') }}">
        @csrf
        <label for="base_salary">الراتب الأساسي:</label>
        <input type="number" name="base_salary" step="0.01" required><br>
        <label for="bonus">المكافآت:</label>
        <input type="number" name="bonus" step="0.01" value="0"><br>
        <label for="deductions">الخصومات:</label>
        <input type="number" name="deductions" step="0.01" value="0"><br>
        <label for="year">السنة:</label>
        <input type="number" name="year" value="{{ date('Y') }}" required><br>
        <label for="month">الشهر:</label>
        <input type="number" name="month" min="1" max="12" required><br>
        <input type="submit" value="إضافة راتب">
    </form>
@endsection

إضافة سجل راتب
إضافة
