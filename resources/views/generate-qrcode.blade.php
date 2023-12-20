<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Generate Qr Code</title>
</head>
<body>
    <h1>Generate Qr Code</h1>
    <form action="{{route('qrcode.result')}}" method="get" id="form-generate-qrcode">
        <input type="text" name="value">
        <button type="submit">Generate</button>
    </form>
</body>
</html>
