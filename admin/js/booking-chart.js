
let currentMonth = new Date().getMonth();
let currentYear = new Date().getFullYear();
const file_url = 'ajax/booking-chart.php';
const gantt_tooltip = document.getElementById('gantt_tooltip');
document.addEventListener('DOMContentLoaded', function() {
  fetchBookings();
  document.getElementById('month-selector').value = currentMonth;
});


const colorClasses = [
  'color1',
  'color2',
  'color3',
  'color4',
  'color5',
  'color6',
  'color7',
  'color8',
  'color9',
  'color10',
  'occupied'
];

// Function to pick a random class
function pickRandomClass() {
  const randomIndex = Math.floor(Math.random() * colorClasses.length);
  return colorClasses[randomIndex];
}

let colors_code = pickRandomClass();



function fetchBookings() {
    xhr = new XMLHttpRequest();
    xhr.open('POST', file_url, true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

    xhr.onload = function (){
        if(xhr.status === 200){
            const response = JSON.parse(xhr.responseText);
            // call the gentt chart function 
            generateGanttChart(response);
        }
    }

    xhr.send('get_chart_data');

//   fetch('./get_bookings.php') // Replace with your data fetching method
//     .then(response => response.json())
//     .then(data => generateGanttChart(data))
//     .catch(error => console.error('Error fetching bookings:', error));
}

function generateGanttChart(data) {
  const ganttChart = document.getElementById('gantt-chart');
  ganttChart.innerHTML = '';

  // Create table head (thead)
  const tableHead = document.createElement('thead');
  const headerRow = document.createElement('tr');

  // Header cells for Room, Day 1, Day 2, ..., Day 30
  headerRow.appendChild(document.createElement('th')).textContent = 'Room';
  for (let day = 1; day <= 30; day++) {
    const headerCell = document.createElement('th');
    headerCell.textContent = `Day ${day}`;
    headerRow.appendChild(headerCell);
  }
  tableHead.appendChild(headerRow);
  ganttChart.appendChild(tableHead);

  // Aggregate bookings by room name
  const roomBookings = {};

  data.forEach(booking => {

    if (!roomBookings[booking.room_name]) {
      roomBookings[booking.room_name] = [];
    }
    booking.colorClass = pickRandomClass()
    roomBookings[booking.room_name].push(booking);
  


  });

  


  // Create table body (tbody) and populate rows
  const tableBody = document.createElement('tbody');
  const today = new Date();

  Object.keys(roomBookings).forEach(roomName => {
    const bookingRow = document.createElement('tr');
// console.log(roomName);
    // Room name cell
    
    const roomCell = document.createElement('td');
    roomCell.textContent = roomName;
    bookingRow.appendChild(roomCell);

    // Cells for each day based on booking start and end dates
    for (let day = 1; day <= 30; day++) {
      const dayCell = document.createElement('td');
      const currentDate = new Date(currentYear, currentMonth, day);

      // Check all bookings for every room
      roomBookings[roomName].forEach(booking => {
        const startDate = new Date(booking.check_in);
        const endDate = new Date(booking.check_out);
    
        if (currentDate >= startDate && currentDate <= endDate) {
          // Add a class for styling
          // Array of CSS class names


// Example usage: Apply the random class to an element with the ID 'target-element'


          dayCell.classList.add(booking.colorClass);
          dayCell.style.backgroundColor = booking.bg;

          dayCell.addEventListener('mousemove', (gantEv) => {
            const cx  =  gantEv.clientX;
            const cy  =  gantEv.clientY;
            gantt_tooltip.style.display ='block';
            gantt_tooltip.style.top =cy -20 +'px';
            gantt_tooltip.style.left =cx +gantt_tooltip.offsetWidth/2 +'px';
            gantt_tooltip.innerHTML =booking.user_name;

          });
          dayCell.addEventListener('mouseout', (gantEv) => {
            const cx  =  gantEv.clientX;
            const cy  =  gantEv.clientY;
            gantt_tooltip.style.display ='none';
            

          });

          // Highlight past dates differently with overlay
          if (currentDate < today) {
            dayCell.classList.add('expired');
          }
        }
      });

      // Highlight today's date
      if (currentDate.toDateString() === today.toDateString()) {
        dayCell.classList.add('today');
      }

      bookingRow.appendChild(dayCell);
    }

    tableBody.appendChild(bookingRow);
  });

  ganttChart.appendChild(tableBody);
}

function changeMonth() {
  const monthSelector = document.getElementById('month-selector');
  currentMonth = parseInt(monthSelector.value);
  fetchBookings();
}


// selec prev and next 3 month 
document.addEventListener('DOMContentLoaded', function() {
        populateMonthSelector();
        fetchBookings();
    });

    function populateMonthSelector() {
        const monthSelector = document.getElementById('month-selector');
        monthSelector.innerHTML = '';
        const monthNames = [
            'January', 'February', 'March', 'April', 'May', 'June', 
            'July', 'August', 'September', 'October', 'November', 'December'
        ];

        for (let i = -2; i <= 2; i++) {
            const month = (currentMonth + i + 12) % 12;
            const option = document.createElement('option');
            option.value = month;
            option.textContent = monthNames[month];
            monthSelector.appendChild(option);

            if (i === 0) {
                option.selected = true;
            }
        }
    }
