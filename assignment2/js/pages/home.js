// Validate form on submit
function validateForm() {
  let valid = true;

  if (!validateName()) valid = false;
  if (!validateEmail()) valid = false;
  if (!validatePosition()) valid = false;
  if (!validateStatus()) valid = false;

  return valid;
}

// Name validation: Not empty, at least 2 characters, and alphabet only
function validateName() {
  const nameInput = document.getElementById("name");
  const nameError = document.getElementById("nameError");
  const name = nameInput.value.trim();

  const namePattern = /^[A-Za-z ]+$/;

  if (name === "") {
    nameError.textContent = "Name is required";
    nameInput.classList.add("error-border");
    return false;
  } else if (name.length < 2) {
    nameError.textContent = "Name must be at least 2 characters";
    nameInput.classList.add("error-border");
    return false;
  } else if (!namePattern.test(name)) {
    nameError.textContent = "Name can only contain alphabets";
    nameInput.classList.add("error-border");
    return false;
  } else {
    nameError.textContent = "";
    nameInput.classList.remove("error-border");
    return true;
  }
}

// Email validation: Not empty, proper email format
function validateEmail() {
  const emailInput = document.getElementById("email");
  const emailError = document.getElementById("emailError");
  const email = emailInput.value.trim();

  const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

  if (email === "") {
    emailError.textContent = "Email is required";
    emailInput.classList.add("error-border");
    return false;
  } else if (email.length < 5) {
    emailError.textContent = "Email must be at least 5 characters";
    emailInput.classList.add("error-border");
    return false;
  } else if (!emailPattern.test(email)) {
    emailError.textContent = "Invalid email format";
    emailInput.classList.add("error-border");
    return false;
  } else {
    emailError.textContent = "";
    emailInput.classList.remove("error-border");
    return true;
  }
}

// Position validation: Not empty
function validatePosition() {
  const positionInput = document.getElementById("position");
  const positionError = document.getElementById("positionError");
  const position = positionInput.value.trim();

  if (position === "") {
    positionError.textContent = "Position is required";
    positionInput.classList.add("error-border");
    return false;
  } else {
    positionError.textContent = "";
    positionInput.classList.remove("error-border");
    return true;
  }
}

// Status validation: Must select one option
function validateStatus() {
  const statusSelected = document.querySelector('input[name="status"]:checked');
  const statusError = document.getElementById("statusError");

  if (!statusSelected) {
    statusError.textContent = "Please select a status";
    return false;
  } else {
    statusError.textContent = "";
    return true;
  }
}

/* PREVIEW BUTTON */
$("#previewBtn").on("click", function () {
  if (validateForm()) {
    $("#previewBtn").prop("disabled", true).html("Please wait...");

    let formData = {
      candidateName: $("#name").val(),
      candidateEmail: $("#email").val(),
      position: $("#position").val(),
      status: $("input[name='status']:checked").val(),
      action: "0",
    };

    $.ajax({
      url: "/api/send-email",
      type: "POST",
      contentType: "application/json",
      data: JSON.stringify(formData), // Convert the form data to JSON
      dataType: "json",
      success: function (response) {
        $("#previewBtn").prop("disabled", false).html("Preview");
        modal.style.display = "block";
        modal.classList.remove("fade-out");
        modal.classList.add("fade-in");
        const templateData = document.getElementById("templateData");
        templateData.innerText = response.message;
      },
      error: function (xhr, status, error) {
        $("#previewBtn").prop("disabled", false).html("Preview");
        Swal.fire({
          title: "Error!",
          text: "There was an error fetching the message.",
          icon: "error",
          timer: 2000, // Close after 2 seconds
          showConfirmButton: false,
        });
        console.error(xhr.responseText);
      },
    });
  }
});
/* /PREVIEW BUTTON */

/* OPEN PREVIEW MODAL */

const modal = document.getElementById("modal");
const closeBtns = document.querySelectorAll(".close-btn");
const sendBtn = document.getElementById("sendBtn");

// Close the modal
function closeModal() {
  modal.classList.remove("fade-in");
  modal.classList.add("fade-out");

  setTimeout(() => {
    modal.style.display = "none";
    modal.classList.remove("fade-out");
  }, 500);
}

// Close modal on clicking close buttons
closeBtns.forEach((btn) => {
  btn.onclick = closeModal;
});

// Close the modal when clicking anywhere outside the modal content
window.onclick = function (event) {
  if (event.target === modal) {
    closeModal();
  }
};

/* /OPEN PREVIEW MODAL */

/* SEND TEMPLATE */
$("#sendBtn").on("click", function () {
  if (validateForm()) {
    $("#sendBtn").prop("disabled", true).html("Sending...");
    let formData = {
      candidateName: $("#name").val(),
      candidateEmail: $("#email").val(),
      position: $("#position").val(),
      status: $("input[name='status']:checked").val(),
      action: "1",
    };

    $.ajax({
      url: "/api/send-email",
      type: "POST",
      contentType: "application/json",
      data: JSON.stringify(formData),
      dataType: "json",
      success: function (response) {
        $("#sendBtn")
          .prop("disabled", false)
          .html('<i class="fa-solid fa-paper-plane"></i> Send');

        Swal.fire({
          title: "Email Sent!",
          text: "The email has been successfully sent.",
          icon: "success",
          timer: 2000, // Close after 2 seconds
          showConfirmButton: false,
        });
        $("#candidateForm")[0].reset();
        modal.style.display = "none";
        modal.classList.add("fade-out");
        modal.classList.remove("fade-in");
      },
      error: function (xhr, status, error) {
        $("#sendBtn")
          .prop("disabled", false)
          .html('<i class="fa-solid fa-paper-plane"></i> Send');
        Swal.fire({
          title: "Error!",
          text: "There was an error sending the Email.",
          icon: "error",
          timer: 2000, // Close after 2 seconds
          showConfirmButton: false,
        });
        console.error(xhr.responseText);
      },
    });
  }
});
/* /SEND TEMPLATE */
