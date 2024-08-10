@extends('assets.frontend.layout')
@section('title','Thank You')
@section('content')
<section class="error-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="thakyou">
                    <img src="public/assets/frontend/images/thank-you.png" alt="Thank You"
                        class="img-fluid">

                    <h2 class="thankyou_text">During the coronavirus pandemic, we must confirm appointments in order to
                        maintain social distancing,<br>we will email you to confirm your booking if your selected time
                        is possible.<br>If not, we will contact you with the nearest availability to your request.
                        <br>Thank you for understanding.
                    </h2>

                    <a href="<?= URL::to('/') ?>" class="back_to_home"><i class="fa fa-home"></i>Back to
                        Home</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection