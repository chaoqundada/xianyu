<ul>
    @if(\Illuminate\Support\Facades\DB::table('nav')->get())
        @foreach(\Illuminate\Support\Facades\DB::table('nav')->get() as $k=>$v)
            <li class="index"><a href="{{$v['nlink']}}">{{$v['ntitle']}}</a></li>
        @endforeach
    @endif
</ul>