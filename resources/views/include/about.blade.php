  <style>
      h4{
          font-family: Arial, Helvetica, sans-serif;
          font-size: 15px;
          color: gray;
          margin-top: 5px;
      }
      /* @media only screen and (max-width: 767px){
        .carosell h3{
            margin-left: -3rem;

        }
      } */
  .carosell h3{
      margin-left: 7.5rem;
      font-family: Arial, Helvetica, sans-serif;
      font-size: 30px;
  }

  .carosell h6{
      color: gray;
      margin-left: 7.5rem;
      font-family: Arial, Helvetica, sans-serif;
      font-size: 15px;

  }
  </style>
<!-- About Us Area Start -->
   <section class="roberto-about-area section-padding-100-0">
       <!-- Hotel Search Form Area -->
       <div class="hotel-search-form-area">
           <div class="container-fluid">
               <div class="hotel-search-form">
                   <form action="{{ route('room_available') }}" method="get">
                       <div class="row justify-content-between align-items-end">
                           <div class="col-6 col-md-1 col-lg-2">
                               <label for="checkIn">City</label>
                               <input type="text" class="form-control @error('city') is-invalid @enderror" 
                                   id="city"name="city" value="{{ old('city') }}" placeholder="where are you going ?">
                           </div>
                           <div class="col-5 col-md-1 col-lg-2">
                               <label for="checkIn">Check In</label>
                               <input type="date" class="form-control @error('checkin-date') is-invalid @enderror"
                                   id="checkIn" name="checkin-date" value="{{ old('checkin-date') }}">
                           </div>
                           <div class="col-5 col-md-1 col-lg-2">
                               <label for="checkOut">Check Out</label>
                               <input type="date" class="form-control @error('checkout-date') is-invalid @enderror"
                                   id="checkOut" name="checkout-date" value="{{ old('checkout-date') }}">
                           </div>

                           <div class="col-4 col-md-1">
                               <label for="room">Room</label>
                               <select name="room" id="room" class="form-control">
                                   <option value="01">01</option>
                                   <option value="02">02</option>
                                   <option value="03">03</option>
                                   <option value="04">04</option>
                                   <option value="05">05</option>
                                   <option value="06">06</option>
                               </select>
                           </div>
                           <div class="col-4 col-md-1">
                               <label for="adults">Adult</label>
                               <select name="adults" id="adults" class="form-control">
                                   <option value="01">01</option>
                                   <option value="02">02</option>
                                   <option value="03">03</option>
                                   <option value="04">04</option>
                                   <option value="05">05</option>
                                   <option value="06">06</option>
                               </select>
                           </div>
                           <div class="col-4 col-md-2 col-lg-1">
                               <label for="children">Children</label>
                               <select name="children" id="children" class="form-control">
                                   <option value="01">01</option>
                                   <option value="02">02</option>
                                   <option value="03">03</option>
                                   <option value="04">04</option>
                                   <option value="05">05</option>
                                   <option value="06">06</option>
                               </select>
                           </div>
                           <div class="col-12 col-md-2">
                               <button type="submit" class="form-control btn roberto-btn w-100">Check
                                   Availability</button>
                           </div>



                       </div>
                   </form>
               </div>
           </div>
       </div>

        {{-- <div class="container mt-100">

           <div class="row align-items-center">
               <div class="col-12 col-lg-6">
                   <!-- Section Heading -->
                   <div class="section-heading wow fadeInUp" data-wow-delay="100ms">
                       <h6>About Us</h6>
                       <h2>Welcome to <br>Roberto Hotel Luxury</h2>
                   </div>
                   <div class="about-us-content mb-100">
                       <h5 class="wow fadeInUp" data-wow-delay="300ms">With over 340 hotels worldwide, NH Hotel Group
                           offers a wide variety of hotels catering for a perfect stay no matter where your
                           destination.</h5>
                       <p class="wow fadeInUp" data-wow-delay="400ms">Manager: <span>Michen Taylor</span></p>
                       <img src="{{ asset('website/img/core-img/signature.png') }}" alt="" class="wow fadeInUp"
                           data-wow-delay="500ms">
                   </div>
               </div>

               <div class="col-12 col-lg-6">
                   <div class="about-us-thumbnail mb-100 wow fadeInUp" data-wow-delay="700ms">
                       <div class="row no-gutters">
                           <div class="col-6">
                               <div class="single-thumb">
                                   <img src="{{ asset('website/img/bg-img/13.jpg') }}" alt="">
                               </div>
                               <div class="single-thumb">
                                   <img src="{{ asset('website/img/bg-img/14.jpg') }}" alt="">
                               </div>
                           </div>
                           <div class="col-6">
                               <div class="single-thumb">
                                   <img src="{{ asset('website/img/bg-img/15.jpg') }}" alt="">
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>  --}}
       {{-- <div class="carosell">
           <h3>Explore Pakistan</h3>
           <h6>These popular destinations have a lot to offer</h6>
       <div class="container" style="margin-top: 2rem;">
        <div id="carouselExample" class="carousel slide" data-ride="carousel" data-interval="800000">
            <div class="carousel-inner row w-100 mx-auto" role="listbox">
                <div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-2 active">
                    <a href="https://tse3.mm.bing.net/th?id=OIP.IAfW3Uyo9LUn0Zx7qu-rfgHaE6&pid=Api&P=0&w=291&h=193">
                    <img class="img-fluid mx-auto d-block" src="https://tse3.mm.bing.net/th?id=OIP.IAfW3Uyo9LUn0Zx7qu-rfgHaE6&pid=Api&P=0&w=291&h=193" alt="slide 1">
                </a>
                    <h4>hotel 1</h4>
                </div>
                <div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-2">
                    <img class="img-fluid mx-auto d-block" src="https://tse3.mm.bing.net/th?id=OIP.IAfW3Uyo9LUn0Zx7qu-rfgHaE6&pid=Api&P=0&w=291&h=193" alt="slide 2">
                    <h4>hotel 2</h4>
                </div>
                <div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-2">
                    <a href="https://tse3.mm.bing.net/th?id=OIP.IAfW3Uyo9LUn0Zx7qu-rfgHaE6&pid=Api&P=0&w=291&h=193">
                          <img class="img-fluid mx-auto d-block" src="https://tse3.mm.bing.net/th?id=OIP.IAfW3Uyo9LUn0Zx7qu-rfgHaE6&pid=Api&P=0&w=291&h=193" alt="slide 3">
                   </a>
                    <h4>hotel 3</h4>
                </div>
                <div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-2">
                    <img class="img-fluid mx-auto d-block" src="https://tse3.mm.bing.net/th?id=OIP.IAfW3Uyo9LUn0Zx7qu-rfgHaE6&pid=Api&P=0&w=291&h=193" alt="slide 4">
                    <h4>hotel 4</h4>
                </div>
                <div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-2">
                    <img class="img-fluid mx-auto d-block" src="https://tse3.mm.bing.net/th?id=OIP.IAfW3Uyo9LUn0Zx7qu-rfgHaE6&pid=Api&P=0&w=291&h=193" alt="slide 5">
                    <h4>hotel 5</h4>
                </div>
                <div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-2">
                    <img class="img-fluid mx-auto d-block" src="https://tse3.mm.bing.net/th?id=OIP.IAfW3Uyo9LUn0Zx7qu-rfgHaE6&pid=Api&P=0&w=291&h=193" alt="slide 6">
                    <h4>hotel 6</h4>
                </div>
                <div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-2">
                    <img class="img-fluid mx-auto d-block" src="https://tse3.mm.bing.net/th?id=OIP.IAfW3Uyo9LUn0Zx7qu-rfgHaE6&pid=Api&P=0&w=291&h=193" alt="slide 7">
                    <h4>hotel 7</h4>
                </div>
                <div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-2">
                    <img class="img-fluid mx-auto d-block" src="https://tse3.mm.bing.net/th?id=OIP.IAfW3Uyo9LUn0Zx7qu-rfgHaE6&pid=Api&P=0&w=291&h=193" alt="slide 8">
                    <h4>hotel 8</h4>
                </div>
                <div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-2">
                  <img class="img-fluid mx-auto d-block" src="https://tse3.mm.bing.net/th?id=OIP.IAfW3Uyo9LUn0Zx7qu-rfgHaE6&pid=Api&P=0&w=291&h=193" alt="slide 9">
                  <h4>hotel 9</h4>
                </div>
                <div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-2">
                  <img class="img-fluid mx-auto d-block" src="https://tse3.mm.bing.net/th?id=OIP.IAfW3Uyo9LUn0Zx7qu-rfgHaE6&pid=Api&P=0&w=291&h=193" alt="slide 10">
                  <h4>hotel 10</h4>
                </div>
                <div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-2">
                  <img class="img-fluid mx-auto d-block" src="https://tse3.mm.bing.net/th?id=OIP.IAfW3Uyo9LUn0Zx7qu-rfgHaE6&pid=Api&P=0&w=291&h=193" alt="slide 11">
                  <h4>hotel 11</h4>
                </div>
                <div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-2">
                  <img class="img-fluid mx-auto d-block" src="https://tse3.mm.bing.net/th?id=OIP.IAfW3Uyo9LUn0Zx7qu-rfgHaE6&pid=Api&P=0&w=291&h=193" alt="slide 12">
                  <h4>hotel 12</h4>
                </div>
              
            </div>
            <a class="carousel-control-prev" href="#carouselExample" role="button" data-slide="prev">
                <i class="fa fa-chevron-left fa-lg text-muted"></i>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next text-faded" href="#carouselExample" role="button" data-slide="next">
                <i class="fa fa-chevron-right fa-lg text-muted"></i>
                <span class="sr-only">Next</span>
            </a>
        </div> --}}
        
    </div>
</div>
    
    

      
       <script>

$('#carouselExample').on('slide.bs.carousel', function (e) {

/*

CC 2.0 License Iatek LLC 2018
Attribution required

*/


var $e = $(e.relatedTarget);
var idx = $e.index();
var itemsPerSlide = 7;
var totalItems = $('.carousel-item').length;

if (idx >= totalItems-(itemsPerSlide-1)) {
    var it = itemsPerSlide - (totalItems - idx);
    for (var i=0; i<it; i++) {
        // append slides to end
        if (e.direction=="left") {
            $('.carousel-item').eq(i).appendTo('.carousel-inner');
        }
        else {
            $('.carousel-item').eq(0).appendTo('.carousel-inner');
        }
    }
}
});




       </script>



   </section>


   <!-- About Us Area End -->
