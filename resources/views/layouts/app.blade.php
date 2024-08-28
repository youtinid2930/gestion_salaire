<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'مدير الرواتب')</title>
    <style>
        body { font-family: 'Arial', sans-serif; direction: rtl; margin: 0; padding: 0; box-sizing: border-box; }
        header {
            background-color: #4CAF50;
            padding: 15px;
            text-align: center;
            color: white;
        }
        nav a {
            color: white;
            margin: 0 15px;
            text-decoration: none;
            font-weight: bold;
        }
        nav a:hover {
            text-decoration: underline;
        }
        .content {
            padding: 20px;
        }

        /* General Styles */
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f9;
    color: #333;
    margin: 0;
    padding: 0;
}

header {
    background-color: #007bff;
    color: #fff;
    padding: 10px 20px;
    text-align: center;
}

h1 {
    margin: 0;
    font-size: 1.5em;
}

main {
    padding: 20px;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

table th,
table td {
    padding: 12px;
    text-align: center;
    border: 1px solid #ddd;
}

table thead {
    background-color: #007bff;
    color: #fff;
}

table tbody tr:nth-child(even) {
    background-color: #f9f9f9;
}

table tbody tr:hover {
    background-color: #f1f1f1;
}

th {
    font-weight: bold;
}
.pagination {
            margin-top: 20px;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            margin: 0 5px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }
        .btn:hover {
            background-color: #0056b3;
        }
        .box {
    background: #f9f9f9;
    border-radius: 8px;
    padding: 20px;
    margin: 20px auto;
    max-width: 600px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.box h2 {
    margin-bottom: 20px;
    font-size: 24px;
    color: #333;
}

.box label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
}

.box input[type="number"],
.box select {
    width: 100%;
    padding: 8px;
    border: 1px solid #ddd;
    border-radius: 4px;
    box-sizing: border-box;
    margin-bottom: 20px;
}

.box input[readonly] {
    background-color: #f1f1f1;
}

.box button {
    display: inline-block;
    background-color: #007bff;
    color: white;
    border: none;
    padding: 10px 20px;
    font-size: 16px;
    cursor: pointer;
    border-radius: 4px;
    transition: background-color 0.3s;
}

.box button:hover {
    background-color: #0056b3;
}
    </style>
</head>
<body>
    @include('header')
    
    <div class="content">
        @yield('content')
    </div>
</body>
</html>
