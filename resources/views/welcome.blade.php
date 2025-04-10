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
    <p>Sveiks, {{ Auth::user()->first_name }}!</p>

    <!-- Logout forma -->
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit">Logout</button>
    </form>
    @endauth

    {{-- Blade direktīva, kas tiek rādīta viesiem (neautentificētiem lietotājiem) --}}
    @guest
    <p>Sveiks, viesi! Lūdzu, pieslēdzieties vai registrejaties, lai turpinātu.</p>
    <a href="{{ route('login.create') }}">Pierakstīšanās</a> <!-- Saiti uz login formu -->
    <a href="/register">Registresanas</a> <!-- Saiti uz login formu -->
    @endguest

</body>

</html>