@extends('layouts.app')

@section('title', 'عرض وإضافة بيانات الرواتب')

@section('content')
<div class="box">

    <header>
        <h1>عرض وإضافة بيانات الرواتب للسنة {{ $year }}</h1>
    </header>

    <!-- Form to Add New Salary -->
    <section>
        <h2>إضافة سجل راتب جديد</h2>
        <form method="post" action="{{ url('/save-salary') }}">
            @csrf

            <label for="year">السنة:</label>
            <input type="number" name="year" value="{{ $year }}" readonly>

            <label for="month">الشهر:</label>
            <select name="month" required>
                <option value="">- اختر الشهر -</option>
                @foreach ($months as $month)
                    <option value="{{ $month['month'] }}">{{ $month['month'] }}</option>
                @endforeach
            </select>

            <label for="salary_amount">مبلغ الراتب:</label>
            <input type="number" name="salary_amount" required>

            <button type="submit">حفظ سجل الراتب</button>
        </form>
    </section>

    <!-- Display Existing Salary Records -->
    <section>
        <h2>سجلات الرواتب السابقة</h2>
        <table>
            <thead>
                <tr>
                    <th>الشهر</th>
                    <th>مبلغ الراتب</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($salaries as $record)
                        <tr>
                            <td>{{ $record['month'] }}</td>
                            <td>DH {{ $record['amount'] }}</td>
                        </tr>
                @empty
                    <tr>
                        <td colspan="2">لا توجد سجلات رواتب</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </section>
</div>
@endsection
