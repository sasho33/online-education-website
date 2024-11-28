document.addEventListener('DOMContentLoaded', function () {
  // Generic function to handle dropdown changes for students or subjects
  function setupDropdownHandler(dropdownId, listId, inputName) {
    const dropdown = document.getElementById(dropdownId);
    const list = document.getElementById(listId);

    if (!dropdown || !list) return; // Exit if elements are not present on the page

    // Handle dropdown changes
    dropdown.addEventListener('change', function () {
      const selectedOption = dropdown.options[dropdown.selectedIndex];

      if (selectedOption && selectedOption.value) {
        // Add to the list
        const li = document.createElement('li');
        li.classList.add('list-group-item', 'd-flex', 'justify-content-between');
        li.innerHTML = `
          ${selectedOption.text}
          <input type="hidden" name="${inputName}[]" value="${selectedOption.value}">
          <button type="button" class="btn btn-sm btn-danger remove-item"><i class="fa fa-trash"></i></button>
        `;
        list.appendChild(li);

        // Remove the selected option from the dropdown
        selectedOption.remove();
      }
    });

    // Handle removing items from the list
    list.addEventListener('click', function (event) {
      if (event.target.classList.contains('remove-item')) {
        const li = event.target.parentElement;
        const itemId = li.querySelector('input').value;
        const itemText = li.textContent.trim();

        // Add back to dropdown
        const option = document.createElement('option');
        option.value = itemId;
        option.textContent = itemText;
        dropdown.appendChild(option);

        // Remove from list
        li.remove();
      }
    });
  }

  // Initialize handlers for students and subjects
  setupDropdownHandler('student_id', 'studentList', 'student_ids');
  setupDropdownHandler('subject_id', 'subjectList', 'subject_ids');
});
