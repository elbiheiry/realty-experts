@php(
$x = 50
)
@foreach($members as $member)
    <div class="col-lg-3 col-md-6" data-aos="fade-down" data-aos-delay="{{$x}}">
        <div class="team_item">
            <div class="team_img">
                <img src="{{asset('storage/app/members/'.$member->image)}}">
                @if($member->link()->exists())
                    <ul class="team_social">
                        <li><i class="fa fa-plus"></i></li>
                        @if($member->link['linkedin'])
                            <li>
                                <a href="{{$member->link['linkedin']}}">
                                    <i class="fab fa-linkedin"></i>
                                </a>
                            </li>
                        @endif
                        @if($member->link['facebook'])
                            <li>
                                <a href="{{$member->link['facebook']}}">
                                    <i class="fab fa-facebook"></i>
                                </a>
                            </li>
                        @endif
                        @if($member->link['twitter'])
                            <li>
                                <a href="{{$member->link['twitter']}}">
                                    <i class="fab fa-twitter"></i>
                                </a>
                            </li>
                        @endif
                        @if($member->link['instagram'])
                            <li>
                                <a href="{{$member->link['instagram']}}">
                                    <i class="fab fa-instagram"></i>
                                </a>
                            </li>
                        @endif
                    </ul>
                @endif
            </div><!--End Team Img-->
            <div class="team_cont">
                <h3> {{$member->translations->first()->name}} </h3>
                <p> {{$member->translations->first()->position}} </p>
            </div><!--End Team Cont-->
        </div><!--End Team Iteam-->
    </div><!--End Col-->
    @php(
    $x = $x+50
    )
@endforeach