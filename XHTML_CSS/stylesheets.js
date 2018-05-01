// SKRYPT DO PODMIENIANIA CSSOW

function setCSS(styleTitle) {
  document.cookie = "style=" + styleTitle;
  var a, main;
  for (var j = 0; (a = document.getElementsByTagName("link")[j]); j++) {
    if (
      a.getAttribute("rel").indexOf("style") != -1 &&
      a.getAttribute("title")
    ) {
      a.disabled = true;
      if (a.getAttribute("title") == styleTitle) {
        a.disabled = false;
      }
    }
  }
}

function loadSelect(value) {
  for (var i = 0; i < document.getElementsByTagName("link").length; i++) {
    if (document.getElementsByTagName("link")[i].title) {
      var option = document.createElement("option");
      option.text = document.styleSheets[i].title;
      document.getElementById("stylesSelect").add(option);
    }
  }

  document.getElementById("stylesSelect").value = value;
}

function readCookie(name) {
  var nameEQ = name + "=";
  var ca = document.cookie.split(";");
  for (var i = 0; i < ca.length; i++) {
    var c = ca[i];
    while (c.charAt(0) == " ") c = c.substring(1, c.length);
    if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
  }
  return null;
}

// adding buttons for each style with a title
document.addEventListener("DOMContentLoaded", function(event) {
  var cookieStylesheet =
    readCookie("style") != null
      ? readCookie("style")
      : document.styleSheets[0].title;

  loadSelect(cookieStylesheet);
  setCSS(cookieStylesheet);
});
