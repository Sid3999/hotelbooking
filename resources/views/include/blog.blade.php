  <!-- Blog Area Start -->
  <section class="roberto-blog-area section-padding-100-0">
      <div class="container">
          <div class="row">
              <!-- Section Heading -->
              <div class="col-12">
                  <div class="section-heading text-center wow fadeInUp" data-wow-delay="100ms">
                      <h6>Our Blog</h6>
                      <h2>Latest News &amp; Event</h2>
                  </div>
              </div>
          </div>

          <div class="row">
              <!-- Single Post Area -->
              @foreach ($news as $news)
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="single-post-area mb-100 wow fadeInUp" data-wow-delay="300ms">
                        <a href="{{url('news-details')}}/{{$news->id}}" class="post-thumbnail"><img src="{{asset('images/blogs')."/".$news->image}}" alt=""></a>
                        <!-- Post Meta -->
                        <div class="post-meta">
                            <a href="#" class="post-date">{{$news->created_at->format('F d, Y')}}</a>
                            <a href="#" class="post-catagory">News</a>
                        </div>
                        <!-- Post Title -->
                        <a href="{{url('news-details')}}/{{$news->id}}" class="post-title">{{$news->title}}</a>
                        {{Str::limit($news->description,200)}}
                        <a href="{{url('news-details')}}/{{$news->id}}" title="continue reading" class="btn continue-btn"><i class="fa fa-long-arrow-right"
                                aria-hidden="true"></i></a>
                    </div>
                </div>
               @endforeach
          </div>
      </div>
  </section>
  <!-- Blog Area End -->
  
