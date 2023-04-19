<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Eventos</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- Styles -->
        <style>
            #creador{
                border-radius: 5px;
            }
            .card{
                box-shadow: 0 0 10px #fff;
                border: 1px solid rgb(0 0 0 / 15%);
            }
            .nav-masthead .nav-link {
                color: black;
                border-bottom: .35rem solid transparent;
            }

            .nav-masthead .nav-link:hover,
            .nav-masthead .nav-link:focus {
                border-bottom-color: rgba(255, 255, 255, .50);
            }

            .nav-masthead .nav-link + .nav-link {
                margin-left: 1rem;
            }

            .nav-masthead .active {
                color: #fff;
                border-bottom-color: #fff;
            }
            .container2{
                width: 75%;
                margin: auto;
            }
            .contentEvent {
                height: 100px;
                margin-bottom: 16px;
                overflow: hidden;
            }

            .contentEvent.expanded {
                height: auto; 
            }

            .card-title{
                height: 50px;
            }
            .delete-form{
                display: none;
            }
            #formulario-eliminar {
                position: fixed;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                z-index: 1;

            }

            </style>
    </head>
        @extends('layouts.app')
        @if($errors->has('error'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <i class="fa"></i><span><b>{{ $errors->first('error') }}</b></span>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        @if(session()->has('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fa"></i><span><b>{{ session()->get('message') }}</b></span>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif


</html>
