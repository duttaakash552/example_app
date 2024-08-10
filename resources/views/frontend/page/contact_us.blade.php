@extends('assets.frontend.layout')
@section('title','Contact Us')
@section('content')
<section class="inner-banner">
    <picture>
        <source srcset="./public/assets/frontend/images/contact-banner.jpg">
        <source srcset="./public/assets/frontend/images/contact-banner.jpg">
        <img src="./public/assets/frontend/images/contact-banner.jpg" alt="Contact"
            class="img-fluid inner-banner-img">
    </picture>
    <div class="inner-banner-content">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <span class="caption1">Contact</span>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="contact-section">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-12">
                        <div class="icon-box">
                            <div class="media-left"><i class="fa fa-paper-plane-o"></i></div>

                            <div class="media-body"><strong>Our Address</strong>

                                <p><span><span><span>Suite 1, 117A Harley St, Marylebone, London, W1G
                                                6AT</span></span></span>, UK</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-6 col-md-12">
                        <div class="icon-box">
                            <div class="media-left"><i class="fa fa-phone"></i></div>

                            <div class="media-body"><strong>Our Number</strong>

                                <p>020 37457523</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-6 col-md-12">
                        <div class="icon-box">
                            <div class="media-left"><i class="fa fa-envelope-o"></i></div>

                            <div class="media-body"><strong>Our Email</strong>

                                <p>info@stdcheck.london</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-6 col-md-12">
                        <div class="icon-box">
                            <div class="media-left"><i class="fa fa-clock-o"></i></div>

                            <div class="media-body"><strong>Opening Hours</strong>

                                <ul class="contact-timing list-inline">
                                    <li class="list-inline-item">Monday - Friday<br>
                                        <span>&nbsp;9:00 - 18:00</span>
                                    </li>
                                    <li class="list-inline-item">Saturday - Sunday<br>
                                        <span>10:00 - 14:00</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <h1>Contact Us</h1>
                <form id="contact-form" action="<?= route('contact.form.submit') ?>" method="post" novalidate="novalidate">
                    @csrf
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <input id="form_name" name="name" class="form-control" type="text"
                                    placeholder="Enter Name">
								<div class="error error_name"></div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input id="form_email" name="email" class="form-control" type="email"
                                    placeholder="Enter Email">
								<div class="error error_email"></div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <input id="form_phone" name="phone" class="form-control" type="text"
                                    placeholder="Enter Phone">
								<div class="error error_phone"></div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <textarea id="form_message" name="message" class="form-control message" rows="5"
                            placeholder="Enter Message"></textarea>
						<div class="error error_message"></div>
                    </div>
					<input type="hidden" name="enquiry_type" value="Contact" />

                    <div class="form-group">
                        <input type="hidden" name="page_by" value="contactPageForm">
                        <input type="hidden" id="pageURL" name="pageURL" class="form-control"
                            value="https://www.stdcheck.london/contact">
                        <input type="hidden" id="pageName" name="pageName" class="form-control" value="Contact ">
                        <div class="g-recaptcha" data-sitekey="{{ config('captcha.sitekey') }}"></div>
						<div class="error error_captcha" style="color: red"></div>
                        <button type="button" class="btn btn_submit contact_btn">Send</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="map">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2482.536961488515!2d-0.15084338422949994!3d51.52171047963752!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xbc8ba29c12991f0f!2sSTD+Check+London!5e0!3m2!1sen!2sin!4v1541828835134"
                width="100%" height="320" frameborder="0" allowfullscreen=""></iframe>
        </div>
    </div>
</section>
@endsection