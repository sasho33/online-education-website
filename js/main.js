// // Function to load HTML from a file and insert it into an element
// async function loadHTML(filePath, elementId) {
//   try {
//     const response = await fetch(filePath);
//     if (!response.ok) throw new Error(`Failed to load ${filePath}`);
//     const content = await response.text();
//     document.getElementById(elementId).innerHTML = content;
//   } catch (error) {
//     console.error('Error loading HTML:', error);
//   }
// }

// // Load header and footer into their respective placeholders
// loadHTML('../pages/header.html', 'header-placeholder');
// loadHTML('../pages/footer.html', 'footer-placeholder');

document.addEventListener('DOMContentLoaded', async function () {
  const calendarEl = document.getElementById('calendar');
  const events = [];

  try {
    const response = await fetch('../../db/controllers/get-assignments.php');
    const assignments = await response.json();

    assignments.forEach((assignment) => {
      events.push({
        title: assignment.Title,
        start: assignment.DueDate,
        color: '#007bff', // Bootstrap primary color
      });
    });
  } catch (error) {
    console.error('Failed to fetch assignments:', error);
  }

  const calendar = new FullCalendar.Calendar(calendarEl, {
    initialView: 'dayGridMonth',
    themeSystem: 'bootstrap5',
    events,
  });
  calendar.render();
});

function displaySelectedFiles(input, targetId) {
  const fileList = document.querySelector(`#${targetId} ul`);
  fileList.innerHTML = ''; // Clear the existing list

  const files = Array.from(input.files); // Convert file list to array

  files.forEach((file, index) => {
    const li = document.createElement('li');
    li.classList.add('list-group-item', 'd-flex', 'justify-content-between', 'align-items-center');
    li.textContent = file.name;

    const removeButton = document.createElement('button');
    removeButton.classList.add('btn', 'btn-sm', 'btn-danger');
    removeButton.textContent = 'Remove';

    removeButton.addEventListener('click', () => {
      files.splice(index, 1);
      const dataTransfer = new DataTransfer();
      files.forEach((f) => dataTransfer.items.add(f));
      input.files = dataTransfer.files; // Update the file input
      displaySelectedFiles(input, targetId); // Refresh the file list
    });

    li.appendChild(removeButton);
    fileList.appendChild(li);
  });
}


