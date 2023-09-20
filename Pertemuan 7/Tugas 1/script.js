var $form = document.querySelector(".form");
var $error = document.querySelector(".error");
var $inputFields = document.querySelectorAll(".input-field");
var $email = document.getElementById("email");
var $password = document.getElementById("password");

function addError(message) {
  $error.innerHTML = message;
  $error.style.display = "block";
}

function removeError() {
  $error.innerHTML = "";
  $error.style.display = "hidden";
}

function validate(event) {
  event.preventDefault();
  removeError();

  if ($email.value === "" || $password.value === "") {
    addError("Maaf, email dan password tidak boleh kosong");
  } else if ($email.value !== "dimas@gmail.com" || $password.value !== "123") {
    addError("Email atau password salah");
  } else {
    removeError();
    alert("Anda Berhasil Login!");
    $email.value = "";
    $password.value = "";
  }
}

$form.addEventListener("submit", validate);
