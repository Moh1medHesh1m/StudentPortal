@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="bootstrap-4.1.3-dist/css/bootstrap.min.css">
<script src="https://use.fontawesome.com/releases/v5.5.0/js/all.js"></script>

<style>
    body {
        font-family: sans-serif;
        margin: 10;
        background: linear-gradient(100deg, #2980b9, #8e44ad);


    }

    .card-deck {
        margin: 10%;
        width: 100%;
    }

    h1 {
        text-align: center;
    }

    /* .card-img-top{
       width: 50%;
       height: 50%;
       
     } */


    <style>.card {
        border: none;
        padding: 10px 50px;
    }

    .navbar-light .navbar-brand {
        color: white;
    }

    .card::after {
        position: absolute;
        z-index: -1;
        opacity: 0;
        -webkit-transition: all 0.6s cubic-bezier(0.165, 0.84, 0.44, 1);
        transition: all 0.6s cubic-bezier(0.165, 0.84, 0.44, 1);
    }

    .card:hover {


        transform: scale(1.02, 1.02);
        -webkit-transform: scale(1.02, 1.02);
        backface-visibility: hidden;
        will-change: transform;
        box-shadow: 0 1rem 3rem rgba(0, 0, 0, .75) !important;
    }

    .card:hover::after {
        opacity: 1;
    }

    .card:hover .btn-outline-primary {
        color: white;
        background: #007bff;
    }

    .navbar {
        visibility: hidden;
    }
</style>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<div class="container">
    <section>
        <div>
            <b-jumbotron header="BootstrapVue" lead="Bootstrap v4 Components for Vue.js 2">
                <h1 style="margin:0 auto ;color:white">Welcome {{ session('username') }}</h1>
                {{-- <h1 style="margin:0 auto ;color:white">Courses for {{ $user->year }}</h1> --}}

                <b-button variant="primary" href="#"></b-button>
            </b-jumbotron>
        </div>
    </section>



    <section>
        @foreach ($videos as $video)

        <div class="card-deck">
            <div class="card">
                <img src="/course_image/{{$video->course_images}}" class="card-img-top" alt="..." style="width: :10em ;height:40em">
                <div class="card-body">
                    <h5 class="card-title">{{ $video->title }}</h5>
                    <p class="card-text">{{ $video->description }}</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    <a href="{{ url('videos/' . $video->id) }}"> <button type="button" class="btn btn-primary btn-lg" style="margin:0 auto,justify-content: center;  
                    ">View Course</button>
                    </a>

                </div>
            </div>


        </div>
        @endforeach

    </section>




    {{-- <section>
    






    
  {{-- <div>
      {{-- @foreach ($videos as $video)
          
  <b-card-group deck>
    <b-card title={{$video['title']}} img-src="https://picsum.photos/400/400/?image=41" img-alt="Image" img-top >
    <b-card-text>
        {{$video['description']}}
    </b-card-text>
    <template #footer>
        <small class="text-muted">Last updated 3 mins ago</small>
    </template>
    <a href="{{url('videos/'.$video['id'])}}"> <button type="button" class="btn btn-primary btn-lg" style="margin:0 auto,justify-content: center;  
      ">View Course</button>
    </a>

    </b-card>
    @endforeach --}}


    {{-- </section> --}}





    <div class="container-fluid" style="background: linear-gradient(90deg, #00C9FF 0%, #92FE9D 100%);">
        <div class="container p-5">
            <div class="row">
                <div class="col-lg-4 col-md-12 mb-4">
                    <div class="card h-100 shadow-lg">
                        <div class="card-body">
                            <div class="text-center p-3">
                                <h5 class="card-title">Basic</h5>
                                <small>Individual</small>
                                <br><br>
                                <span class="h2">$8</span>/month
                                <br><br>
                            </div>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                                the card's content.</p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                                    <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z" />
                                </svg> Cras justo odio</li>
                            <li class="list-group-item"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                                    <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z" />
                                </svg> Dapibus ac facilisis in</li>
                            <li class="list-group-item"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                                    <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z" />
                                </svg> Vestibulum at eros</li>
                        </ul>
                        <div class="card-body text-center">
                            <button class="btn btn-outline-primary btn-lg" style="border-radius:30px">Select</button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 mb-4">
                    <div class="card h-100 shadow-lg">
                        <div class="card-body">
                            <div class="text-center p-3">
                                <h5 class="card-title">Standard</h5>
                                <small>Small Business</small>
                                <br><br>
                                <span class="h2">$20</span>/month
                                <br><br>
                            </div>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                                the card's content.</p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                                    <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z" />
                                </svg> Cras justo odio</li>
                            <li class="list-group-item"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                                    <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z" />
                                </svg> Dapibus ac facilisis in</li>
                            <li class="list-group-item"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                                    <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z" />
                                </svg> Vestibulum at eros</li>
                        </ul>
                        <div class="card-body text-center">
                            <button class="btn btn-outline-primary btn-lg" style="border-radius:30px">Select</button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 mb-4">
                    <div class="card h-100 shadow-lg">
                        <div class="card-body">
                            <div class="text-center p-3">
                                <h5 class="card-title">Premium</h5>
                                <small>Large Companies</small>
                                <br><br>
                                <span class="h2">$40</span>/month
                                <br><br>
                            </div>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                                the card's content.</p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                                    <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z" />
                                </svg> Cras justo odio</li>
                            <li class="list-group-item"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                                    <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z" />
                                </svg> Dapibus ac facilisis in</li>
                            <li class="list-group-item"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                                    <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z" />
                                </svg> Vestibulum at eros</li>
                        </ul>
                        <div class="card-body text-center">
                            <button class="btn btn-outline-primary btn-lg" style="border-radius:30px">Select</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer>
            <div class="container">
                <div class="row row-footer">
                    <div class="col-md-10 col-sm-6 col-xs-12">
                        <p> © Copyright 2020 | by |All Rights Reserved |</p>
                    </div>
                    <div class="col-md-2 col-sm-6 col-xs-12">
                        <div class="foot-social">
                            <i class="fab fa-facebook-square fa-3x"></i>

                            <i class="fab fa-twitter-square fa-3x"></i>
                            <i class="fab fa-instagram fa-3x"></i>
                            <div class="up up-opa"></div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        </body>



        <section>
            <pricing> </pricing>
        </section>

    </div>

    @endsection