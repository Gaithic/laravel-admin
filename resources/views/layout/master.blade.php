<!DOCTYPE html>
<html lang="en">
<head>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>
            @isset($title)
                {{ $title }} | 
            @endisset
            {{ config('app.name') }}
        </title>
        <link href="{{ asset('/front/css/styles.css') }}" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link href="{{ asset('/front/css/main.css') }}" rel="stylesheet" />
     
        
    
    </head>
    <body>
    
	<div class="limiter">
        {{-- //use laravel Route::has('login function 
        to check the user is logged in or not') --}}
   
           @if (Route::has('login'))
                @if(Auth::check())
            
                    @include('layout.inc.header')
                    @include('layout.inc.message') 
                    @include('layout.inc.usernav')
                @else               
                    @include('layout.inc.message') 
                    @include('layout.inc.frontnav')

                    
                @endif
               
            @endif
            
           

            
            @yield('content')
            <div>


        
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
        <script type="text/javascript" src="{{ asset('js/my.js') }}">
        <script type="text/javascript">
            $(document).ready(function() {
            $('.ckeditor').ckeditor();
        });
        </script>

   




</body>
</html>