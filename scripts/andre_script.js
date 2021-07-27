$(document).ready(()=>{
    console.log("Ready!");

    checkAmounts();
});

function getTotal(){
    let pending = $("tr td div.pc:last").html();
    let booked = $("tr td div.b:last").html();
    let worked = $("tr td div.w:last").html();

    if(pending == ''){
        pending = 0
        $("#timetable tbody tr td div.pc:last").html(pending);
    }
    if(booked == ''){
        booked = 0
        $("#timetable tbody tr td div.b:last").html(booked);
    }
    if(worked == ''){
        worked = 0
        $("#timetable tbody tr td div.w:last").html(worked);
    }

    $("#timetable tbody tr td div.ot:last").html(0);
    
    let total = parseFloat(pending) + parseFloat(booked) + parseFloat(worked);
    
    return total;
}

function checkAmounts(){
    $("#timetable tbody tr td div").each(function(){
        let total = getTotal();
        
        if(total <= 40){
            $("#timetable tbody tr td div.pc:last").css('color','lightgreen');
            $("#timetable tbody tr td div.b:last").css('color','lightgreen');
            $("#timetable tbody tr td div.w:last").css('color','lightgreen');
            $("#timetable tbody tr td div.ot:last").css('color','lightgreen');
        }
        else{
            let got_OT = total - 40;
            
            $("#timetable tbody tr td div.ot:last").html(got_OT);
            $("#timetable tbody tr td div.pc:last").css('color','red');
            $("#timetable tbody tr td div.b:last").css('color','red');
            $("#timetable tbody tr td div.w:last").css('color','red');
            $("#timetable tbody tr div.ot:last").css('color','red');
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