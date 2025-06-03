function updateQty(productId, type, delta) {
  const input = document.getElementById(`qty-${type}-${productId}`);
  if (!input) return;

  let qty = parseInt(input.value) || 1;
  qty += delta;
  qty = qty < 1 ? 1 : qty;
  input.value = qty;

  updateSubtotal(productId, type, qty);
}

function updateSubtotal(productId, type, qty) {
  const priceEl = document.getElementById(`price-${type}-${productId}`);
  const subtotalEl = document.getElementById(`subtotal-${type}-${productId}`);

  if (priceEl && subtotalEl) {
    const unitPrice = parseFloat(priceEl.dataset.price);
    const subtotal = (unitPrice * qty).toFixed(2);
    subtotalEl.textContent = `$${subtotal}`;
  }
}
