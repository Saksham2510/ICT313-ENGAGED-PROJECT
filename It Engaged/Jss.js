// JavaScript to handle dropdown and event details
document.querySelectorAll('.events-box').forEach(box => {
    box.addEventListener('click', function() {
        const dropdown = document.getElementById('eventDropdown');
        dropdown.style.display = dropdown.style.display === 'block' ? 'none' : 'block';
    });
});

// Close the dropdown when clicking outside
document.addEventListener('click', function(event) {
    const dropdown = document.getElementById('eventDropdown');
    const isClickInside = dropdown.contains(event.target) || event.target.closest('.events-box');

    if (!isClickInside) {
        dropdown.style.display = 'none';
    }
});

// Function to show events on hover
document.querySelectorAll('.day').forEach(day => {
    day.addEventListener('mouseenter', (event) => {
        const eventDetails = event.target.getAttribute('data-event');
        if (eventDetails) {
            const tooltip = document.createElement('div');
            tooltip.className = 'tooltip';
            tooltip.innerText = eventDetails;
            event.target.appendChild(tooltip);
        }
    });

    day.addEventListener('mouseleave', () => {
        const tooltip = event.target.querySelector('.tooltip');
        if (tooltip) {
            tooltip.remove();
        }
    });
});

// Function to show the registration form
document.querySelector('.events-box').addEventListener('click', function() {
    const registrationForm = document.querySelector('#eventRegistrationForm');
    registrationForm.style.display = 'block';
});
// Close the modal when the 'x' (close button) is clicked
document.querySelector('.close').addEventListener('click', function() {
    document.getElementById('registrationModal').style.display = 'none';
});

// Hide the modal when clicking outside of it
window.addEventListener('click', function(event) {
    const modal = document.getElementById('registrationModal');
    if (event.target === modal) {
        modal.style.display = 'none';
    }
});
