@php
    $x = 50;
@endphp
@foreach($projects as $project)
    <div class="col-lg-4 col-md-6" data-aos="fade-down" data-aos-delay="{{$x}}">
        <div class="proj-item">
            <div class="proj-cover">
                <img src="{{asset('storage/app/projects/'.$project->image)}}">
                <a href="{{route('site.project',['slug' => $project->slug])}}" class="hover">
                    <i class="fa fa-link"></i>
                </a>
            </div>
            <div class="proj-cont">
                <a href="{{route('site.project',['slug' => $project->slug])}}"> {{$project->translations->first()->name}}</a>
                <ul>
                    <li>
                        <i class="fa fa-map-marker"></i> {{$project->region->translate(app()->getLocale())->name}}
                    </li>
                    <li>
                        <i class="fa fa-tag"></i> {{$project->category->translate(app()->getLocale())->name}}
                    </li>
                </ul>
            </div>
        </div><!--End PRoj Item-->
    </div><!--End col-->
    @php(
        $x = $x + 50
    )
@endforeach