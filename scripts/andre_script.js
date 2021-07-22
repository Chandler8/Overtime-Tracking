$(document).ready(()=>{
    console.log("Ready!");

    checkAmounts();
});

function getTotal(){
    let pending = $("tr td.pc:last").html();
    let booked = $("tr td.b:last").html();
    let worked = $("tr td.w:last").html();

    if(pending == ''){
        pending = 0
        $("#timetable tbody tr td.pc:last").html(pending);
    }
    if(booked == ''){
        booked = 0
        $("#timetable tbody tr td.b:last").html(booked);
    }
    if(worked == ''){
        worked = 0
        $("#timetable tbody tr td.w:last").html(worked);
    }

    $("#timetable tbody tr td.ot:last").html(0);
    
    let total = parseFloat(pending) + parseFloat(booked) + parseFloat(worked);
    
    return total;
}

function checkAmounts(){
    $("#timetable tbody tr td").each(function(){
        let total = getTotal();
        
        if(total <= 40){
            $("#timetable tbody tr td.pc:last,td.b:last,td.w:last,td.ot:last").css('background-color','lightgreen');
        }
        else{
            let got_OT = total - 40;
            
            $("#timetable tbody tr td.ot:last").html(got_OT);
            $("#timetable tbody tr td.pc:last,td.b:last,td.w:last,td.ot:last").css('background-color','red');
        }
    });
}

function addRow(){
    let name = $("#name").val();
    let pending = $("#pending").val();
    let booked = $("#booked").val();
    let worked = $("#worked").val();
    let ot = $("#ot").val();
    let shift = $("#shift").val();
    let last_num = $("#timetable th:last").text();
    let mynum = parseInt(last_num);
    let num = mynum + 1;

    let row_str = "<tr><th scope='row'>" + num + 
        "</th><td>"+ name +"</td><td class='pc'>" + 
        pending + "</td><td class='b'>" + 
        booked + "</td><td class='w'>" + 
        worked + "</td><td class='ot'>" + 
        ot + "</td><td class='shift'>" + 
        shift + "</td></tr>";

    $("#timetable tbody").append(row_str);
    checkAmounts();
}