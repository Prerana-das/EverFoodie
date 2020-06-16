<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>EverFoodie</title>

        <!-- Fonts -->
        <!-- Fontawesome css -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

        <link href="https://fonts.googleapis.com/css?family=Barlow+Semi+Condensed:300,400,500,700,800,900&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" >

        <link rel="stylesheet" href="{{asset('assets/css/owl.carousel.min.css')}}" />

        <link rel="stylesheet" type="text/css" href="{{asset('assets/css/common.css')}}" media="all" />

        <!-- <link rel="stylesheet" type="text/css" href="{{asset('assets/css/admin_style.css')}}" media="all" /> -->


        <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}" media="all" />
        <script src="https://js.stripe.com/v2/"></script>
        <script src="https://js.stripe.com/v3/"></script>
    </head>
    <body>
        <div id="app">
            <master_header></master_header>

        </div>
    

       
       <div class="container">
            <div class="row">
                <div class="col-md-5">
                  <div class="delivery_details_1 _box_shadow _padd20 _mar_b30 _mar_t100">
                      @if(Session::has('success_message'))
                          <div class="alert alert-success">
                            <h5>{{ session('success_message') }}  </h5>
                            <h6>Go back to home page -> <a href="/">Home</a> </h6>
                          </div>
                      @endif
                      <form action="{{ url('/checkout/stripepayment') }}" method="POST" id="payment-form">
                          {{ csrf_field() }}
                          <div class="form-group">
                              <label for="email">Email Address</label>
                              <input type="email" class="form-control" id="email" value="{{ Auth::user()->email }}">
                          </div>
                          <input type="hidden" class="form-control" id="user_id" name="user_id" value="{{ Auth::user()->id }}">
                          <div class="form-group">
                              <label for="name_on_card">Name</label>
                              <input type="text" class="form-control" id="name_on_card" value="{{ Auth::user()->name }}">
                          </div>
                          <div class="form-group">
                              <label for="address">Address</label>
                              <input type="text" class="form-control" id="address" name="address" value="{{ Auth::user()->address }}">
                          </div>
          
                          <div class="form-group">
                              <label for="phone">Phone</label>
                              <input type="text" class="form-control" id="phone" name="phone" value="{{ Auth::user()->phone }}">
                          </div>

                          <div class="form-group">
                              <label for="total">Price</label>
                              <input type="text" class="form-control" id="total" name="total" readonly>
                          </div>

                          <div class="form-group">
                              <label for="card-element">Credit Card</label>
                              <div id="card-element">
                                <!-- a Stripe Element will be inserted here. -->
                            </div> 

                            <!-- Used to display form errors -->
                            <div id="card-errors" role="alert"></div>
                            </div>

                            <div class="spacer"></div>

                          <button type="submit" class="btn block_btn _mar_t20">Submit Payment</button>
                      </form>

                    </div>
                  </div>
                </div>
            </div>
            
       </div>


        <script>
            (function () {
                window.Laravel = {
                    csrfToken: '{{ csrf_token() }}'
                };
                @if(Auth::check())
                    window.authUser={!! Auth::user() !!}
                    @else
                    window.authUser=false
                    @endif



                    console.log(localStorage.getItem('total'));



                    var totalvalue = localStorage.getItem('total');


                    // function UserAction() {
                    //         //get roll no from localstorage
                    //         var totalvalue = localStorage.getItem('total');
                    //         document.getElementById('total').value = totalvalue;
                    //       }

                  // document.getElementById('total').value = totalvalue;


             document.getElementById('total').value = localStorage.getItem('total');

              
              // Create a Stripe client
                var stripe = Stripe('{{ config('services.stripe.key') }}');
                // Create an instance of Elements
                var elements = stripe.elements();
                // Custom styling can be passed to options when creating an Element.
                // (Note that this demo uses a wider set of styles than the guide below.)
                var style = {
                  base: {
                    color: '#32325d',
                    lineHeight: '18px',
                    fontFamily: '"Raleway", Helvetica, sans-serif',
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
                // Create an instance of the card Element
                var card = elements.create('card', {
                    style: style,
                    hidePostalCode: true
                });
                // Add an instance of the card Element into the `card-element` <div>
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


                // Handle form submission
                var form = document.getElementById('payment-form');
                form.addEventListener('submit', function(event) {
                  event.preventDefault();

                  var options = {
                    name: document.getElementById('name_on_card').value,
                    total: document.getElementById('total').value,
                    email: document.getElementById('email').value,
                    address: document.getElementById('address').value,
                    phone: document.getElementById('phone').value,
                    user_id: document.getElementById('user_id').value,
                  }


                  stripe.createToken(card, options).then(function(result) {
                    if (result.error) {
                      // Inform the user if there was an error
                      var errorElement = document.getElementById('card-errors');
                      errorElement.textContent = result.error.message;
                    } else {
                      // Send the token to your server
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
        
        <script src="/js/app.js"></script>
        <script src="{{asset('assets/js/jquery-1.12.4.min.js')}}"></script>
        <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
        <script src="{{asset('assets/js/script.js')}}"></script>
    </body>
</html>