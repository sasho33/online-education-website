document.addEventListener('DOMContentLoaded', async function () {
  const calendarEl = document.getElementById('calendar');
  const events = [];

  try {
    // Construct the URL using the root path
    const response = await fetch('/online-education/db/controllers/get-assignments.php');
    const assignments = await response.json();

    assignments.forEach((assignment) => {
      events.push({
        title: `${assignment.Name}<br>${assignment.Title}`,
        start: assignment.DueDate,
        color: assignment.Color, // Bootstrap primary color
      });
    });
  } catch (error) {
    console.error('Failed to fetch assignments:', error);
  }

  const calendar = new FullCalendar.Calendar(calendarEl, {
    initialView: 'dayGridMonth',
    themeSystem: 'bootstrap5',
    events,
    eventContent: function (arg) {
      return { html: arg.event.title }; // Render HTML content
    },
  });
  calendar.render();
});

//display selected files when you add multiple files inside the material
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
      // Remove file from the list
      const dataTransfer = new DataTransfer();
      files.splice(index, 1);
      files.forEach((f) => dataTransfer.items.add(f));
      input.files = dataTransfer.files; // Update input files
      displaySelectedFiles(input, targetId); // Refresh file list
    });

    li.appendChild(removeButton);
    fileList.appendChild(li);
  });
}
