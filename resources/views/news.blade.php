
@extends('layouts.theme')
@section('title', 'Blog Details')
@section('content')
    @include('include/navbar')
    @include('include/breadcrumb',['page'=>$page])
 
    <!-- Blog Area Start -->
    <div class="roberto-news-area section-padding-100-0">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-8">
                    <!-- Single Blog Post Area -->
                  @foreach($blogs as $blog)

                    <!-- Single Blog Post Area -->
                    <div class="single-blog-post d-flex align-items-center mb-50 wow fadeInUp" data-wow-delay="500ms">
                        <!-- Post Thumbnail -->
                        <div class="post-thumbnail">
                            <a href="#"><img src="{{asset('/images/blogs/'.$blog->image)}}" alt=""></a>
                        </div>
                        <!-- Post Content -->
                        <div class="post-content">
                            <!-- Post Meta -->
                            <div class="post-meta">
                                <a href="#" class="post-author">{{$blog['created_at']->diffForHumans()}}</a>
                                <a href="#" class="post-tutorial">Event</a>
                            </div>
                            <!-- Post Title -->
                            <a href="#" class="post-title">{{$blog->title}}</a>
                            <p>{!! \Illuminate\support\str::words($blog->description  , 100 ) !!}
                            </p>
                            <a href="{{route('single-blog' , $blog)}}" class="btn continue-btn">Read More</a>
                        </div>
                    </div>
                    @endforeach

                    <!-- Pagination -->
                    <nav class="roberto-pagination wow fadeInUp mb-100" data-wow-delay="600ms" style="display: none">
                        <ul class="pagination">
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">Next <i class="fa fa-angle-right"></i></a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="col-12" style="display: none">
                    <button class="btn btn-primary click-me">click</button>
                    <div class="data-div">

                    </div>
                </div>
                <div class="col-12 col-sm-8 col-md-6 col-lg-4">
                    <div class="roberto-sidebar-area pl-md-4">

                        <!-- Newsletter -->
                        <div class="single-widget-area mb-100">
                            <div class="newsletter-form">
                                <h5>Newsletter</h5>
                                <p>Subscribe our newsletter gor get notification new updates.</p>

                                <form action="#" method="post">
                                    <input type="email" name="nl-email" id="nlEmail" class="form-control"
                                        placeholder="Enter your email...">
                                    <button type="submit" class="btn roberto-btn w-100">Subscribe</button>
                                </form>
                            </div>
                        </div>
                        <!-- Recent Post -->
                        <div class="single-widget-area mb-100">
                            <h4 class="widget-title mb-30">Recent News</h4>

                            <!-- Single Recent Post -->
                            <div class="single-recent-post d-flex">
                                <!-- Thumb -->
                                <div class="post-thumb">
                                    <a href="single-blog.html"><img src="https://tse2.mm.bing.net/th?id=OIP.7hK-xY-a-9Qk_cenUelGawHaDt&pid=Api&P=0&w=360&h=180" alt=""></a>
                                </div>
                                <!-- Content -->
                                <div class="post-content">
                                    <!-- Post Meta -->
                                    <div class="post-meta">
                                        <a href="#" class="post-author">Jan 29, 2019</a>
                                        <a href="#" class="post-tutorial">Event</a>
                                    </div>
                                    <a href="single-blog.html" class="post-title">Proven Techniques Help You Herbal
                                        Breast</a>
                                </div>
                            </div>
                            <!-- Single Recent Post -->
                            <div class="single-recent-post d-flex">
                                <!-- Thumb -->
                                <div class="post-thumb">
                                    <a href="single-blog.html"><img src="https://tse2.mm.bing.net/th?id=OIP.7hK-xY-a-9Qk_cenUelGawHaDt&pid=Api&P=0&w=360&h=180" alt=""></a>
                                </div>
                                <!-- Content -->
                                <div class="post-content">
                                    <!-- Post Meta -->
                                    <div class="post-meta">
                                        <a href="#" class="post-author">Jan 29, 2019</a>
                                        <a href="#" class="post-tutorial">Event</a>
                                    </div>
                                    <a href="single-blog.html" class="post-title">Cooking On A George Foreman Grill</a>
                                </div>
                            </div>
                            <!-- Single Recent Post -->
                            <div class="single-recent-post d-flex">
                                <!-- Thumb -->
                                <div class="post-thumb">
                                    <a href="single-blog.html"><img src="https://tse2.mm.bing.net/th?id=OIP.7hK-xY-a-9Qk_cenUelGawHaDt&pid=Api&P=0&w=360&h=180" alt=""></a>
                                </div>
                                <!-- Content -->
                                <div class="post-content">
                                    <!-- Post Meta -->
                                    <div class="post-meta">
                                        <a href="#" class="post-author">Jan 29, 2019</a>
                                        <a href="#" class="post-tutorial">Event</a>
                                    </div>
                                    <a href="single-blog.html" class="post-title">Selecting The Right Hotel</a>
                                </div>
                            </div>
                            <!-- Single Recent Post -->
                            <div class="single-recent-post d-flex">
                                <!-- Thumb -->
                                <div class="post-thumb">
                                    <a href="single-blog.html"><img src="https://tse2.mm.bing.net/th?id=OIP.7hK-xY-a-9Qk_cenUelGawHaDt&pid=Api&P=0&w=360&h=180" alt=""></a>
                                </div>
                                <!-- Content -->
                                <div class="post-content">
                                    <!-- Post Meta -->
                                    <div class="post-meta">
                                        <a href="#" class="post-author">Jan 29, 2019</a>
                                        <a href="#" class="post-tutorial">Event</a>
                                    </div>
                                    <a href="single-blog.html" class="post-title">Comment Importance Of Human Life</a>
                                </div>
                            </div>
                        </div>
                        <!-- Popular Tags -->
                        <div class="single-widget-area mb-100 clearfix">
                            <h4 class="widget-title mb-30">Tags</h4>
                            <!-- Popular Tags -->
                            <ul class="popular-tags">
                                <li><a href="#">Bed,</a></li>
                                <li><a href="#">Hotel,</a></li>
                                <li><a href="#">Travel,</a></li>
                                <li><a href="#">Restaurant,</a></li>
                                <li><a href="#">Sport,</a></li>
                                <li><a href="#">Trip,</a></li>
                                <li><a href="#">Music,</a></li>
                                <li><a href="#">Holiday,</a></li>
                                <li><a href="#">Tourist,</a></li>
                                <li><a href="#">Foody,</a></li>
                                <li><a href="#">Resorts.</a></li>
                            </ul>
                        </div>
                        <!-- Instagram -->
                        <div class="single-widget-area mb-100 clearfix">
                            <h4 class="widget-title mb-30">Instagram</h4>
                            <!-- Instagram Feeds -->
                            <ul class="instagram-feeds">
                                <li><a href="#"><img src="https://tse2.mm.bing.net/th?id=OIP.7hK-xY-a-9Qk_cenUelGawHaDt&pid=Api&P=0&w=360&h=180" alt=""></a></li>
                                <li><a href="#"><img src="https://tse2.mm.bing.net/th?id=OIP.7hK-xY-a-9Qk_cenUelGawHaDt&pid=Api&P=0&w=360&h=180" alt=""></a></li>
                                <li><a href="#"><img src="https://tse2.mm.bing.net/th?id=OIP.7hK-xY-a-9Qk_cenUelGawHaDt&pid=Api&P=0&w=360&h=180" alt=""></a></li>
                                <li><a href="#"><img src="https://tse2.mm.bing.net/th?id=OIP.7hK-xY-a-9Qk_cenUelGawHaDt&pid=Api&P=0&w=360&h=180" alt=""></a></li>
                                <li><a href="#"><img src="https://tse2.mm.bing.net/th?id=OIP.7hK-xY-a-9Qk_cenUelGawHaDt&pid=Api&P=0&w=360&h=180" alt=""></a></li>
                                <li><a href="#"><img src="https://tse2.mm.bing.net/th?id=OIP.7hK-xY-a-9Qk_cenUelGawHaDt&pid=Api&P=0&w=360&h=180" alt=""></a></li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div>
        
    </div>

    @include('include/callnow')
    @include('include/footer')
 
@endsection
