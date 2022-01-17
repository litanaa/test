<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">

    <title>
      @yield('titulo')
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://kit.fontawesome.com/61e275e2c2.js" crossorigin="anonymous"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <style>

    </style>


    @yield('style')

  </head>


  <body>


        <header>

        @include('partials.header')

        </header>


        <main>

        @if ( session ('datos') )
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('datos') }}
        </div>
      @endif

      @if ( session ('cancelar') )
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('cancelar') }}
        </div>
      @endif


      @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
                  <li>{{$error}}</li>
              @endforeach
            </ul>
        </div>
      @endif


        @yield('content')

        </main>


        <footer>

        @include('partials.footer')

        </footer>

        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


        <script>
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')     
                }
            }); 
        </script>
       

  </body>
</html>