function refreshContent(searchString){
    $.ajax({
        type: "GET",
        url: "php_bin/characterCardContent.php",
        data: "search="+searchString,
        success: function(result) {
            $(".wrap").html(result);
        }
    });
}