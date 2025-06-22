<!-- Preloader -->
    <div id="overlayer"></div>
    <div class="loader">
      <div class="spinner-border text-primary" role="status">
        <span class="visually-hidden">Loading...</span>
      </div>
    </div>
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/index.global.min.js'></script>
    <script>

      document.addEventListener('DOMContentLoaded', function() {
  var calendarEl = document.getElementById('calendar');

  var calendar = new FullCalendar.Calendar(calendarEl, {
    initialView: 'dayGridMonth',
    //initialDate: '2025-03-11',
    headerToolbar: {
      left: 'prev,next today, addRoom, addReservation',
      center: 'title',
      right: 'dayGridMonth,timeGridWeek,timeGridDay'
    },
        customButtons: {
      addRoom: {
        text: 'Join',
      },
      addReservation: {
        text: 'New event',
      },
    },
    events: [
      {
        title: 'Dog training - Baguio',
        start: '2025-05-28'
      },
      {
        title: 'Dog Show Baguio - All breeds',
        start: '2025-05-24',
        end: '2024-03-22'
      },
      {
        groupId: '999',
        title: 'Repeating Event',
        start: '2025-03-15T16:00:00'
      },
    ]
  });

  calendar.render();
});

    </script>

     <div id='calendar'></div>