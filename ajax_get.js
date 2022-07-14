$(document).ready(function () {
    loadUserData();

    $("#search").keyup((e)=> search(e));

    $(document).on("click", "#pagination a", function(e){
        e.preventDefault();
        let page_id = $(this).attr("id");
        loadUserData(page_id);
    })
});


function loadUserData(pageNo) {
    table = document.getElementById("users");
    $.ajax({
        url: 'ajax_get.php',
        type: 'POST',
        data: {page: pageNo},
        success: function (data) {
            table.innerHTML = data
        }
    });
}

function search(e){
    $.ajax({
        url: 'ajax_get.php',
        method: 'post',
        data: {search: e.target.value},
        success: function (data) {
            table.innerHTML = data
        }
    });
}

