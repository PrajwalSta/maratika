<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact Form</title>
</head>
<body>
    <h1>Message From Website</h1>
    @for ($i = 1; $i < sizeof($details); $i++)
    @foreach($details[$i] as $key=>$value)
    <p>{{ $key }} : {{ $value }}</p>
    @endforeach


    @endfor
    






</body>
</html>
