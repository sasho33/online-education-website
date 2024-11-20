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

document.addEventListener('DOMContentLoaded', function () {
  const calendarEl = document.getElementById('calendar');
  const calendar = new FullCalendar.Calendar(calendarEl, {
    initialView: 'dayGridMonth',
    themeSystem: 'bootstrap5',
    events: [
      {
        title: 'Math Assignment Due',
        start: '2024-11-10',
        color: '#007bff', // Bootstrap primary color
      },
      {
        title: 'Science Project Review',
        start: '2024-11-15',
        color: '#28a745', // Bootstrap success color
      },
      {
        title: 'English Literature Exam',
        start: '2024-11-20',
        color: '#dc3545', // Bootstrap danger color
      },
      {
        title: 'Parent-Teacher Meeting',
        start: '2024-11-25',
        color: '#ffc107', // Bootstrap warning color
      },
    ],
  });
  calendar.render();
});
