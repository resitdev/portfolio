@extends('layouts.app')

@section('content')
<style>
    /* Custom zoom-in effect on hover */
    .profile-img {
      transition: transform 0.3s ease-in-out;
      border-radius: 50%;
      object-fit: cover;
    }

    .profile-img:hover {
      transform: scale(1.1); /* Zoom effect */
    }

    /* Optional: Add some border or shadow to enhance the effect */
    .profile-container {
      width: 200px;
      height: 200px;
      display: inline-block;
      margin-top: 50px;
      border-radius: 50%;
      overflow: hidden;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

      /* Shake animation */
      @keyframes shake {
      0% { transform: translateX(0); }
      25% { transform: translateX(-10px); }
      50% { transform: translateX(10px); }
      75% { transform: translateX(-10px); }
      100% { transform: translateX(0); }
    }

    .shake-image:hover {
      animation: shake 0.5s ease-in-out;
    }
    /* Pulse animation */
    @keyframes pulse {
      0% { transform: scale(1); }
      50% { transform: scale(1.1); }
      100% { transform: scale(1); }
    }

    .pulse-image:hover {
      animation: pulse 1s infinite;
    }



  </style>

    <!-- Video Modal Start -->
    <div class="modal fade" id="videoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <!-- 16:9 aspect ratio -->
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="" id="video"  allowscriptaccess="always" allow="autoplay"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Video Modal End -->


    <!-- Header Start -->
    <div class="container-fluid bg-primary d-flex align-items-center mb-5 py-5" id="home" style="min-height: 100vh;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5 px-5 pl-lg-0 pb-5 pb-lg-0">


    
                

        <img class="img-fluid pulse-image profile-img img-fluid img-fluid w-100 rounded-circle shadow-sm shake-image" src="{{ asset("images/$user?->profile_pic") }}" alt="">

               
                
                
                </div>
                <div class="col-lg-7 text-center text-lg-left">
                    <h3 class="text-white font-weight-normal mb-3">I'm</h3>
                    <h1 class="display-3 text-uppercase text-primary mb-2" style="-webkit-text-stroke: 2px #ffffff;">{{ $user?->name }}</h1>
                    <h1 class="typed-text-output d-inline font-weight-lighter text-white"></h1>
                    <div class="typed-text d-none">{{ $user?->job }}</div>
                    <div class="d-flex align-items-center justify-content-center justify-content-lg-start pt-5">
                    @if(isset($setting) && !is_null($setting->cv_url))    
                    <a href="{{ $setting->cv_url }}" class="btn btn-outline-light mr-5">Download CV</a>
                    @else
                   <span class="btn btn-outline-light mr-5">CV Not Available</span>
                   @endif    

                   @if(isset($setting) && !is_null($setting->video_url))                
                    <button type="button" class="btn-play" data-toggle="modal"
                            data-src="{{$setting->video_url }}" data-target="#videoModal">
                            @else
                   <span class="btn btn-outline-light mr-5">Video Not Available</span>
                   @endif   
                            <span></span>
                        </button>
                        <h5 class="font-weight-normal text-white m-0 ml-4 d-none d-sm-block">Play Video</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->


    <!-- About Start -->
    <div class="container-fluid py-5" id="about">
        <div class="container">
            <div class="position-relative d-flex align-items-center justify-content-center">
                <h1 class="display-1 text-uppercase text-white" style="-webkit-text-stroke: 1px #dee2e6;">About</h1>
                <h1 class="position-absolute text-uppercase text-primary">About Me</h1>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-5 pb-4 pb-lg-0">
                <img class="img-fluid rounded w-100" src="{{ isset($setting->about_photo) ? asset("images/$setting->about_photo") : asset('storage/default-image.jpg') }}" alt="">








                </div>
                <div class="col-lg-7">
                <h3 class="mb-4">{{ isset($setting->about_title) ? $setting->about_title : 'Default About Title' }}</h3>

                <p>{{ isset($setting->about_description) ? $setting->about_description : 'No description available.' }}</p>

                    <div class="row mb-3">
                        <div class="col-sm-6 py-2"><h6>Name: <span class="text-secondary">{{ $user?->name }}</span></h6></div>
                        <div class="col-sm-6 py-2"><h6>Birthday: <span class="text-secondary">{{ $user?->birth_day }}</span></h6></div>
                        <div class="col-sm-6 py-2"><h6>Degree: <span class="text-secondary">{{ $user?->degree }}</span></h6></div>
                        <div class="col-sm-6 py-2"><h6>Experience: <span class="text-secondary">{{ $user?->experience }} Years</span></h6></div>
                        <div class="col-sm-6 py-2"><h6>Phone: <span class="text-secondary">{{ $user?->phone }}</span></h6></div>
                        <div class="col-sm-6 py-2"><h6>Email: <span class="text-secondary">{{ $user?->email }}</span></h6></div>
                        <div class="col-sm-6 py-2"><h6>Address: <span class="text-secondary">{{ $user?->address }}</span></h6></div>
                        <div class="col-sm-6 py-2"><h6>Freelance: <span class="text-secondary">Available</span></h6></div>
                    </div>
                    <a href="{{ isset($setting->freelance_url) ? $setting->freelance_url : '#' }}" class="btn btn-outline-primary mr-4">Hire Me</a>

                    {{-- <a href="" class="btn btn-outline-primary">Learn More</a> --}}
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Qualification Start -->
    <div class="container-fluid py-5" id="qualification">
        <div class="container">
            <div class="position-relative d-flex align-items-center justify-content-center">
                <h1 class="display-1 text-uppercase text-white" style="-webkit-text-stroke: 1px #dee2e6;">Quality</h1>
                <h1 class="position-absolute text-uppercase text-primary">Education & Expericence</h1>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h3 class="mb-4">My Education</h3>
                    <div class="border-left border-primary pt-2 pl-4 ml-2">
                        @foreach ($educations as $education)
                        <div class="position-relative mb-4">
                            <i class="far fa-dot-circle text-primary position-absolute" style="top: 2px; left: -32px;"></i>
                            <h5 class="font-weight-bold mb-1">{{ $education->title }}</h5>
                            <p class="mb-2"><strong>{{ $education->association }}</strong> | <small>{{ $education->from }} - {{ $education->to }}</small></p>
                            <p>{{ $education->description }} </p>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-6">
                    <h3 class="mb-4">My Expericence</h3>
                    <div class="border-left border-primary pt-2 pl-4 ml-2">
                        @foreach ($experiences as $experience)
                        <div class="position-relative mb-4">
                            <i class="far fa-dot-circle text-primary position-absolute" style="top: 2px; left: -32px;"></i>
                            <h5 class="font-weight-bold mb-1">{{ $experience->title }}</h5>
                            <p class="mb-2"><strong>{{ $experience->association }}</strong> | <small>{{ $experience->from }} - {{ $experience->to }}</small></p>
                            <p>{{ $experience->description }}</p>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Qualification End -->


    <!-- Skill Start -->
    <div class="container-fluid py-5" id="skill">
        <div class="container">
            <div class="position-relative d-flex align-items-center justify-content-center">
                <h1 class="display-1 text-uppercase text-white" style="-webkit-text-stroke: 1px #dee2e6;">Skills</h1>
                <h1 class="position-absolute text-uppercase text-primary">My Skills</h1>
            </div>
            <div class="row align-items-center">
@php
    $skillsCount = $skills->count();
@endphp


@foreach($skillsCount > 0 ? $skills->split(ceil($skillsCount / 3)) : [] as $row)
        <!-- Your loop content here -->                
                <div class="col-md-6">
                    @foreach($row as $skill)
                    <div class="skill mb-4">
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-bold">{{ $skill->name }}</h6>
                            <h6 class="font-weight-bold">{{$skill->percent}}%</h6>
                        </div>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" aria-valuenow="{{$skill->percent}}" aria-valuemin="0" aria-valuemax="100" style="background-color: {{$skill->color}}"></div>
                        </div>
                    </div>
                    @endforeach
                </div>
    @endforeach
    @if($skillsCount === 0)
    <p>No skills available.</p>
    @endif
            </div>
        </div>
    </div>
    <!-- Skill End -->


    <!-- Services Start -->
    <div class="container-fluid pt-5" id="service">
        <div class="container">
            <div class="position-relative d-flex align-items-center justify-content-center">
                <h1 class="display-1 text-uppercase text-white" style="-webkit-text-stroke: 1px #dee2e6;">Service</h1>
                <h1 class="position-absolute text-uppercase text-primary">My Services</h1>
            </div>
            <div class="row pb-3">
            @foreach ($services as $service)
                <div class="col-lg-4 col-md-6 text-center mb-5">
                    <div class="d-flex align-items-center justify-content-center mb-4">
                      
                        <i class="{{ $service->icon }} service-icon bg-primary text-white mr-3"></i>
                        <h4 class="font-weight-bold m-0">{{ $service->name }}</h4>
                    </div>
                    <p>{{ $service->description }}</p>
                </div>
            @endforeach
            </div>
        </div>
    </div>
    <!-- Services End -->


    <!-- Portfolio Start -->
    <div class="container-fluid pt-5 pb-3" id="portfolio">
        <div class="container">
            <div class="position-relative d-flex align-items-center justify-content-center">
                <h1 class="display-1 text-uppercase text-white" style="-webkit-text-stroke: 1px #dee2e6;">Gallery</h1>
                <h1 class="position-absolute text-uppercase text-primary">My Portfolio</h1>
            </div>
            <div class="row">
                <div class="col-12 text-center mb-2">
                    <ul class="list-inline mb-4" id="portfolio-flters">
                        <li class="btn btn-sm btn-outline-primary m-1 active"  data-filter="*">All</li>
                        @foreach ($categories as $category)
                        <li class="btn btn-sm btn-outline-primary m-1" data-filter=".{{$category->name}}">{{ $category->name }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="row portfolio-container">
                @foreach ($portfolios as $portfolio)
                <div class="col-lg-4 col-md-6 mb-4 portfolio-item {{$portfolio->category->name }}">
                    <div class="position-relative overflow-hidden mb-2">
                        <img class="img-fluid rounded w-100" src="{{ asset("images/$portfolio->image") }}" alt="">
                        <div class="portfolio-btn bg-primary d-flex align-items-center justify-content-center">
                            <a href="{{ asset("images/$portfolio->image") }}" data-lightbox="portfolio">
                                <i class="fa fa-plus text-white" style="font-size: 50px;"></i>
                            </a>
                            <a href="{{ $portfolio->project_url }}" data-lightbox="portfolio">
                                <i class="fa-solid fa-link text-white" style="margin-left:20px; font-size: 50px;"></i>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Portfolio End -->


    <!-- Testimonial Start -->
    <div class="container-fluid py-5" id="testimonial">
        <div class="container">
            <div class="position-relative d-flex align-items-center justify-content-center">
                <h1 class="display-1 text-uppercase text-white" style="-webkit-text-stroke: 1px #dee2e6;">Review</h1>
                <h1 class="position-absolute text-uppercase text-primary">Clients Say</h1>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="owl-carousel testimonial-carousel">
                        @foreach ($reviewers as $review)
                        <div class="text-center">
                            <i class="fa fa-3x fa-quote-left text-primary mb-4"></i>
                            <h4 class="font-weight-light mb-4">{{ $review->description }}</h4>
                            <img class="img-fluid mx-auto mb-3" src="{{ asset("images/$review->image") }}" style="width: auto; height: auto;">
                            <h5 class="font-weight-bold m-0">{{ $review->name }} </h5>
                            <span>{{ $review->job }}</span>
                        </div>
                    @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->

    <!-- Contact Start -->
    <div class="container-fluid py-5" id="contact">
        <div class="container">
            <div class="position-relative d-flex align-items-center justify-content-center">
                <h1 class="display-1 text-uppercase text-white" style="-webkit-text-stroke: 1px #dee2e6;">Contact</h1>
                <h1 class="position-absolute text-uppercase text-primary">Contact Me</h1>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="contact-form text-center">
                        @if (Session::has('message'))
                        <div class="alert alert-primary" role="alert">
                          {{ Session::get('message') }}
                        </div>
                        <br>
                        @endif
                        <form id="contactForm" method="POST" action="{{ route('contact') }}">
                            @csrf
                            <div class="form-row">
                                <div class="control-group col-sm-6">
                                    <input type="text" class="form-control p-4" id="name" placeholder="Your Name"
                                        required name="name" value="{{old('name')}}"/>
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="control-group col-sm-6">
                                    <input type="email" class="form-control p-4" id="email" placeholder="Your Email" value="{{old('email')}}"
                                        required name="email" />
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="control-group">
                                <input type="text" class="form-control p-4" id="subject" placeholder="Subject" value="{{old('subject_mail')}}"
                                    required name="subject_mail"/>
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                                <textarea class="form-control py-3 px-4" rows="5" id="message" placeholder="Message" name="content"
                                    required>{{old('content')}}</textarea>
                                <p class="help-block text-danger"></p>
                            </div>
                            <div>
                                <button class="btn btn-outline-primary" type="submit" id="sendMessageButton">Send
                                    Message</button>
                            </div>
                            @if ($errors->any())
                            <br>
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                             @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->


    <!-- Footer Start -->
    <div class="container-fluid bg-primary text-white mt-5 py-5 px-sm-3 px-md-5">
        <div class="container text-center py-5">
            <div class="d-flex justify-content-center mb-4">
            <a class="btn btn-light btn-social mr-2" href="{{ isset($setting->github_url) ? $setting->github_url : '#' }}">
    <i class="fab fa-github"></i>
</a>
<a class="btn btn-light btn-social mr-2" href="{{ isset($setting->linkedin_url) ? $setting->fb_url : '#' }}">
<i style="font-size:24px" class="fa">&#xf0e1;</i>
</a>
<a class="btn btn-light btn-social mr-2" href="{{ isset($setting->fb_url) ? $setting->linkedin_url : '#' }}">
    <i class="fab fa-facebook"></i>
</a>

<a class="btn btn-light btn-social mr-2" href="https://wa.me/+8801740124587">
<i class="fa fa-whatsapp" style="font-size:24px"></i>
</a>

<a class="btn btn-light btn-social mr-2" href="https://t.me/asifiqbalsumon">
<i class="fa fa-telegram"></i>
</a>


              
            </div>
            <div class="d-flex justify-content-center mb-3">
                <a class="text-white" href="#">Privacy</a>
                <span class="px-3">|</span>
                <a class="text-white" href="#">Terms</a>
                <span class="px-3">|</span>
                <a class="text-white" href="#">FAQs</a>
                <span class="px-3">|</span>
                <a class="text-white" href="#">Help</a>
            </div>
            <p class="m-0">&copy; <a class="text-white font-weight-bold" href="#">asifiqbal.pro</a>. All Rights Reserved. Designed by <a class="text-white font-weight-bold" href="https://asifiqbal.pro">Asif Iqbal</a>
            </p>
        </div>
    </div>
    <!-- Footer End -->

    <!-- Scroll to Bottom -->
    <i class="fa fa-2x fa-angle-down text-white scroll-to-bottom"></i>

    <!-- Back to Top -->
    <a href="#" class="btn btn-outline-dark px-0 back-to-top"><i class="fa fa-angle-double-up"></i></a>


<style>
    .payment-container {
    text-align: center;
    padding: 20px;
}

.payment-container h1 {
    font-size: 2rem;
    color: #333;
    margin-bottom: 20px;
}

.payment-options {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 20px;
}

.payment-card {
    background: #fff;
    border: 1px solid #ddd;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    width: 150px;
    padding: 15px;
    text-align: center;
    transition: transform 0.3s, box-shadow 0.3s;
}

.payment-card:hover {
    transform: scale(1.05);
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
}

.payment-card img {
    width: 20px;
    height: 20px;
    margin-bottom: 4px;
}

.payment-card p {
    font-size: 1rem;
    color: #555;
    margin: 0;
}
</style>

    <div class="payment-container">
        <h1>Accepted Payment Methods</h1>
        <div class="payment-options">
            <div class="payment-card">
                <img src="images/paypal.png" alt="PayPal">
                <p>PayPal</p>
            </div>
            <div class="payment-card">
                <img src="images/bank.png" alt="Bank Transfer">
                <p>Bank Transfer</p>
            </div>
            <div class="payment-card">
                <img src="images/payoneer.png" alt="Payoneer">
                <p>Payoneer</p>
            </div>
            <div class="payment-card">
                <img src="images/skrill.png" alt="Skrill">
                <p>Skrill</p>
            </div>
            <div class="payment-card">
                <img src="images/perfectmoney.png" alt="Perfect Money">
                <p>Perfect Money</p>
            </div>
            <div class="payment-card">
                <img src="images/neteller.png" alt="Neteller">
                <p>Neteller</p>
            </div>
            <div class="payment-card">
                <img src="images/crypto.png" alt="Crypto">
                <p>Crypto</p>
            </div>
        </div>
    </div>

    @endsection
