<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Payment Page</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f4f4f4;
      padding: 20px;
    }
    .container {
      max-width: 700px;
      background: #fff;
      padding: 25px;
      border-radius: 10px;
      box-shadow: 0 0 15px rgba(0,0,0,0.1);
      margin: auto;
    }
    h2 {
      text-align: center;
      margin-bottom: 25px;
    }
    .order-summary {
      margin-bottom: 20px;
    }
    .secure {
      color: green;
      margin-bottom: 10px;
    }
    .payment-method {
      margin-bottom: 15px;
    }
    .form-group {
      margin-bottom: 12px;
    }
    label {
      display: block;
      margin-bottom: 6px;
    }
    input[type="text"],
    input[type="email"],
    input[type="number"],
    select {
      width: 100%;
      padding: 8px;
      border-radius: 6px;
      border: 1px solid #ccc;
    }
    .hidden {
      display: none;
    }
    .address-toggle {
      margin-top: 10px;
    }
    .error {
      color: red;
      font-size: 14px;
    }
    .success {
      color: green;
      font-size: 16px;
      text-align: center;
      margin-top: 20px;
    }
    button {
      padding: 10px 20px;
      background: #28a745;
      color: white;
      border: none;
      border-radius: 6px;
      cursor: pointer;
    }
    button:hover {
      background: #218838;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Payment</h2>

    <div class="order-summary">
      <h3>Order Summary</h3>
      <p>Product: CBD Chocolate Cake</p>
      <p>Quantity: 1</p>
      <p>Total: <strong>$25.00</strong></p>
    </div>

    <div class="secure">🔒 Your payment is secured with SSL encryption.</div>

    <form id="paymentForm">
      <div class="payment-method">
        <label>Payment Method:</label>
        <input type="radio" name="payment" value="card" checked> Credit Card
        <input type="radio" name="payment" value="paypal"> PayPal
      </div>

      <div id="cardDetails">
        <div class="form-group">
          <label>Card Number</label>
          <input type="text" id="cardNumber" maxlength="16" required />
        </div>
        <div class="form-group">
          <label>Expiry Date (MM/YY)</label>
          <input type="text" id="expiryDate" placeholder="MM/YY" required />
        </div>
        <div class="form-group">
          <label>CVV</label>
          <input type="text" id="cvv" maxlength="4" required />
        </div>
      </div>

      <div id="paypalDetails" class="hidden">
        <div class="form-group">
          <label>PayPal Email</label>
          <input type="email" id="paypalEmail" />
        </div>
      </div>

      <div class="form-group">
        <input type="checkbox" id="sameAddress" checked />
        <label for="sameAddress">Billing address same as delivery</label>
      </div>

      <div id="billingAddress" class="hidden">
        <div class="form-group">
          <label>Billing Address</label>
          <input type="text" id="billingAddr" />
        </div>
        <div class="form-group">
          <label>City</label>
          <input type="text" id="billingCity" />
        </div>
        <div class="form-group">
          <label>ZIP Code</label>
          <input type="text" id="billingZip" />
        </div>
      </div>

      <div id="errorMessage" class="error"></div>
      <button type="submit">Pay Now</button>

      <div id="successMessage" class="success"></div>
    </form>
  </div>

  <script>
    const paymentForm = document.getElementById("paymentForm");
    const sameAddress = document.getElementById("sameAddress");
    const billingAddress = document.getElementById("billingAddress");
    const paymentRadios = document.getElementsByName("payment");
    const cardDetails = document.getElementById("cardDetails");
    const paypalDetails = document.getElementById("paypalDetails");
    const errorMessage = document.getElementById("errorMessage");
    const successMessage = document.getElementById("successMessage");

    // Toggle billing address section
    sameAddress.addEventListener("change", () => {
      billingAddress.classList.toggle("hidden", sameAddress.checked);
    });

    // Toggle payment method fields
    paymentRadios.forEach(radio => {
      radio.addEventListener("change", () => {
        if (radio.value === "card" && radio.checked) {
          cardDetails.classList.remove("hidden");
          paypalDetails.classList.add("hidden");
        } else {
          cardDetails.classList.add("hidden");
          paypalDetails.classList.remove("hidden");
        }
      });
    });

    // Form validation
    paymentForm.addEventListener("submit", function (e) {
      e.preventDefault();
      errorMessage.textContent = "";
      successMessage.textContent = "";

      const selectedMethod = [...paymentRadios].find(r => r.checked).value;

      if (selectedMethod === "card") {
        const cardNumber = document.getElementById("cardNumber").value.trim();
        const expiryDate = document.getElementById("expiryDate").value.trim();
        const cvv = document.getElementById("cvv").value.trim();

        if (!/^\d{16}$/.test(cardNumber)) {
          return (errorMessage.textContent = "Invalid card number. Must be 16 digits.");
        }

        if (!/^(0[1-9]|1[0-2])\/\d{2}$/.test(expiryDate)) {
          return (errorMessage.textContent = "Invalid expiry date. Use MM/YY format.");
        }

        if (!/^\d{3,4}$/.test(cvv)) {
          return (errorMessage.textContent = "Invalid CVV. Must be 3 or 4 digits.");
        }
      } else {
        const paypalEmail = document.getElementById("paypalEmail").value.trim();
        if (!/^\S+@\S+\.\S+$/.test(paypalEmail)) {
          return (errorMessage.textContent = "Invalid PayPal email.");
        }
      }

      // If billing address is required
      if (!sameAddress.checked) {
        const addr = document.getElementById("billingAddr").value.trim();
        const city = document.getElementById("billingCity").value.trim();
        const zip = document.getElementById("billingZip").value.trim();

        if (!addr || !city || !zip) {
          return (errorMessage.textContent = "Please complete all billing address fields.");
        }
      }

      // Simulate successful payment
      successMessage.textContent = "✅ Payment Successful! Thank you for your order.";
      paymentForm.reset();
      billingAddress.classList.add("hidden");
      paypalDetails.classList.add("hidden");
      cardDetails.classList.remove("hidden");
    });
  </script>
</body>
</html>
