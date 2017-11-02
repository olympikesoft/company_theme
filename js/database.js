$.ajax({
url: "/database/database.php",
type: "GET",
dataType: 'json',
success: function(result) {
    if (result.type == false) {
        alert("Error occured:" + result);
        return false;
    }
    $.each(result, function(index, obj) {
        $("#get-all").append(
            "<div class='span12'><div class='row'><div class='span8'><h4><strong><a href='#'>" + obj.title + "</div></a></strong></h4> </div></div>" +
            "<div class='row'><div class='span2'><a href='#' class='thumbnail'><img src='" + obj.id + "' alt=''></a></div><div class='span10'>" +
            "<p>" + obj.text + "    </div></p></div>")
        console.log(obj.text);
    });

}
});