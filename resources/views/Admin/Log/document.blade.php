 @extends('layouts.default')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document Tracking Search Bar</title>
    <!-- Add your CSS link here -->
    <style>
        .search-container {
            text-align: center;
            margin-top: 0px;
        }

        .search-box {
            padding: 30px;
            border: 1px solid #ccc;
            border-radius: 5px;
            width: 800px;
            margin-top: 100px;
            font-size: 20px;
        }

        .search-button {
            padding: 35px 60px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>

<div class="search-container">
    <form action="/search" method="GET">
        <input type="text" placeholder="Enter Transaction Code" name="search" class="search-box">
        <button type="submit" class="search-button">Search</button>
    </form>
</div>

</body>
</html>



      
@endsection

            