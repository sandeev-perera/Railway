@extends("layouts.layout")

@section("title", "Tap & Go | Support")

@section('bg_image', url('images/support.jpg'))

@section('content')

        <section class="section1">

            <div class="content">
                <h1>Support</h1>
                <p>"Welcome to our Season Ticket Automation System support page! Find quick guides, <br>FAQs, and troubleshooting tips to manage your tickets effortlessly. <br> Need help? Contact our support team—we're here for you!"</p>
        </section>

        <section id="sub-sections">
            <section class="sub-sec">

                <div class="row">
                    <div class="col">
                        <h1>CONTACT</h1><br>
                        <ol class="ol2">
                            <li>Email : <a href="taptogosupport@gmail.com">taptogosupport@gmail.com</a></li>
                            <li>Hotline : 0112 001 122</li>
                        </ol>

                    </div>

                    <div class="col">
                        <img src="{{url('images/contact.jpg')}}" class="supportimg" alt="support">
                    </div>
                </div>

            </section>

            <hr>

            <section class="sub-sec3">

                <div class="row">
                    <div class="col">
                        <h1>User Guides</h1><br>
                        <ol class="ol1">
                            <li>How to purchase and activate your Tap and Go seasonal ticket (Step-by-Step).</li>
                            <li>Troubleshooting Tips.</li>
                            <li>How to make the payment and renew your seasonal ticket online.</li>
                        </ol>
                    </div>

                </div>



            </section>

            <hr>
            <section class="sub-sec">

                <div class="row">
                    <div class="container">
                        <h1>Feedback</h1>
                        <form action="process.php" class="feedback-frm" method="POST">
                            <label for="name" id="lbl1">Name</label>
                            <input type="text" id="name" class="input1" name="name" required>

                            <label for="feedback" id="lbl1">Feedback</label>
                            <textarea id="feedback" name="feedback" class="txt1" rows="5" required></textarea>

                            <button type="submit" id="feedback-btn">Submit</button>
                        </form>
                    </div>

                    <div class="col">
                        <img src="{{url('images/kidintrain.jpg')}}" class="supportimg" alt="kidintrain">
                    </div>
                </div>

            </section>

        </section>

@endsection