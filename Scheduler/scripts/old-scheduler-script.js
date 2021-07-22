$(document).ready(()=>{
    console.log("Ready!");
    addDaysToCalendar();

    $('#shift-form-btn').on('click',showHideForm);
    $('#add-shift-btn').on('click',addShift);

    $('#left-arrow').on('click',getPrevMonth);
    $('#right-arrow').on('click',getNextMonth);
});

//Gloabl variables
var curr_month = document.getElementById("cal-month");
var monthNames = [ "January", "February", "March", "April", "May", "June", 
        "July", "August", "September", "October", "November", "December" ];

var daysName = [ "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday", ];

var today = new Date();
var month = today.getMonth();
var year = today.getFullYear();
var days = new Array(31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);
var daysInMonth = days[month];

//This function adds the days to the calender based on the current month and year.
function addDaysToCalendar() {
    //Add month and year to calendar
    $("#cal-month").append(monthNames[month]);
    $("#cal-year").append(year);
    
    if (month == 1 && year % 4 == 0) {
        daysInMonth = 29;
    }

    //switch() {}
    
    for(day in daysName){
        $("#cal-days").append("<td>"+daysName[day]+"</td>");
    }
    return;
}

//This function moves the calendar forward by one month
function getNextMonth(){
    for(let i = 0; i < monthNames.length; i++){
        if (curr_month.innerHTML == monthNames[i]) {
             $('#cal-month').html(monthNames[i+1]);
            return;
        }else if (curr_month.innerHTML == monthNames[11]) {
            $('#cal-month').html(monthNames[0]);
           return;
       }
    }
}

//This function moves the calendar backward by one month
function getPrevMonth(){
    for(let i = 0; i < monthNames.length; i++){
        if (curr_month.innerHTML == monthNames[0]) {
            $('#cal-month').html(monthNames[11]);
           return;
       }else if (curr_month.innerHTML == monthNames[i] && monthNames[i] != monthNames[0]) {
             $('#cal-month').html(monthNames[i-1]);
            return;
        }
    }
}

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

    //var shift_start_date = new Date(start_date_time);
    //var shift_end_date = new Date(end_date_time);
/*
    if (shift_title == "") {
        alert("You must enter a title!");
        return;
    }
    if (start_date == "") {
        alert("You must enter a shift start date!");
        return;
    }
    if (end_date == "") {
        alert("You must enter a shift end time!");
        return;
    }
    if (start_time == "") {
        alert("You must enter a shift start time!");
        return;
    }
    if (end_time == "") {
        alert("You must enter a shift end time!");
        return;
    }
*/
    if (shift_description) {
        var shift_description = document.getElementById("shift-description").value;
    }

    $("#shifts tbody").append("<tr><td>"+shift_title+"</td><td>"+start_date_time+" - "+end_date_time+"</td></tr>");

    clearForm();
    addEvent(start_day,shift_title);
    return;
}

function addEvent(d,n){
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

//This function clears the fields of the form after successful submission
function clearForm() {
    $("#shift-title").val("");
    $("#shift-description").val("");
    $("#start-date").val("");
    $("#end-date").val("");
    $("#start-time").val("");
    $("#end-time").val("");
    return;
}

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