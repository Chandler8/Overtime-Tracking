$(document).ready(()=>{
    console.log("Ready!");

    $('#shift-form-btn').on('click',showHideForm);
    $('#add-shift-btn').on('click',addShift);
    $(document).on('click',".add-event-btn",addEventToCalendar);
    $(document).on('click',".delete-event-btn",deleteEventFromCalendar);    
    displayCalendar();

});
    
//This function adds a shift to the shifts table
function addShift() {
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
    
    if (start_time == null || start_time == "") {
        start_time = "12 PM";
    }
    else if (start_time_array[0]%12 > 0) {
        start_time = start_time_array[0] - 12 + ":" + start_time_array[1] + " PM";
    }else{
        start_time = start_time_array[0] + ":" + start_time_array[1] + " AM";
    }
    
    if (end_time == null || end_time == "") {
        end_time = "12 AM";
    }
    else if (end_time_array[0]%12 > 0) {
        end_time = end_time_array[0] - 12 + ":" + end_time_array[1] + " PM";
    }else{
        end_time = end_time_array[0] + ":" + end_time_array[1] + " AM";
    }

    var start_date_time = start_month + "/" + start_day + "/" + start_year + ", " + start_time;
    var end_date_time = end_month + "/" + end_day + "/" + end_year + ", " + end_time;
    var shift_num = getShiftNum();

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
    $(duration_td).append(start_date_time+" - "+end_date_time);
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
    return;
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

function addEventToCalendar(){
  //Event name parts
  let tr = $(this).parent().parent();
  let e_name = tr.find('td').first().next().text();
  console.log(e_name);
  
  //Date parts
  let date_str = tr.find('td').first().next().next().text();
  let duration_parts = date_str.split("-");
  
  //Start date and time variables
  let date1_parts = duration_parts[0].split(",");
  let start_date = $.trim(date1_parts[0]);
  let start_date_split = start_date.split("/");
  let start_month = start_date_split[0] < 10 ? "0" + start_date_split[0] : start_date_split[0];
  let start_day = start_date_split[1] < 10 ? "0" + start_date_split[1] : start_date_split[1];
  let start_year = start_date_split[2];
  let start_date_str = start_year+"-"+start_month+"-"+start_day;
  //let start_time = $.trim(date1_parts[1]);
  
  //End date and time variables
  let date2_parts = duration_parts[1].split(",");
  let end_date = $.trim(date2_parts[0]);
  let end_date_split = end_date.split("/");
  let end_month = end_date_split[0] < 10 ? "0" + end_date_split[0] : end_date_split[0];
  let end_day = end_date_split[1] < 10 ? "0" + end_date_split[1] : end_date_split[1];
  let end_year = end_date_split[2];
  let end_date_str = end_year+"-"+end_month+"-"+end_day;
  //let end_time = $.trim(date2_parts[1]);
  
  let event_name = e_name == ""?start_date + ' event':e_name;
  
  calendar.addEvent({
    id: getShiftNum(),
    title: event_name,
    start: start_date_str,
    end: end_date_str,
    backgroundColor: "green"
  });
  calendar.render();
}

function deleteEventFromCalendar(){
  var tr = $(this).parent().parent();
  let name = tr.find('td').first().next().text();
  
  var events = calendar.getEvents();
  
  events.forEach((event)=>{
    if(event.title == name){
      console.log('Deleting Event ' . event.title);
      event.remove();      
    }
  });

  //calendar.getEventById(id).remove();
  calendar.render();
  console.log(id + ' is the id of the event deleted');
  tr.remove();
  return;
}
