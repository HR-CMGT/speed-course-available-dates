// on load
$(function() {
    // date element ophalen
    // let dataElement = document.getElementById("date");
    let dateElement = $("#date");
    // console.log(dataElement);
    // on change
    dateElement.on("change", function(e) {
        // datum ophalen (value)
        let selectedDate = e.target.value;

        // ajax call
        $.get("/speed-course-available-dates/available_dates.php?date="+selectedDate, function(data) {
            $("#time").empty();
            $.each(data, function (index, val) {
                // option toevoegen aan time (select) element
                $("#time").append('<option value="'+val+'">'+val+'</option>');
            });
        });
    })
});










