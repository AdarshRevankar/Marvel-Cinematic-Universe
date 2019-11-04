function refreshContent(searchString){
    $.ajax({
        type: "GET",
        url: "php_bin/moviesCardContent.php",
        data: "search="+searchString,
        success: function(result) {
            $(".wrap").html(result);
        }
    });
}

function load_page(page_id){
    $.ajax({
        type: "GET",
        url: "php_bin/moviesCardContent.php",
        data: "loadid="+searchString,
        success: function(result) {
            $(".wrap").html(result);
        }
    });
}