@extends('layouts.app')

@section('title', 'إضافة بيانات الشهر')

@section('content')

    <header>
        <h1>عرض شهور السنة {{ $year }}</h1>
    </header>
    
    <main>
        <table>
            <thead>
                <tr>
                    <th>الشهر</th>
                    <th>عدد الأيام</th>
                    <th>أيام العمل</th>
                    <th>أيام عدم العمل</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($months as $month)
                    <tr>
                        <td>{{ $month['month'] }}</td>
                        <td>{{ $month['days_in_month'] }}</td>
                        <td>{{ $month['work_days'] ?? '0' }}</td>
                        <td>{{ $month['off_days'] ?? '0' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="pagination">
            @if ($year > date('Y') - 3) <!-- Ensure there's a previous year to navigate to -->
                <a href="{{ route('view', ['year' => $year - 1]) }}" class="btn">السنة السابقة</a>
            @endif
            @if ($year < date('Y') + 3)
            <a href="{{ route('view', ['year' => $year + 1]) }}" class="btn">السنة التالية</a>
            @endif
        </div>
    </main>


@endsection
