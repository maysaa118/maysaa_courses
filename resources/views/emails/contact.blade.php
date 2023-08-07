<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    There is a new message from {{ $data ['name']}} as bellow :
    <br>
     Email: {{ $data['email'] }}
     <br>
      Phone: {{ $data['phone'] }}
    <br> 
    Message: {{ $data['message'] }}

</body>
</html>