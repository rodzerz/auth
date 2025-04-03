<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>
<body>
   

    {{-- Blade direktīva, kas tiek rādīta tikai autentificētiem lietotājiem --}}
    @auth
        <p>Sveiks {{ Auth::user()->first_name }}!</p>
    @endauth

    {{-- Blade direktīva, kas tiek rādīta viesiem (neautentificētiem lietotājiem) --}}
    @guest
        <p>Sveiks, viesi!</p>
    @endguest
</body>
</html>
