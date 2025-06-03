<?php
function buildCustomerEmail($name, $orderId, $cart, $totalAmount, $deliveryMethod) {
    $itemsHtml = '';
    foreach ($cart as $item) {
        $product = $item['name'] . " ({$item['type']})";
        $qty = $item['quantity'];
        $price = number_format($item['price'], 2);
        $itemsHtml .= "<tr><td>$product</td><td>$qty</td><td>\$$price</td></tr>";
    }

    return "
    <html>
    <head><style>
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 10px; border: 1px solid #ccc; text-align: left; }
        th { background-color: #f4f4f4; }
    </style></head>
    <body>
        <h2>Thanks for your order, $name! 🎉</h2>
        <p>Your order <strong>#$orderId</strong> has been placed successfully.</p>
        <p><strong>Delivery Method:</strong> $deliveryMethod</p>
        <table>
            <thead><tr><th>Item</th><th>Qty</th><th>Price</th></tr></thead>
            <tbody>$itemsHtml</tbody>
        </table>
        <p><strong>Total Paid:</strong> \$" . number_format($totalAmount, 2) . "</p>
        <p>We’ll notify you once your order is on the way.</p>
        <p>🍞 Thank you for choosing CBD Bakery!</p>
    </body>
    </html>
    ";
}
?>
