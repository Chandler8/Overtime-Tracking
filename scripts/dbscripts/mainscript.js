// Main scripts here

$('#db_user_form_btn').on('click', function () {
    if ($('#db_user_form_btn').text() == 'Show Delete DB User Form') {
        $('#db_user_form_btn').text('Show Add DB User Form');
        $('#add_db_user_form').toggle();
        $('#delete_db_user_form').toggle();
    } 
    else if ($('#db_user_form_btn').text() == 'Show Add DB User Form') {
        $('#db_user_form_btn').text('Show Delete DB User Form');
        $('#add_db_user_form').toggle();
        $('#delete_db_user_form').toggle();
    }
});    
