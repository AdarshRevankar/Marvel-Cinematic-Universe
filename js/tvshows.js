function refreshContent(searchString){
    $.ajax({
        type: "GET",
        url: "php_bin/tvshowsCardContent.php",
        data: "search="+searchString,
        success: function(result) {
            $(".wrap").html(result);
        }
    });
}