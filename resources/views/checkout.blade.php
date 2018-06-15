@extends('layouts.app')

@section('extra-css')
    <script src="https://js.stripe.com/v3/"></script>
    <style>
        /**
 * The CSS shown here will not be introduced in the Quickstart guide, but shows
 * how you can use CSS to style your Element's container.
 */
        .StripeElement {
            background-color: white;
            height: 40px;
            padding: 10px 12px;
            border-radius: 4px;
            border: 1px solid transparent;
            box-shadow: 0 1px 3px 0 #e6ebf1;
            -webkit-transition: box-shadow 150ms ease;
            transition: box-shadow 150ms ease;
        }

        .StripeElement--focus {
            box-shadow: 0 1px 3px 0 #cfd7df;
        }

        .StripeElement--invalid {
            border-color: #fa755a;
        }

        .StripeElement--webkit-autofill {
            background-color: #fefde5 !important;
        }

        #complete-order:disabled{
             background: lightblue;
             cursor: not-allowed;
        }



    </style>

    <link rel="stylesheet" type="text/css" href="{{asset('/css/csscheckout.css')}}">
@endsection

@section('content')
    @if(session()->has('success_message'))

        <div class="alert alert-success">
            {{session()->get('success_message')}}
        </div>
    @endif

    @if(count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)

                    <li>{{$error}}</li>

                @endforeach
            </ul>
        </div>
    @endif

    <main>
        <div class="container">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    <h1>Check Out</h1>
                    <form class="Form" action="{{route('checkout.store')}}" id="payment-form" method="POST">
                        {{ csrf_field() }}
                        <input type="text" value="{{old('name')}}" id="name" name="name" placeholder="Name" required>
                        <input type="text" value="{{old('email')}}" id="email" name="email" placeholder="Email" required>

                        <input type="text" id="address" value="{{old('address')}}"name="address" placeholder="Address" required>
                        <br>
                        <input type="text" id="city" value="{{old('city')}}" name="city" placeholder="City" required>
                        <input type="text" id="province" value="{{old('province')}}" name="province" placeholder="Province" required>
                        <br>
                        <input type="text" id="PostalCode" value="{{old('PostalCode')}}" name="PostalCode" placeholder="Postal Code" required>
                        <input type="text" id="phone" value="{{old('phone')}}" name="phone" placeholder="Phone" required>
                        <br>

                        <h3>Payment Detail</h3>


                        <label for="name_on_card">Name on card</label>
                        <input type="text" id="name_on_card" value="{{old('name_on_card')}}" name="name_on_card" required> <br>

                        <label for="card-element">
                            Credit or debit card
                        </label>
                        <div id="card-element">
                            <!-- A Stripe Element will be inserted here. -->
                        </div>

                        <!-- Used to display form errors. -->
                        <div id="card-errors" role="alert"></div>
                        <button type="submit" class="btn btn-danger" id="complete-order" style="display: block; margin: 0 auto;">Complete Order</button>
                    </form>

                    <h3></h3>
                </div>
                @foreach(Cart::content() as $item)
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <div class="Your_Order col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <p id="NamaProduk">{{$item->model->name}}</p>
                            <div class="GambarProduk col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                <img src="{{ productImage($item->model->image) }}" height="100" width="100">
                            </div>
                            <div class="keterangan_produk col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                {{$item->model->description}}
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="HargaBarang">
                                    <p name="Harga Barang">{{$item->model->presentPrice()}}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <h1 style="text-align: center; margin-top: 40px;">Total: Rp{{Cart::total()}}</h1>
                    </div>

            </div>
        </div><!-- end of container -->

    </main>

@endsection

@section('extra-js')

    <script>
        (function () {

            // Create a Stripe client.
            var stripe = Stripe('pk_test_3KyqckQbsd3ZOSx5Yl0T8SN7');

// Create an instance of Elements.
            var elements = stripe.elements();

// Custom styling can be passed to options when creating an Element.
// (Note that this demo uses a wider set of styles than the guide below.)
            var style = {
                base: {
                    color: '#32325d',
                    lineHeight: '18px',
                    fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                    fontSmoothing: 'antialiased',
                    fontSize: '16px',
                    '::placeholder': {
                        color: '#aab7c4'
                    }
                },
                invalid: {
                    color: '#fa755a',
                    iconColor: '#fa755a'
                }
            };

// Create an instance of the card Element.
            var card = elements.create('card',
                {
                    style: style,
                    hidePostalCode:true
                });

// Add an instance of the card Element into the `card-element` <div>.
            card.mount('#card-element');

// Handle real-time validation errors from the card Element.
            card.addEventListener('change', function(event) {
                var displayError = document.getElementById('card-errors');
                if (event.error) {
                    displayError.textContent = event.error.message;
                } else {
                    displayError.textContent = '';
                }
            });

// Handle form submission.
            var form = document.getElementById('payment-form');
            form.addEventListener('submit', function(event) {
                event.preventDefault();

                document.getElementById('complete-order').disabled = true;

                var options = {
                    name: document.getElementById('name_on_card').value,
                    address_line1: document.getElementById('address').value,
                    address_city: document.getElementById('city').value,
                    address_state: document.getElementById('province').value,
                    address_zip: document.getElementById('PostalCode').value
                };

                stripe.createToken(card, options).then(function(result) {
                    if (result.error) {
                        // Inform the user if there was an error.
                        var errorElement = document.getElementById('card-errors');
                        errorElement.textContent = result.error.message;

                        document.getElementById('complete-order').disabled = false;
                    } else {
                        // Send the token to your server.
                        stripeTokenHandler(result.token);
                    }
                });
            });
            function stripeTokenHandler(token) {
                // Insert the token ID into the form so it gets submitted to the server
                var form = document.getElementById('payment-form');
                var hiddenInput = document.createElement('input');
                hiddenInput.setAttribute('type', 'hidden');
                hiddenInput.setAttribute('name', 'stripeToken');
                hiddenInput.setAttribute('value', token.id);
                form.appendChild(hiddenInput);

                // Submit the form
                form.submit();
            }
        })();
    </script>

@endsection