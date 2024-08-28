<header>
    <h1>مدير الرواتب</h1>
    <nav>
        <a href="{{ url('/') }}">الرئيسية</a>
        <a href="{{route('salaries',['year' => $year])}}">عرض وإضافة بيانات الرواتب</a>
        <a href="{{ url('/add') }}"> إضافة بيانات الشهر للسنة</a>
        <a href="{{ route('view', ['year' => $year]) }}">عرض سجلات العمل</a>
    </nav>
</header>