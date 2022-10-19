@if(session('success'))
    <h1>{{session('success')}}</h1>
@endif

<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Books</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
      />
      <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@500&display=swap" rel="stylesheet">
    <style>
    h2 {
        font-size: 26px;
        text-align: center;
        color: white;
        margin-bottom: 30px;
    }
    
    
    header{
        background-color:black;
        display: flex;
        justify-content: center;
        color: black;
    }
    
    
    header #header-menu{
        list-style: none;
        padding: 10%;
        display: flex;
        gap: 30%;
    }
    
    
    header #header-menu li > a{
        text-decoration: none;
        color: white;
        transition: all 1s;
    }
    
    
    
    
    footer{
        background-color:black;
        display: flex;
        justify-content: center;
    }
    
    footer #social{
        list-style: none;
        padding: 1.5%;
        display: flex;
        gap: 10%;
    
    }
    
    footer #social li > a{
        text-decoration: none;
        color: #000000;
    }
    
    
    
    p {
        margin: 0;
        padding: 0;
        font-size: 20px;
    }</style>
    </head>
    <body>
    
        <header>
            <nav
              class="navbar navbar-expand-sm navbar-light"
              style="background-color: #fff"
            >
              <div class="container">
                {{-- <a href="/add"  class="btn btn-success p-2" style="margin-left: 4%;margin-top:2%">Add New Book</a> --}}
    
                <button
                  class="navbar-toggler d-lg-none"
                  type="button"
                  data-bs-toggle="collapse"
                  data-bs-target="#collapsibleNavId"
                  aria-controls="collapsibleNavId"
                  aria-expanded="false"
                  aria-label="Toggle navigation"
                >
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="collapsibleNavId">
            
                </div>
              </div>
            </nav>
          </header>

<main class="signup-form">
    <div class="cotainer">
    <div class="row justify-content-center">
    <div class="col-md-4">
    <div class="card">
    <h3 class="card-header text-center">Register User</h3>
    <div class="card-body">
    <form action="{{ route('register.custom') }}" method="POST">
    @csrf
    <div class="form-group mb-3">
    <input type="text" placeholder="Name" id="name" class="form-control" name="name"
    required autofocus>
    @if ($errors->has('name'))
    <span class="text-danger">{{ $errors->first('name') }}</span>
    @endif
    </div>
    <div class="form-group mb-3">
    <input type="text" placeholder="Email" id="email_address" class="form-control"
    name="email" required autofocus>
    @if ($errors->has('email'))
    <span class="text-danger">{{ $errors->first('email') }}</span>
    @endif
    </div>
    <div class="form-group mb-3">
    <input type="password" placeholder="Password" id="password" class="form-control"
    name="password" required>
    @if ($errors->has('password'))
    <span class="text-danger">{{ $errors->first('password') }}</span>
    @endif
    </div>
    <div class="form-group mb-3">
    <div class="checkbox">
    <label><input type="checkbox" name="remember"> Remember Me</label>
    </div>
    </div>
    <div class="d-grid mx-auto">
    <button type="submit" class="btn btn-dark btn-block">Sign up</button>
    </div>
    </form>
    </div>
    </div>
    </div>
    </div>
    </div>
    </main>