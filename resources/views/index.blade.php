@extends("layouts.layout")

@section("title", "Tap & Go")

@section('bg_image', url('images/ninearc.jpg'))

@section('content')

<section class="section1">

    <div class="content">
        <h1>Welcome to<span class="tng">Tap and Go</span></h1>
        <p>Tap and Go - Smart, fast, and hassle-free seasonal ticketing.<br> Just tap, travel, and enjoy the ride!</p>
        <a href="{{route("application")}}"><button type="button" class="btn1">Register</button></a>
        {{-- <a href="{{route("show.login")}}"><button type="button" class="btn1">Log In</button></a> --}}


</section>

<section id="sub-sections">


    <section class="sub-sec">

        <div class="row">
            <div class="col">
                <h1>How Tap and Go Transforms Your Commute</h1><br>
                <p>Tap and Go simplifies seasonal ticketing with a seamless, contactless experience. No more waiting in
                    lines or handling paper tickets, just tap your card or mobile device and travel effortlessly. Enjoy
                    secure payments, real-time balance updates, and a hassle-free commute every day!</p>
            </div>

            <div class="col">
                <img src="{{url('images/train1.jpg')}}" alt="">
            </div>
        </div>


    </section>


</section>
@endsection