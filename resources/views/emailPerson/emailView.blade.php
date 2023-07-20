
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
        
    </style>

</head>
<body>

    <h1>Salam Dear:</h1>
    <p>Name: {{ $emailData['fullname'] }}</p>
    <p>Father Name: {{ $emailData['fathername'] }}</p>
    <p>{{ $emailData['phone'] }}</p>
    <p>{{ $emailData['email'] }}</p>
    <p>{{ $emailData['question'] }}</p>
    <p>{{ $emailData['answer'] ?? '' }}</p>
    <p>{{ $emailData['answerBy'] ?? ''}}</p>
    <p>{{ $emailData['questioned_at']}}</p>
    <p>{{ $emailData['answered_at'] ?? ''}}</p>

</body>
</html>
