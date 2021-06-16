@extends('comet.layouts.app.app')
@section('comet-content')
<section>
    <div class="container">
      <div class="row">
        <div class="col-md-8">
          <div class="blog-posts">


            @foreach ($allpostdata as $postdata)


                @php
                    $featured = json_decode($postdata -> featured);
                @endphp

                <article class="post-single">
                    <div class="post-info">
                    <h2><a href="#">{{ $postdata -> name }}</a></h2>
                    <h6 class="upper"><span>By</span><a href="#"> {{ $postdata -> user -> name }}</a><span class="dot"></span><span>{{ date('d  M ,y' , strtotime($postdata ->created_at)) }} </span><span class="dot"></span>
                        @foreach ($postdata -> tags as $tags)
                            <a href="#" class="post-tag">{{ $tags -> name }}</a>
                        @endforeach

                    </h6>
                    </div>

                    @if ( $featured -> post_type == 'Image')
                        <div class="post-media">
                            <a href="#">
                                <img src="{{ URL::to('')}}/backend/assets/img/blog/post/{{ $featured -> single }}" alt="">
                            </a>
                        </div>
                    @endif

                    @if ( $featured -> post_type == 'Gallery')
                        <div class="post-media">
                            <div data-options="{&quot;animation&quot;: &quot;slide&quot;, &quot;controlNav&quot;: true" class="flexslider nav-outside">
                            <ul class="slides">
                                @foreach ($featured -> gallery as $gallimg)
                                <li>
                                    <img src="{{ URL::to('')}}/backend/assets/img/blog/post/{{ $gallimg  }}" alt="">
                                </li>

                                @endforeach

                            </ul>
                            </div>
                        </div>
                    @endif


                    <div class="post-body">
                        {!! Str::of(htmlspecialchars_decode($postdata -> content  )) -> words(30) !!}

                    <p><a href="#" class="btn btn-color btn-sm">Read More</a>
                    </p>
                    </div>
                </article>
            @endforeach






            <!-- end of article-->
          </div>

            {{ $allpostdata -> links('comet.layouts.app.paginate') }}


          <!-- end of pagination-->
        </div>

        @include('comet.layouts.app.sidebar')

      </div>
      <!-- end of row-->
    </div>
    <!-- end of container-->
  </section>
@endsection


