<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Booking Tour Package</title>
</head>
<body>
    <h1>Booking Message from Maratika</h1>
    <h4> Details:</h4>
     <?php $room_type=App\Model\offroadTour::where('id',$booking->room_id)->first()->title; ?>
    <p>Room Type:{{$room_type}}</p>
    <p>No. of Persons: {{$booking->number_of_person}}</p>
    <p>Booking Date:{{$booking->date}}</p>
    <p>Total Price:Rs {{$booking->total}}</p>
    <p>Payment_Status:{{$booking->payment_mode}}</p>
    <h4>Personal Details:</h4>
        <p>Name:{{ $booking->full_name }}</p>
        <p>Email: {{ $booking->email}}</p>
        <p>Contact Number:{{ $booking->contact}}</p>
        <p>Country:{{ $booking->country}}</p>
        <p>City:{{$booking->city}}</p>
        <p>Additional Information :{{$booking->add_info}}</p>

</body>
</html>
