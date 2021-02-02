// https://www.w3schools.com/howto/howto_js_toggle_password.asp
function showMdp() {
    var x = document.getElementById("myMdp");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
  }

