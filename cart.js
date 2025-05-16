function updateQty(productId, type, delta) {
    const input = document.getElementById(`qty-${type}-${productId}`);
    let qty = parseInt(input.value) + delta;
    qty = qty < 1 ? 1 : qty;
    input.value = qty;
  }
  