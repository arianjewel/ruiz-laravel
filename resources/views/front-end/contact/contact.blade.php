@extends('front-end.layout')

@section('title')
    Ruiz|Edit Bill Address
@endsection

@section('content')
  
	<div class="breadcrumb-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!-- breadcrumb-list start -->
                        <ul class="breadcrumb-list">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active">Contact Us Page</li>
                        </ul>
                        <!-- breadcrumb-list end -->
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb-area end -->
         @if(Session::get('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{Session::get('message')}}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <!-- Page Conttent -->
        <main class="page-content section-ptb">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 col-sm-12">
                        <div class="contact-form">
                            <div class="contact-form-info">
                                <div class="contact-title">
                                    <h3>TELL US WHAT'S ON YOUR MIND</h3>
                                </div>
                                <form action="{{route('contact.store')}}" method="post">
                                    @csrf
                                    <div class="contact-page-form">
                                        <div class="contact-input">
                                            <div class="contact-inner">
                                                <input name="name" type="text" placeholder="Name *">
                                            </div>
                                            <div class="contact-inner">
                                                <input name="email" type="email" placeholder="Email *">
                                            </div>
                                            <div class="contact-inner">
                                                <input name="phone" type="text" placeholder="Phone *">
                                            </div>
                                            <div class="contact-inner">
                                                <input name="subject" type="text" placeholder="Subject *">
                                            </div>
                                            <div class="contact-inner contact-message">
                                                <textarea name="msg" placeholder="Message *"></textarea>
                                            </div>
                                        </div>
                                        <div class="contact-submit-btn">
                                            <button class="submit-btn" type="submit">Send Email</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 col-sm-12">
                        <div class="contact-infor">
                            <div class="contact-title">
                                <h3>CONTACT US</h3>
                            </div>
                            <div class="contact-dec">
                                <p>You can contact with us directly come to our office or via Phone and Email</p>
                            </div>
                            <div class="contact-address">
                                <ul>
                                    <li>Address : 6/8, Block #C, Pallabi, Mirpur-12, Dhaka-1216, Bangladesh</li>
                                    <li>Email: jewel.cse72@gmail.com.com</li>
                                    <li>Phone: 01744232195</li>
                                </ul>
                            </div>
                            <div class="work-hours">
                                <h5>Working hours</h5>
                                <p><strong>Monday &ndash; Saturday</strong>: &nbsp;08AM &ndash; 22PM</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <!--// Page Conttent -->

        
       
@endsection