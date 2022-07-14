$(document).ready(function () {
    loadUserData();

    $("#search").keyup((e)=> search(e));
});


function loadUserData() {
    table = document.getElementById("users");
    $.ajax({
        url: 'ajax_get.php',
        type: 'GET',
        // data: null,
        success: function (data) {
            table.innerHTML = data;
        }
    });
}

function search(e){
    $.ajax({
        url: 'ajax_get.php',
        method: 'post',
        data: {search: e.target.value},
        success: function (data) {
            table.innerHTML = data;
        }
    })
}