document.addEventListener("DOMContentLoaded", function() {
  const addToCartButtons = document.querySelectorAll(".button");

  addToCartButtons.forEach(function(button) {
    button.addEventListener("click", function(e) {
      e.preventDefault();

      const productName = this.parentNode.querySelector("h3").textContent;
      const productPrice = this.textContent;

      addToCart(productName, productPrice);
    });
  });

  function addToCart(name, price) {
    const cartItems = JSON.parse(localStorage.getItem("cartItems")) || [];
    const newItem = { name: name, price: price };
    cartItems.push(newItem);
    localStorage.setItem("cartItems", JSON.stringify(cartItems));

    updateCart();
  }

  function updateCart() {
    const cartItems = JSON.parse(localStorage.getItem("cartItems")) || [];
    const cartItemsContainer = document.getElementById("cart-items");
    const totalPriceElement = document.getElementById("total-price");

    cartItemsContainer.innerHTML = "";
    let totalPrice = 0;

    if (cartItems.length > 0) {
      cartItems.forEach(function(item) {
        const newRow = document.createElement("tr");
        newRow.innerHTML = `
          <td>${item.name}</td>
          <td>${item.price}</td>
          <td>1</td>
          <td>${item.price}</td>
        `;
        cartItemsContainer.appendChild(newRow);

        totalPrice += parseFloat(item.price);
      });
    }

    totalPriceElement.textContent = `Итого: ${totalPrice} руб.`;

    // Отправляем данные на сервер при обновлении корзины
    sendOrderData(totalPrice);
  }

  function sendOrderData(totalPrice) {
    const orderData = {
      // Здесь можно добавить другие данные о заказе
      totalPrice: totalPrice.toFixed(2)
    };

    fetch('process_order.php', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
      },
      body: JSON.stringify(orderData),
    })
    .then(response => response.text())
    .then(data => {
      console.log(data); // Выводим ответ от сервера в консоль
    })
    .catch((error) => {
      console.error('Error:', error);
    });
  }
});



  