@extends('layouts.template')

@section('contenu')

    <h1>Utilisateur</h1>
    <ul>  
    @foreach($users as $u)
        
            <li><a href="/users/{{$u->id}}">{{$u->name}}</a></li>
       
    @endforeach
    </ul>
    <h1>Chansons</h1>
    
    @include('partials._songs')

 
    
@endsection