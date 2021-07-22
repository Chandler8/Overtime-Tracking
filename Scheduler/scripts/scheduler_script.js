$(document).ready(()=>{
    console.log("Ready!");

    $('#shift-form-btn').on('click',showHideForm);
    $('#add-shift-btn').on('click',createShift);
    displayCalendar();
    
});

//This function creates and then adds a shift to the shifts table
function createShift() {
    var shift_title = document.getElementById("shift-title").value;
    var shift_description = document.getElementById("shift-description").value;
    
    //Date variables
    var the_start_date = document.getElementById("start-date").value;
    var start_date = new Date(the_start_date);
    var the_end_date = document.getElementById("end-date").value;
    var end_date = new Date(the_end_date);
    
    var start_day = start_date.getDate() + 1;
    var start_month = start_date.getMonth() + 1;
    var start_year = start_date.getFullYear();
    var end_day = end_date.getDate() + 1;
    var end_month = end_date.getMonth() + 1;
    var end_year = end_date.getFullYear();
    
    //Time variables
    var start_time = document.getElementById("start-time").value;
    var end_time = document.getElementById("end-time").value;
    
    var start_time_array = start_time.split(":");
    var end_time_array = end_time.split(":");
    
    if (start_time_array[0]%12 > 0) {
        start_time = start_time_array[0] - 12 + ":" + start_time_array[1] + " PM";
    }else{
        start_time = start_time_array[0] + ":" + start_time_array[1] + " AM";
    }
    
    if (end_time_array[0]%12 > 0) {
        end_time = end_time_array[0] - 12 + ":" + end_time_array[1] + " PM";
    }else{
        end_time = end_time_array[0] + ":" + end_time_array[1] + " AM";
    }

    var start_date_time = "(" + start_month + "/" + start_day + "/" + start_year + ", " + start_time + ")";
    var end_date_time = "(" + end_month + "/" + end_day + "/" + end_year + ", " + end_time + ")";

    $("#shifts tbody").append("<tr><td>"+shift_title+"</td><td>"+start_date_time+" - "+end_date_time+"</td></tr>");

    clearForm();
    addShift(start_day,shift_title);
    return;
}

//This function adds a shift to the shifts table
function addShift(d,n){
    var day = $("#months-days tr").find("td");
    var div = $('<div/>');
    div.addClass('event-container');

    var event_str = "<a href='#'><span class='badge badge-warning'>"+ n +"</span></a>";

    day.each(function(i,e){
        var date_parts = $(e).text().split(" ");
        var date = date_parts[0];
        $(e).addClass("dates");
            
        if(date == d){
            div.append(event_str);
            $(e).append(div);
        }
        return;
    });
    return;
}

//This function clears the fields of the event form after successful submission
function clearForm() {
    $("#shift-title").val("");
    $("#shift-description").val("");
    $("#start-date").val("");
    $("#end-date").val("");
    $("#start-time").val("");
    $("#end-time").val("");
    return;
}

//This function displays the event form on clicking the show event form button
function showHideForm(){
    if(!($('#shift-form-btn').hasClass('active'))){
        $("#shift-form-btn").addClass('active');
        $("#shift-form-btn").removeClass('fa-plus');
        $("#shift-form-btn").addClass('fa-minus');
        $("#shift-form").toggle();
    }else if($('#shift-form-btn').hasClass('active')){
        $("#shift-form-btn").removeClass('active');
        $("#shift-form-btn").removeClass('fa-minus');
        $("#shift-form-btn").addClass('fa-plus');
        $("#shift-form").toggle();
    }
    return;
}

document.addEventListener('DOMContentLoaded', function() {
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
    return;
  }
  
  //This function displays the scheduler calendar on clicking the show calendar button
  function displayCalendar(){
    $("#show-calendar-btn").on('click',()=>{
      if(!($('#show-calendar-btn').hasClass('active'))){
        $("#show-calendar-btn").addClass('active');
        $("#calendar-container").toggle();
        initCalendar();
        $("#show-calendar-btn").removeClass('fa-calendar-plus');
        $("#show-calendar-btn").addClass('fa-calendar-minus');
      }else if($('#show-calendar-btn').hasClass('active')){
        $("#show-calendar-btn").removeClass('active');
        $("#show-calendar-btn").removeClass('fa-calendar-minus');
        $("#show-calendar-btn").addClass('fa-calendar-plus');
        $("#calendar-container").toggle();
      }
      return;
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
    console.log('Adding Event ');
    return;
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
    return;
  }