document
  .getElementById("halfDayCheckbox")
  .addEventListener("change", function () {
    const checkboxes = document.querySelectorAll(
      'tbody td:nth-child(3) input[type="checkbox"], tbody td:nth-child(4),tbody td:nth-child(5),tbody td:nth-child(6),tbody td:nth-child(7)'
    );
    if (this.checked) {
      checkboxes.forEach((checkbox) => {
        const td = checkbox.closest("td");

        // Check if dropdown doesn't exist already
        if (!td.querySelector("select")) {
          const dropdown = document.createElement("select");
          dropdown.innerHTML = `
  <option value="full day" selected>Full Day</option>
  <option value="1st half">1st Half</option>
  <option value="2nd half">2nd Half</option>
`;
          dropdown.classList.add(
            "ml-2", // Margins
            "border", // Styling for the dropdown
            "border-gray-300",
            "rounded",
            "p-1", // Padding
            "form-select"
          );
          td.appendChild(dropdown);
        }
      });
    } else {
      checkboxes.forEach((checkbox) => {
        const td = checkbox.closest("td");
        const dropdown = td.querySelector("select");

        // Remove the dropdown and reset display to block when unchecked
        if (dropdown) {
          dropdown.remove();
        }
      });
    }
  });
