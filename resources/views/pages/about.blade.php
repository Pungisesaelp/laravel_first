@extends('app')
@section('content')
    <h1>About</h1>
    @if(count($people))
    <h3>People  I like</h3>
    <ul>

        @foreach($people as $person)
            <li>{{$person}}</li>
        @endforeach
    </ul>
    @endif
    <p>Bla bla bla bla bla bla bla bla bla bla bla <br>
        bla bla bla bla bla bla bla bla bla bla bla bla b <br>
        la bla bla bla bla bla bla bla bla bla bla bla bla <br>
        bla bla bla bla bla bla bla bla bla bla bla bla <br>
        bla bla bla bla bla <br>
        bla bla bla bla bla bla bla bla bla bla </p>
    </body>
    </html>
@stop