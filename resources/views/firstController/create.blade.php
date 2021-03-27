@extends('layouts.template')

@section('contenu')
    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>

    <body>
      
    @include('partials._errors')
    
        <form method="post" action="/songs" enctype="multipart/form-data" data-pjax>
            @csrf
            <input type="text" name='title' placeholder="Title of the song" value="{{old('title')}}" />
            <br />
            <input type="file" name='song' placeholder="URL of the song" />
            <br />
            <input type="submit"/>
        </form>
       
    </body>
@endsection
