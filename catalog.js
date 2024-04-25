document.addEventListener("DOMContentLoaded", function() {
    // Получаем элементы формы и карточки товаров
    const form = document.querySelector("form");
    const categorySelect = document.getElementById("category");
    const colorSelect = document.getElementById("color");
    const searchInput = document.querySelector(".search input");
    const productCards = document.querySelectorAll(".product-card");
  
    // Обработчик события submit формы
    form.addEventListener("submit", function(e) {
      e.preventDefault();
      filterProducts();
    });
  
    // Обработчик события input при вводе в поле поиска
    searchInput.addEventListener("input", function() {
      filterProducts();
    });
  
    // Функция фильтрации товаров
    function filterProducts() {
      const categoryValue = categorySelect.value;
      const colorValue = colorSelect.value;
      const searchValue = searchInput.value.toLowerCase();
  
      productCards.forEach(function(card) {
        const cardCategory = card.getAttribute("data-category");
        const cardColor = card.getAttribute("data-color");
        const cardName = card.querySelector("h3").textContent.toLowerCase();
        
        // Проверка соответствия фильтрам
        const categoryMatch = (categoryValue === "" || cardCategory === categoryValue);
        const colorMatch = (colorValue === "" || cardColor === colorValue);
        const searchMatch = cardName.includes(searchValue);
        
        // Отображение или скрытие товаров
        if (categoryMatch && colorMatch && searchMatch) {
          card.style.display = "block";
        } else {
          card.style.display = "none";
        }
      });
    }
  });

  