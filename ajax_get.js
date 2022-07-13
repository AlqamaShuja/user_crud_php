$(document).ready(function () {
    loadUserData();

});


function loadUserData() {
    table = document.getElementById("users");
    $.ajax({
        url: 'ajax_get.php',
        type: 'GET',
        // data: null,
        success: function (data) {
            table.innerHTML += data;
        }
    });
}