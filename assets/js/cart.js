document.addEventListener('DOMContentLoaded', () => {
    // Add to Cart
    document.querySelectorAll('.add-to-cart').forEach(button => {
        button.addEventListener('click', () => {
            const isbn_13 = button.getAttribute('data-id');
            const quantityInput = document.querySelector(`input[data-id="${isbn_13}"]`);
            const quantity = quantityInput ? parseInt(quantityInput.value) : 1; // Use the specified quantity

            fetch('../cart/add_to_cart.php', { 
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ isbn_13: isbn_13, quantity: quantity })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    const cartSummary = document.querySelector('#cart-summary');
                    if (cartSummary) {
                        cartSummary.textContent = `${data.total_items} items - £${data.total_cost.toFixed(2)}`;
                    }
                } else {
                    alert('Failed to add item to cart');
                }
            })
            .catch(error => console.error('Error:', error));
        });
    });

    // Increment and Decrement Quantity
    document.querySelectorAll('.quantity .decrease, .quantity .increase').forEach(button => {
        button.addEventListener('click', () => {
            const isbn_13 = button.getAttribute('data-id');
            const quantityInput = document.querySelector(`input[data-id="${isbn_13}"]`);
            let quantity = parseInt(quantityInput.value);

            if (button.classList.contains('decrease') && quantity > 1) {
                quantity--;
            } else if (button.classList.contains('increase')) {
                quantity++;
            }

            quantityInput.value = quantity;

            fetch('../cart/update_cart.php', { 
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ isbn_13: isbn_13, quantity: quantity })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    location.reload(); // Reload the page to reflect the updated cart
                } else {
                    alert('Failed to update item quantity');
                }
            })
            .catch(error => console.error('Error:', error));
        });
    });

    // Delete from Cart
    document.querySelectorAll('.delete-from-cart').forEach(button => {
        button.addEventListener('click', () => {
            const isbn_13 = button.getAttribute('data-id');

            fetch('../cart/delete_from_cart.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ isbn_13: isbn_13 })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    location.reload();
                } else {
                    alert('Failed to delete item from cart');
                }
            })
            .catch(error => console.error('Error:', error));
        });
    });

    // Empty Cart
    const emptyCartButton = document.getElementById('empty-cart');
    if (emptyCartButton) {
        emptyCartButton.addEventListener('click', () => {
            fetch('../cart/cancel_cart.php', {
                method: 'POST'
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    location.reload();
                } else {
                    alert('Failed to empty cart');
                }
            })
            .catch(error => console.error('Error:', error));
        });
    }
});