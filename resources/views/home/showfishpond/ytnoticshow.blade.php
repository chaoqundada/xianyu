@extends('home.layout.showfishpond')
@section('content')
    <div class="queslist  col-md-8 col-md-offset-2" >
        <article class="media">
            <div class="media-body" style="margin-bottom: 40px">
                <h1 class=" p-head">{{$ytnotic['title']}}</h1>
                <br>
                {!! $ytnotic['content'] !!}
            </div>
        </article>
    </div>

@endsection