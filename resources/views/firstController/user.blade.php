@extends('layouts.template')



@section('contenu')
    <div class="user">
        <h1 class="uppercase">{{$user->name}}</h1>
        @auth
            @if(Auth::id() != $user->id)
                @if(Auth::user()->IFollowThem->contains($user->id))
                    <a class="uppercase lien-unfollow " href="/changeFollow/{{$user->id}}">Abonné</a>
                @else
                    <a class="uppercase lien-follow" href="/changeFollow/{{$user->id}}">S'abonner</a>
                @endif
            @endif
        @endauth
    </div>
    

  
    <p>{{$user->name}} possédent {{$user->songs()->count()}} chansons</p>
    <p>suivi par {{$user->TheyFollowMe()->count()}} personnes et il suit {{$user->IFollowThem()->count()}} personnes</p>
    @include("partials._songs", ["songs" => $user->songs])

@endsection
