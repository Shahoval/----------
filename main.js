// Перевірка форми перед відправленням
function checkForm() {
    var name = document.getElementById("name").value;
    var subject = document.getElementById("subject").value;
    var message = document.getElementById("message").value;
    
    if (name === "" || subject === "" || message === "") {
      alert("Будь ласка, заповніть всі поля форми.");
      return false;
    }
    return true;
  }
  