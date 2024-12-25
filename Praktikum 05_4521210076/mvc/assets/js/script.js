// A simple alert message when the page is loaded
window.onload = function () {
  alert("Welcome to the simple web page!");
};

// Function to change the background color when a button is clicked
function changeBackgroundColor() {
  document.body.style.backgroundColor = "#e0e0e0";
}

// Function to display a dynamic message
function displayMessage() {
  let message = "You clicked the button!";
  document.getElementById("dynamicMessage").innerText = message;
}
