document.addEventListener('DOMContentLoaded', function () {
  const studentSelect = document.getElementById('student_id');
  const addStudentButton = document.getElementById('addStudentButton');
  const studentList = document.getElementById('studentList');

  const subjectSelect = document.getElementById('subject_id');
  const addSubjectButton = document.getElementById('addSubjectButton');
  const subjectList = document.getElementById('subjectList');

  // Add student to the list
  addStudentButton.addEventListener('click', () => {
    const selectedOption = studentSelect.options[studentSelect.selectedIndex];
    if (selectedOption && selectedOption.value) {
      // Create list item
      const li = document.createElement('li');
      li.classList.add(
        'list-group-item',
        'd-flex',
        'justify-content-between',
        'align-items-center',
      );
      li.innerHTML = `
                ${selectedOption.text}
                <input type="hidden" name="students[]" value="${selectedOption.value}">
                <button type="button" class="btn btn-sm btn-danger remove-item">Remove</button>
            `;
      studentList.appendChild(li);

      // Remove option from dropdown
      selectedOption.remove();
    }
  });

  // Add subject to the list
  addSubjectButton.addEventListener('click', () => {
    const selectedOption = subjectSelect.options[subjectSelect.selectedIndex];
    if (selectedOption && selectedOption.value) {
      // Create list item
      const li = document.createElement('li');
      li.classList.add(
        'list-group-item',
        'd-flex',
        'justify-content-between',
        'align-items-center',
      );
      li.innerHTML = `
                ${selectedOption.text}
                <input type="hidden" name="subjects[]" value="${selectedOption.value}">
                <button type="button" class="btn btn-sm btn-danger remove-item">Remove</button>
            `;
      subjectList.appendChild(li);

      // Remove option from dropdown
      selectedOption.remove();
    }
  });

  // Handle removing students and subjects from their respective lists
  document.addEventListener('click', (event) => {
    if (event.target.classList.contains('remove-item')) {
      const li = event.target.closest('li');
      const input = li.querySelector('input');
      const value = input.value;
      const text = li.textContent.trim();

      // Determine if it is a student or subject being removed
      if (input.name === 'students[]') {
        // Add back to student dropdown
        const option = document.createElement('option');
        option.value = value;
        option.textContent = text;
        studentSelect.appendChild(option);
      } else if (input.name === 'subjects[]') {
        // Add back to subject dropdown
        const option = document.createElement('option');
        option.value = value;
        option.textContent = text;
        subjectSelect.appendChild(option);
      }

      // Remove the list item
      li.remove();
    }
  });
});
