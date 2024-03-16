<div class="row">
    <div class="col-lg-12 pagi pink mt-0 mb-4 col-md-12 col-12">
        <ul>
            @for($i=1; $i <= $facilities->total(); $i++)
                <li><a href="{{ url()->current().'&page='.$i; }}" {!! ($facilities->currentPage() == $i)? 'class="active"' : "" !!} href="#">{{ $i }}</a></li>
            @endfor
        </ul>
    </div>
</div>
