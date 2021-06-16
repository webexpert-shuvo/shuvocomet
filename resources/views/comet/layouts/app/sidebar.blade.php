
        <div class="col-md-3 col-md-offset-1">
            <div class="sidebar hidden-sm hidden-xs">
              <div class="widget">
                <h6 class="upper">Search blog</h6>
                <form>
                  <input type="text" placeholder="Search.." class="form-control">
                </form>
              </div>
              <!-- end of widget        -->
              <div class="widget">
                <h6 class="upper">Categories</h6>
                <ul class="nav">

                    @php
                        $categories  =  App\Models\Category::where('status' , 'Active')->latest()->get();
                    @endphp

                    @foreach ($categories as $cats)
                         <li><a href="#">{{ $cats -> name }}</a></li>
                    @endforeach




                </ul>
              </div>
              <!-- end of widget        -->
              <div class="widget">
                <h6 class="upper">Popular Tags</h6>
                <div class="tags clearfix">

                    @php
                    $tagsss  =  App\Models\Tag::where('status' , 'Active')->latest()->get();
                    @endphp

                    @foreach ($tagsss as $tags)
                        <a href="#">{{ $tags -> name }}</a>
                    @endforeach

                </div>
              </div>
              <!-- end of widget      -->
              <div class="widget">
                <h6 class="upper">Latest Posts</h6>
                <ul class="nav">

                    @php
                     $postsdata  =  App\Models\Post::where('status' , 'Active')-> take(5)->latest()->get();
                    @endphp

                    @foreach ($postsdata as $posts)
                        <li><a href="{{ $posts -> slug }}">{{ $posts -> name }}<i class="ti-arrow-right"></i><span>{{ date('d M , Y' ,  strtotime($posts -> created_at) ) }}</span></a></li>
                    @endforeach







                </ul>
              </div>
              <!-- end of widget          -->
            </div>
            <!-- end of sidebar-->
          </div>
