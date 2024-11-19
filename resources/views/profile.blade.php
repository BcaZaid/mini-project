<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="{{ route('home') }}">MyApp</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('profile') }}">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('tasks') }}">Tasks</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto"> 
                <li class="nav-item"> 
                    <form action="{{ route('logout') }}" method="POST"> 
                        @csrf 
                        <button type="submit" class="btn btn-outline-danger">Logout</button> 
                    </form> 
                </li> 
            </ul>
        </div>
    </nav>
    <div class="container mt-5">
        <h1>Your Profile</h1>
        @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
        @endif 
        <form action="{{ url('/profile') }}" method="POST">
            @csrf 
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}" required>
            </div> <div class="form-group"> <label for="email">Email</label> <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}" required> </div> <div class="form-group"> <label for="password">Password (leave blank if not changing)</label> <input type="password" name="password" id="password" class="form-control"> </div> <div class="form-group"> <label for="password_confirmation">Confirm Password</label> <input type="password" name="password_confirmation" id="password_confirmation" class="form-control"> </div> <button type="submit" class="btn btn-primary">Update Profile</button> </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
