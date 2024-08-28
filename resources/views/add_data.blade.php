<!-- resources/views/add_data.blade.php -->

@extends('layouts.app')

@section('title', 'إضافة بيانات الشهر')

@section('content')
<diV class="box">

    <h2>إدخال بيانات الشهر للسنة</h2>

    <form method="post" action="{{ url('/save') }}">

        @csrf

        <label for="year">السنة:</label>

        <input type="number" name="year" value="{{ $year }}" required><br><br>

        <label for="month">الشهر:</label>

        <select name="month" required>
            <option value="">--اختر الشهر--</option>
            @foreach ($months as $month)
                <option value="{{ $month['month'] }}">{{ $month['month'] }}</option>
            @endforeach
        </select><br><br>

        <label for="days_in_month">أيام الشهر:</label>

        <input type="number" name="days_in_month" id="days_in_month" readonly><br><br>

        <label for="off_days">أيام عدم العمل:</label>

        <input type="number" name="off_days" required><br><br>

        <button type="submit">حفظ البيانات</button>

    </form>

    <script>
        document.querySelector('select[name="month"]').addEventListener('change', function() {
            var month = this.value;
            var year = document.querySelector('input[name="year"]').value;

            fetch(`/get-days-in-month?year=${year}&month=${month}`)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('days_in_month').value = data.days_in_month;
                });
        });
    </script>
</div>
@endsection
