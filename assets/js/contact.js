    const loginForm = document.getElementById("login-form");
    const errorMsg = document.getElementById('login-error-msg');

    const checkInput = function () {
        const username = document.getElementById("username");
        const password = document.getElementById("password");

        if (username.valuelength < 4 || password.value.length < 4) {
            errorMsg.style.display = 'block';
            return true;
        }

        else {
            errorMsg.style.display = 'none';
            return false;
        }
    }

    username.addEventListener("input", checkInput)
    password.addEventListener("input", checkInput)

    loginForm?.addEventListener('submit', function (event) {
          event.preventDefault()

          var errors = checkInput();
          if (errors) {
            errorMsg.innerText = 'Votre formulaire contient une erreur'
            errorMsg.style.display = 'block'
          } else {
            this.submit()
          }
        })

    document.querySelector('form button:first-of-type')
        .addEventListener('click', () => {
          password.type = password.type === 'text' ? 'password' : 'text';
        });