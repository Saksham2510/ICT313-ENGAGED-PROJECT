<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Appointment for Counselling</title>
    <link rel="stylesheet" href="booking.css"> 
</head>
<body>
    <h1>Book Appointment for Counselling</h1>

    <!-- Month and Year Selection -->
    <div class="month-year-select">
        <label for="month">Select Month:</label>
        <select id="month" onchange="updateCalendar()">
            <option value="0">January</option>
            <option value="1">February</option>
            <option value="2">March</option>
            <option value="3">April</option>
            <option value="4">May</option>
            <option value="5">June</option>
            <option value="6">July</option>
            <option value="7">August</option>
            <option value="8">September</option>
            <option value="9">October</option>
            <option value="10">November</option>
            <option value="11">December</option>
        </select>

        <label for="year">Select Year:</label>
        <select id="year" onchange="updateCalendar()">
            <option value="2023">2023</option>
            <option value="2024">2024</option>
            <option value="2025">2025</option>
        </select>
    </div>

    <!-- Calendar Section -->
    <h2 id="calendarHeader"></h2>
    <div class="calendar" id="calendar"></div>

    <!-- New section to display selected date below the calendar -->
    <h2>Date Selected:</h2>
    <div id="selectedDateDisplay" class="selected-date">No date selected.</div>

    <!-- Time Slots -->
    <h2>Select Time</h2>
    <div class="time-slots" id="timeSlots"></div>

    <!-- Counselor Dropdown -->
    <h2>Select Counselor</h2>
    <select id="counselor" required>
        <option value="">Available counselor</option>
        <option value="Dr. Smith">Dr. Smith</option>
        <option value="Dr. Johnson">Dr. Johnson</option>
        <option value="Dr. Williams">Dr. Williams</option>
    </select>

    <!-- User Details Section -->
    <h2>Add Your Details</h2>
    <form id="bookingForm">
        <input type="text" placeholder="First and last name *" required>
        <input type="email" placeholder="Email *" required>
        <input type="text" placeholder="Address (optional)">
        <input type="tel" placeholder="Phone number (optional)">
        <textarea placeholder="Add any special requests (optional)"></textarea>
        <button type="submit">Book</button>
    </form>

    <script>
        const timeSlots = document.getElementById('timeSlots');
        const calendar = document.getElementById('calendar');
        const selectedDateDisplay = document.getElementById('selectedDateDisplay');
        const calendarHeader = document.getElementById('calendarHeader');

        const currentDate = new Date();
        let selectedMonth = currentDate.getMonth();
        let selectedYear = currentDate.getFullYear();

        document.getElementById('month').value = selectedMonth;
        document.getElementById('year').value = selectedYear;

        function generateTimeSlots() {
            const slots = ['9:00 AM', '10:00 AM', '11:00 AM', '1:00 PM', '2:00 PM', '3:00 PM', '4:00 PM', '5:00 PM'];
            slots.forEach(slot => {
                const slotElement = document.createElement('div');
                slotElement.textContent = slot;
                slotElement.classList.add('time-slot');
                slotElement.addEventListener('click', () => selectTimeSlot(slotElement));
                timeSlots.appendChild(slotElement);
            });
        }

        function selectTimeSlot(element) {
            document.querySelectorAll('.time-slot').forEach(slot => slot.classList.remove('selected'));
            element.classList.add('selected');
        }

        function generateCalendar(month, year) {
            calendar.innerHTML = '';
            const daysInMonth = new Date(year, month + 1, 0).getDate();
            const monthName = new Date(year, month, 1).toLocaleString('default', { month: 'long' });
            calendarHeader.textContent = `${monthName} ${year}`;

            for (let i = 1; i <= daysInMonth; i++) {
                const dayElement = document.createElement('div');
                dayElement.textContent = i;
                dayElement.classList.add('calendar-day');
                dayElement.addEventListener('click', () => selectDate(dayElement, i, month, year));
                calendar.appendChild(dayElement);
            }
        }

        function selectDate(element, day, month, year) {
            document.querySelectorAll('.calendar-day').forEach(dayElement => dayElement.classList.remove('selected'));
            element.classList.add('selected');

            const selectedDate = new Date(year, month, day).toDateString();
            selectedDateDisplay.textContent = selectedDate;
        }

        function updateCalendar() {
            const month = document.getElementById('month').value;
            const year = document.getElementById('year').value;
            generateCalendar(parseInt(month), parseInt(year));
        }

        generateCalendar(selectedMonth, selectedYear);
        generateTimeSlots();

        document.getElementById('bookingForm').addEventListener('submit', (e) => {
            e.preventDefault();
            alert('Appointment booked successfully!');
        });
    </script>
</body>
</html>
