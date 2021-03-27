<ul>
        @foreach($songs as $s)
            <li>
                <a href="#" data-file="{{$s->url}}" class="song">{{ $s->title }}</a>  
                uploadé par <a href="/user/{{$s->user->id}}">{{$s->user->name}}</a>
                aimé par {{$s->votes}} personnes 
                @auth
                    @if(Auth::id() != $s->user->id)
                        @if(Auth::user()->IFollowThem->contains($s->user->id))
                            <a class="uppercase lien-dislike " href="/changeLike/{{$s->user->id}}">like</a>
                        @else
                            <a class="uppercase lien-like" href="/changeLike/{{$s->user->id}}">dislike</a>
                        @endif
                    @endif
                @endauth
            </li>
        @endforeach
</ul>
