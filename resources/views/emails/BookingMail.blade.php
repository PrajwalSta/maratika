<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Booking Tour Package</title>
</head>
<body>
    <h1>Booking Message from OffroadNepal</h1>
    <h4>Travel Details:</h4>
    
    <p>Destination Name:{{$traveldetails['DestinationName']}}</p>
    <p>Arrival Date:{{$traveldetails['ArrivalDate']}}</p>
    <p>Departure Date: {{$traveldetails['DepartureDate']}}</p>
    <p>No. of Persons: {{$traveldetails['No.of.persons']}}</p>
    <h4>Personal Details:</h4>
    @foreach ($det as $det)
        
        <p>Name:{{$det['Name']}}</p>
        <p>Age:{{$det['Age']}}</p>
        <p>Email:{{$det['Email']}}</p>
        <p>Phone Number:{{$det['Phone']}}</p>
        <p>Country:{{$det['Country']}}</p>
        <p>City:{{$det['City']}}</p>
        <p>Travel Requirements :{{$det['Description']}}</p>
 
    @endforeach
   
    
</body>
</html>