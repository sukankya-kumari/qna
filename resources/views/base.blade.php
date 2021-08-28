<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Q&A @yield('title')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
        @livewireStyles
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-success">
        <div class="container">
            <a href="" class="navbar-brand">Q&As</a>
            
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a href="{{route('home')}}" class="nav-link text-light">Home</a></li>
                @auth
                <li class="nav-item"><a href="" class="nav-link text-light">{{Auth::user()->name}}</a></li>
                <li class="nav-item">
                    <form action="{{route('logout')}}" method="POST">
                    @csrf
                    <input type="submit" value="Logout" class="btn-danger btn">
                </form>
                </li>
                @endauth
                @guest
                <li class="nav-item"><a href="{{route('login')}}" class="nav-link text-light">login</a></li>
                <li class="nav-item"><a href="{{route('register')}}" class="nav-link text-light">register</a></li>
                
                    
                @endguest
              
                <li class="nav-item"><a href="/insertQ" class="nav-link text-light">add your ans</a></li>
                <li class="nav-item"><a href="#Modal" class="btn btn-primary" data-bs-toggle="modal">
                        <i class="bi bi-plus-lg"></i>
                    </a></li>
            </ul>
        </div>
    </nav>
<div class="row">
    <div class="col-lg-6">
       
            <div class="modal fade" id="Modal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Add Questions</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{route('insert')}}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="">Question</label>
                                    <input type="text" name="title" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <select name="user_id" class="form-control">
                                        @foreach ($users as $c)
                                        <option value="{{$c->id}}">{{$c->name}}</option>
                                        @endforeach
                                    </select>
                                   
                                </div>
                                <div class="mb-3">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">create</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    
    </div>
</div>

@livewireScripts
@yield('content')

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous">
    </script>
</body>

</html>
