<div class="footer ">
    <div class="footer-hd ">
        <p>
        @if(config('links.LINKS'))
        @foreach(config('links.LINKS') as $k=>$v)
                    <a href="http://{{$v['lurl']}}">{{$v['lname']}}</a>&nbsp;&nbsp;&nbsp;&nbsp;
        @endforeach
        @endif
        <p>
    </div>
    <div class="footer-bd ">
        <p>
            {{config('dll.FOOTER')}}
        </p>
    </div>
</div>