document.getElementById("submit").addEventListener("click", function(event) {
    event.preventDefault(); // Prevent the form from submitting normally
  
    var form = document.getElementById("contactForm");
    var formData = new FormData(form);
  
    fetch("/.netlify/functions/submit_form", {
      method: "POST",
      body: formData
    })
    .then(function(response) {
      // Handle the server response if needed
      console.log(response);
    })
    .catch(function(error) {
      // Handle any errors that occurred during the request
      console.error(error);
    });
  });