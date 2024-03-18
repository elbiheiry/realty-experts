@php(
$x = 50
)
@foreach($partners as $partner)
    <div class="col-lg-3 col-md-4 col-sm-6" data-aos="fade-down" data-aos-delay="{{$x}}">
        <div class="partner_item shadow">
            <img src="{{asset('storage/app/partners/'.$partner->image)}}">
        </div>
    </div>
    @php(
    $x = $x+50
    )
@endforeach