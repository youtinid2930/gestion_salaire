@extends('layouts.app')

@section('title', 'الصفحة الرئيسية')

@section('content')
    <h2>مرحباً بكم في مدير الرواتب</h2>
    <p>اختر من القائمة لإضافة أو عرض سجلات الرواتب.</p>

    <!-- Summary Section -->
    <section>
        <h3>ملخص البيانات</h3>
        <table>
            <thead>
                <tr>
                    <th>مجموع أيام العمل</th>
                    <th>مجموع أيام عدم العمل</th>
                    <th>الراتب</th>
                    <th>المبلغ النهائي</th>
                    <th>المبلغ المستلم</th>
                    <th>المبلغ المتبقي</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $totalWorkDays }}</td>
                    <td>{{ $totalOffDays }}</td>
                    <td>{{ $fixed_salarie }}</td>
                    <td>{{ $finalAmount }}</td>
                    <td>{{ $amountReceived }}</td>
                    <td>{{ $remainingAmount }}</td>
                </tr>
            </tbody>
        </table>
    </section>
@endsection
