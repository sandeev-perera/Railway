@extends("layouts.layout")

@section("title", "Tap & Go | About Us")

@section('bg_image', url('images/aboutus.jpg'))

@section('content')

<section class="section1">

    <div class="content">
        <h1>About <span class="tng">Us</span></h1>
        <p>"Tap and Go is a seasonal ticket automation system that offers <br> fast, easy, and paperless
            commuting
            with a seamless, <br>contactless, and secure travel experience."</p>


</section>

<section id="sub-sections">


    <section class="sub-sec2">

        <div class="row">
            <div class="col">
                <h1>Our Mission</h1><br>
                <p>Our mission is to eliminate the hassle of traditional
                    ticketing by <br> providing a modern, efficient, and eco-friendly
                    travel solution. <br> With Tap and Go, commuters can enjoy seamless,
                    digital <br> transactions and a stress-free journey</p>
            </div>

        </div>



    </section>

    <hr>

    <section class="sub-sec2">

        <div class="row">
            <div class="col">
                <h1>How it works</h1><br>
                <ol class="ol1">
                    <li>Apply - Register and active your Seasonal Ticket Card.</li>
                    <li>Pay and Renew- Pay for Ticket online and renew it before expires.</li>
                    <li>Tap & Travel- Tap your card and enter to the platform.</li>
                </ol>
            </div>

        </div>



    </section>

    <hr>

    <section class="sub-sec2">

        <div class="row">
            <div class="col">
                <h1>Why Choose Us</h1><br>
                <ol class="ol1">
                    <li>Convenient- No more long queues or lost tickets.</li>
                    <li>Secure- Encrypted transactions for safe payments.</li>
                    <li>Time-Saving- Faster entry and exit with contactless travel.</li>
                </ol>
            </div>

        </div>



    </section>

</section>

@endsection