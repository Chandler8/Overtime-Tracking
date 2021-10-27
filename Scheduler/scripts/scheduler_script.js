$(document).ready(()=>{
    console.log("Ready!");

    $('#shift-form-btn').on('click',showHideForm);
    $('#add-shift-btn').on('click',addShift);
    $('#add-new-field-link').on('click',showHideNewFieldForm);
    $('#add-field-btn').on('click',addRowToShiftsForm);
    $(document).on('click',".add-event-btn",addEventToCalendar);
    $(document).on('click',".delete-event-btn",deleteEventFromCalendar);
    changeView();
});

//GLOBAL VARIABLES
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
var start_time = document.getElementById("start-time");
var end_time = document.getElementById("end-time");

//var event_color = $(this).parent().css( "background-color" );
$('.position_select').change(function() {
  let event_color = $(this).val();
  
  $(this).parent().prev().css( "background-color", event_color );
  $(this).parent().prev().css( "color", '#fff');
  console.log(event_color);
  return;
});

//Set the event_status to 1 for this shift when talent is selected
$('.talent_select').change(function() {
  let event_status = 0;
  let event_id = $(this).parent().parent().children()[0].innerText;
  //let event_color = $(this).val();
  let talent_assigned = $(this).val();
  
  if($(this).val() != "none"){
    event_status = 1;
    $(this).parent().prev().text("Assigned");
  }
  else{
    event_status = 0;
    $(this).parent().prev().text("Unassigned");
  }
  location.href = `../scripts/dbscripts/handle_event.php?update_ready=true&event_status=${event_status}&event_id=${event_id}&talent_assigned=${talent_assigned}`;
});

//This function adds all events to the calendar
function addAllEventsToCalendar() {
    let tr = $('#shifts').find('tbody').find('tr');
    
    for (var i = 1; i < tr.length; i++) {
        let event_title = tr[i].children[1].innerText;
        let event_color = tr[i].children[1].style.backgroundColor == "" ? "#669900" : tr[i].children[1].style.backgroundColor;
        console.log(event_color);
        let start_date = tr[i].children[3].innerText;
        let end_date = tr[i].children[4].innerText;
        let start_time = tr[i].children[5].innerText;
        let end_time = tr[i].children[6].innerText;

        addEventToCalendarAtStart(event_title,start_date,end_date,start_time,end_time,event_color);    
    }
}

//This function adds a shift to the shifts table
function addShift() {
    var shift_title = document.getElementById("shift-title").value;
    var shift_description = document.getElementById("shift-description").value;
    
    // var start_time_array = start_time.split(":");
    // var end_time_array = end_time.split(":");
    
    // if (start_time == null || start_time == "") {
    //     start_time = "12 PM";
    // }
    // else if (start_time_array[0]%12 > 0) {
    //     start_time = start_time_array[0] - 12 + ":" + start_time_array[1] + " PM";
    // }else{
    //     start_time = start_time_array[0] + ":" + start_time_array[1] + " AM";
    // }
    
    // if (end_time == null || end_time == "") {
    //     end_time = "12 AM";
    // }
    // else if (end_time_array[0]%12 > 0) {
    //     end_time = end_time_array[0] - 12 + ":" + end_time_array[1] + " PM";
    // }else{
    //     end_time = end_time_array[0] + ":" + end_time_array[1] + " AM";
    // }

    // var start_date_time = start_month + "/" + start_day + "/" + start_year + ", " + start_time;
    // var end_date_time = end_month + "/" + end_day + "/" + end_year + ", " + end_time;
    // var shift_num = getShiftNum();

    let tr = $("<tr/>");
    let shift_num_td = $("<td/>");
    let shift_title_td = $("<td/>");
    let duration_td = $("<td/>");
    let icon1_td = $("<td/>");
    let icon2_td = $("<td/>");
    let icon1 = $("<i/>");
    let icon2 = $("<i/>");

    $(icon1).addClass("fas fa-plus add-event-btn clickable");
    $(icon2).addClass("fas fa-minus delete-event-btn clickable");

    $(icon2_td).append(icon2);
    $(icon1_td).append(icon1);
    $(duration_td).append(start_date_time+" | "+end_date_time);
    $(shift_title_td).append(shift_title);
    $(shift_num_td).append(shift_num);

    $(shift_num_td).appendTo(tr);
    $(shift_title_td).appendTo(tr);
    $(duration_td).appendTo(tr);
    $(icon1_td).appendTo(tr);
    $(icon2_td).appendTo(tr);
    $("#shifts tbody").append(tr);

    /*$("#shifts tbody").append("<tr><td>"+shift_num+"</td><td>"+shift_title+"</td><td>"+start_date_time+" - "+end_date_time+"</td>"+
      '<td><i class="fas fa-plus add-event-btn clickable" onclick="addEventToCalendar();"></i></td>'+
      '<td><i class="fas fa-minus delete-event-btn clickable" onclick="deleteEventFromCalendar();"></i></td></tr>');*/

    clearForm();
    //addShift(start_day,shift_title);
}

//This function shows and hides the new field form
function showHideNewFieldForm(){
  if($('#new-field-form').hasClass('d-none')){
    $('#new-field-form').removeClass('d-none');
  }else{
    $('#new-field-form').addClass('d-none');
  }
}

//This function adds a row to the shifts form
function addRowToShiftsForm(){
  if(!$('#new-label').val() == ""){
    let new_label = $('#new-label').val();
    let field_desc = $('#new-field-description').val();
    let label_str = '<div class="col-2"><label class="col-sm-2 col-form-label">'+new_label+'</label></div>';
    let input_str = '<div class="col"><input type="text" class="form-control" id="'+new_label+'" name="'+new_label+'" placeholder="'+field_desc+'"></div>';
    let delete_str = '<div class="col"><i class="fas fa-minus-square delete-field-btn clickable" onclick="deleteRowFromShiftsForm(this);"></i></div>';
    let row_str = '<div class="form-group row">'+label_str+input_str+delete_str+'</div>';
    $('#new-fields-container').append(row_str);
    $('#new-label').val('');
    $('#new-field-description').val('');
    $('#new-field-form').addClass('d-none');
  }
}

//This function deletes a row from the shifts form
function deleteRowFromShiftsForm(element){
  $(element).parent().parent().remove();
}

//This function adds the shift number to the shift table.
//It will require an update, if the position of the shift number changes on the table.
function getShiftNum(){
  let last_shift_num = $("#shifts tbody tr").last().text();
  
  if(last_shift_num == ""){
    last_shift_num = 0;
  }

  let shift_num = parseInt(last_shift_num) + 1;

  return shift_num;
}

/*This function adds a shift to the shifts table
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
}*/

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
        $("#shift-form-btn").addClass('fa-minus clickable');
        $("#shift-form").toggle();
    }else if($('#shift-form-btn').hasClass('active')){
        $("#shift-form-btn").removeClass('active');
        $("#shift-form-btn").removeClass('fa-minus');
        $("#shift-form-btn").addClass('fa-plus');
        $("#shift-form").toggle();
    }
    return;
}


var calendar;
//var bg = $("#background-color");
//var e_name = $("#shift-title");
//var start_date = $("#start-date");
//var end_date = $("#end-date");

//This function displays the scheduler calendar on clicking the show calendar button
function changeView(){
  $("#show-calendar-btn").on('click',()=>{
    if(!($('#show-calendar-btn').hasClass('active'))){
      $("#show-calendar-btn").addClass('active');
      $("#list-view-container").toggle();
      $("#calendar-view-container").toggle();
      initCalendar();
      addAllEventsToCalendar();
      $("#show-calendar-btn").removeClass('fa-calendar-plus');
      $("#show-calendar-btn").addClass('fa-calendar-minus');
    }else if($('#show-calendar-btn').hasClass('active')){
      $("#show-calendar-btn").removeClass('active');
      $("#show-calendar-btn").removeClass('fa-calendar-minus');
      $("#show-calendar-btn").addClass('fa-calendar-plus');
      $("#calendar-view-container").toggle();
      $("#list-view-container").toggle();
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

function addEventToCalendar(){
  //Event name parts
  let tr = $(this).parent().parent();
  let e_name = tr.find('td').first().next().text();
  console.log(e_name);
  
  //Date parts
  let date_str = tr.find('td').first().next().next().text();
  let duration_parts = date_str.split("|");
  
  //Start date and time variables
   let date1_parts = duration_parts[0].split(",");
   let start_date = $.trim(date1_parts[0]);
  // let start_date_split = start_date.split("/");
  // let start_month = start_date_split[0] < 10 ? "0" + start_date_split[0] : start_date_split[0];
  // let start_day = start_date_split[1] < 10 ? "0" + start_date_split[1] : start_date_split[1];
  // let start_year = start_date_split[2];
  //let start_date_str = start_year+"-"+start_month+"-"+start_day;
  //let start_time = $.trim(date1_parts[1]);
  
  //End date and time variables
  let date2_parts = duration_parts[1].split(",");
  let end_date = $.trim(date2_parts[0]);
  // let end_date_split = end_date.split("/");
  // let end_month = end_date_split[0] < 10 ? "0" + end_date_split[0] : end_date_split[0];
  // let end_day = end_date_split[1] < 10 ? "0" + end_date_split[1] : end_date_split[1];
  // let end_year = end_date_split[2];
  // let end_date_str = end_year+"-"+end_month+"-"+end_day;
  //let end_time = $.trim(date2_parts[1]);
  
  let event_name = e_name == ""?start_date + ' event':e_name;
  
  calendar.addEvent({
    id: getShiftNum(),
    title: event_name,
    start: start_date,
    end: end_date,
    backgroundColor: event_color
  });
  calendar.render();
}

function deleteEventFromCalendar(){
  var tr = $(this).parent().parent();
  let name = tr.find('td').first().next().text();
  
  var events = calendar.getEvents();
  
  events.forEach((event)=>{
    if(event.title == name){
      confirm('Delete event: ' + event.title);
      event.remove();      
    }
  });

  //calendar.getEventById(id).remove();
  calendar.render();
  tr.remove();
}

function addEventToCalendarAtStart(title, listed_start_date, listed_end_date, listed_start_time, listed_end_time, bg_color){
  //Event name
  let e_name = title;

  //Event color
  let event_color = bg_color == "" ? "#fff" : bg_color;
  
  //Dates
  let start_date = listed_start_date;
  let end_date = listed_end_date;

  //Times
  let start_time = listed_start_time;
  let end_time = listed_end_time;
  
  //End date and time variables
  let event_name = e_name == ""?start_date + ' event':e_name;
  
  calendar.addEvent({
    id: getShiftNum(),
    title: event_name,
    start: `${start_date}T${start_time}`,
    end: `${end_date}T${end_time}`,
    //backgroundColor: event_color,
    overlap: false,
    rendering: 'background',
    color: event_color,
    allDay: false,
    editable: true,
    draggable: true,
    resizable: true,
    display: 'block',
  });
  calendar.render();
}