<?php
require 'vendor/autoload.php';
 \Stripe\Stripe::setApiKey('sk_test_51LPPKkSIdG5beICrZ7B6QI48Ittxo1vsUFJRQ6gltnsckulyY5iSbdjWEYQ3epsUmK24ltgwz2EumD3YreHMBxps003g1DxonL');

  $checkout_session = \Stripe\Checkout\Session::create([
      'success_url' => 'http://localhost/stripe-subscription/success.php',
      'cancel_url' => 'http://localhost/stripe-subscription/cancel.html',
      'payment_method_types' => ['card'],
      'mode' => 'subscription',
      'line_items' => [[
        'price' => "price_1LPWbPSIdG5beICrgjClgEAE",
        
        // For metered billing, do not pass quantity
        'quantity' => 1,
      ]],
    ]);

    

    
    
    
?>
<head>
  <title>Richpanel Subscription</title>
  <script src="https://js.stripe.com/v3/"></script>
</head>
<body>
  <script type="text/javascript">
     var stripe = Stripe('pk_test_51LPPKkSIdG5beICrCizEVJx7ho9SSnHv0zQz3trw0VoRjs6ZdBm8d2TuMOZTzEeXVMXBGWEsf3sqZs11skxrGwOx00nsKVEaPx');
     var session = "<?php echo $checkout_session['id']; ?>";
          stripe.redirectToCheckout({ sessionId: session })
                  .then(function(result) {
          // If `redirectToCheckout` fails due to a browser or network
          // error, you should display the localized error message to your
          // customer using `error.message`.
          if (result.error) {
            alert(result.error.message);
          }
        })
        .catch(function(error) {
          console.error('Error:', error);
        });          



  </script>
  
</body>