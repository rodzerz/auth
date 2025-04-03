<!-- resources/views/auth/register.blade.php -->
<!DOCTYPE html>
<html lang="lv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reģistrācijas forma</title>
</head>
<body>
    <h1>Reģistrējieties</h1>

    <!-- Reģistrācijas forma -->
    <form action="{{ route('register.store') }}" method="POST">
        @csrf
        @if ($errors->any())
  <ul>
    @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
  </ul>
@endif

        <!-- First Name -->
        <label for="first_name">Vārds:</label>
        <input type="text" name="first_name" id="first_name" required><br>

        <!-- Last Name -->
        <label for="last_name">Uzvārds:</label>
        <input type="text" name="last_name" id="last_name" required><br>

        <!-- Email -->
        <label for="email">E-pasts:</label>
        <input type="email" name="email" id="email" required><br>

        <!-- Password -->
        <label for="password">Parole:</label>
        <input type="password" name="password" id="password" required><br>

    <!-- Confirm Password -->
    <label for="password_confirmation">Apstipriniet paroli:</label>
    <input type="password" name="password_confirmation" id="password_confirmation" required><br>
        <!-- Submit Button -->
        <button type="submit">Reģistrēties</button>
    </form>
</body>
</html>
