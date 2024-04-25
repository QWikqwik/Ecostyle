// Функция для обработки формы регистрации
function registerFormHandler(event) {
    event.preventDefault(); // Отменить отправку формы
  
    // Получить значения полей формы
    const name = document.getElementById('name').value;
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;
    const role = document.getElementById('role').value;
  
    // Отправить запрос на сервер для регистрации нового пользователя
    fetch('/register', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json'
      },
      body: JSON.stringify({ name, email, password, role })
    })
    .then(response => response.json())
    .then(data => {
      // Обработать ответ от сервера
      if (data.success) {
        alert('Регистрация прошла успешно. Теперь вы можете войти.');
      } else {
        alert('Ошибка при регистрации.');
      }
    })
    .catch(error => {
      console.error('Произошла ошибка:', error);
    });
  }
  
  // Функция для обработки формы входа
  function loginFormHandler(event) {
    event.preventDefault(); // Отменить отправку формы
  
    // Получить значения полей формы
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;
  
    // Отправить запрос на сервер для входа пользователя
    fetch('/login', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json'
      },
      body: JSON.stringify({ email, password })
    })
    .then(response => response.json())
    .then(data => {
      // Обработать ответ от сервера
      if (data.success) {
        // Вход выполнен успешно
        if (data.role === 'admin') {
          // Перенаправление на страницу администратора
          window.location.href = '/admin';
        } else {
          // Перенаправление на страницу пользователя
          window.location.href = '/user';
        }
      } else {
        alert('Ошибка входа. Проверьте правильность введенных данных.');
      }
    })
    .catch(error => {
      console.error('Произошла ошибка:', error);
    });
  }
  
  // Назначить обработчики событий для форм регистрации и входа
  document.getElementById('registerForm').addEventListener('submit', registerFormHandler);
  document.getElementById('loginForm').addEventListener('submit', loginFormHandler);
  