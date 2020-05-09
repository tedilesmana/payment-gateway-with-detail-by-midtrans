<button id="pay-button">Pay!</button>

<!-- TODO: Remove ".sandbox" from script src URL for production environment. Also input your client key in "data-client-key" -->
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-IVqeQWkzZZQ02gV-"></script>
<script type="text/javascript">
  document.getElementById('pay-button').onclick = function(){
// This is minimal request body as example.
// Please refer to docs for all available options: 
// https://snap-docs.midtrans.com/#json-parameter-request-body
// TODO: you should change this gross_amount and order_id to your desire. 




  var billing_address = {
      first_name: "Andri",
      last_name: "Litani",
      address: "Mangga 20",
      city: "Jakarta",
      postal_code: "16602",
      phone: "081122334455",
      country_code: 'IDN'
  }
  var shipping_address = {
      first_name: "Obet",
      last_name: "Supriadi",
      address: "Manggis 90",
      city: "Jakarta",
      postal_code: "16601",
      phone: "08113366345",
      country_code: 'IDN'
  }
 

var requestBody = {
  transaction_details: {
      gross_amount: 145000,
      // as example we use timestamp as order ID
      order_id: 'T-' + Math.round((new Date()).getTime() / 1000)
  },
  item_details: 
  [
      {
          id: 'a1',
          price: 50000,
          quantity: 2,
          name: 'apple'
      },
      {
          id: 'a2',
          price: 45000,
          quantity: 1,
          name: 'orange'
      }
  ],
  customer_details: {
      first_name: "Andri", 
      last_name: "Litani", 
      email: "andri@litani.com", 
      phone: "081122334455", 
      billing_address: billing_address, 
      shipping_address: shipping_address 
  },
  credit_card: {
      secure: true
  }
}

getSnapToken(requestBody, function(response){
  var response = JSON.parse(response);
  snap.pay(response.token);
})
  };
  /**
  * Send AJAX POST request to checkout.php, then call callback with the API response
  * @param {object} requestBody: request body to be sent to SNAP API
  * @param {function} callback: callback function to pass the response
  */
  function getSnapToken(requestBody, callback) {
var xmlHttp = new XMLHttpRequest();
xmlHttp.onreadystatechange = function() {
  if(xmlHttp.readyState == 4 && xmlHttp.status == 200) {
    callback(xmlHttp.responseText);
  }
}
xmlHttp.open("post", "http://localhost/payment/welcome/checkout");
xmlHttp.send(JSON.stringify(requestBody));
  }
</script>