document.addEventListener('DOMContentLoaded', function() {
  displayCalendar();
  showForm();

  $("#add-event-btn").on('click',()=>{
    addEvent();
  });

  $("#delete-event-btn").on('click',()=>{
    deleteEvent();
  });
});

var calendar;
var bg = $("#background-color");
var e_name = $("#name");
var start_date = $("#start-date");
var end_date = $("#end-date");

function showForm(){
  $("#show-form-btn").on('click',()=>{
    if($("#show-form-btn").text() == "Show Form"){
      $("#show-form-btn").html('Hide Form');
      $('#form').toggle();
    }else{
      $("#show-form-btn").html('Show Form');
      $('#form').toggle();
    }
  });
}

function displayCalendar(){
  $("#show-calendar-btn").on('click',()=>{
    if($("#show-calendar-btn").text() == "Show Calendar"){
      $("#show-calendar-btn").html('Hide Calendar');
      $('#calendar-container').toggle();
      initCalendar();
    }else{
      $("#show-calendar-btn").html('Show Calendar');
      $('#calendar-container').toggle();
    }
  });
}

function initCalendar(){
  var calendarEl = document.getElementById('calendar');
  
  calendar = new FullCalendar.Calendar(calendarEl, {
    headerToolbar: {
      center: 'title', 
      left: 'dayGridMonth,timeGridWeek,timeGridDay today',
      right: 'prev,next'      
    },
    timeZone: 'local',
    initialView: 'dayGridMonth',
    navLinks: true,
    navLinkDayClick: function(date, jsEvent) {
      console.log('day', date.toISOString());
      console.log('coords', jsEvent.pageX, jsEvent.pageY);
      console.log('Year', date.getFullYear());
    },
    events: [],
    themeSystem: 'bootstrap',
    bootstrapFontAwesome: {
      close: 'fa-times',
      prev: 'fa-chevron-left',
      next: 'fa-chevron-right',
      prevYear: 'fa-angle-double-left',
      nextYear: 'fa-angle-double-right'
    }
  });

  calendar.on('dateClick', function(info) {
    console.log('clicked on ' + info.dateStr);
  });

  //calendar.setOption('locale');

  calendar.render();
}

function addEvent(){
  let event_name = e_name.val() == ""?start_date.val() + ' event':e_name.val();
  calendar.addEvent({
    id: 0,
    title: event_name,
    start: start_date.val(),
    end: end_date.val(),
    backgroundColor: bg.val()
  });
  calendar.render();
  console.log('Adding Event '+ start_date.val()+ " thru " + end_date.val());
}

function deleteEvent(){
  let events = calendar.getEvents();
  let event_name = e_name.val() == ""?start_date.val() + ' event':e_name.val();
  
  events.forEach((event)=>{
    if(event.title == event_name){
      event.remove();      
    }
  });

  //calendar.getEventById(id).remove();
  calendar.render();
  console.log(event_name + ' event deleted');
}