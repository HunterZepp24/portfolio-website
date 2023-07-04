document.getElementById("submit").addEventListener("click", function(event) {
    event.preventDefault(); // Prevent the form from submitting normally
  
    var form = document.getElementById("contactForm");
    var formData = new FormData(form);
  
    // Create an XMLHttpRequest object
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "submit_form.php", true);
    xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");
  
    xhr.onreadystatechange = function() {
      if (xhr.readyState === 4 && xhr.status === 200) {
        // Handle the server response if needed
        console.log(xhr.responseText);
      }
    };
  
    // Send the form data to the server
    xhr.send(formData);
  });
  