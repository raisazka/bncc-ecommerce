@extends('layouts.app')

@section('extra-css')
    <link rel="stylesheet" href="{{asset('css/styleContactUs.css')}}">
@endsection

@section('content')
    <main>
        @if(session()->has('success_message'))

            <div class="alert alert-success">
                {{session()->get('success_message')}}
            </div>
        @endif
        <div class="ContactUs col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <br><br>
            <center><h2><b>CONTACT <span style="color: red;">US</span></b></h2></center>
            <div class="Form col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <form method="POST" action="{{route('contact.store')}}">
                    {{csrf_field()}}
                    <label for="name">Name</label>
                    <input type="text" id="fname" name="name">
                    <br>
                    <label for="email">Email</label>
                    <input type="text" id="email" name="email">
                    <br>
                    <label for="subject">Subject</label>
                    <input type="text" id="subject" name="subject">
                    <br>
                    <label for="Messages">Message</label>
                    <textarea id="subject" name="message" style="height:150px"></textarea>

                    <center>
                        <input type="submit" value="SEND">
                    </center>
                </form>
            </div>
            <div class="location col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15865.820455399773!2d106.783013!3d-6.203538!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x29720d62d8b976c5!2sBina+Nusantara+Computer+Club!5e0!3m2!1sen!2sid!4v1523888888480" frameborder="0" style="border:0" allowfullscreen></iframe><br>
                <p>Customer Service
                <p>Email : bynow@bncc.net
                <p>Telp : +628 1234 2254
                    <br> <br>
                <p>Greater Jakarta, Indonesia

            </div>
        </div>
    </main>
@endsection