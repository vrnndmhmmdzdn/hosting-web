// var search = document.getElementById('search');
// var button = document.getElementById('button');
// var content = document.getElementById('content');

// search.addEventListener('keyup', function () {
//     var xhr = new XMLHttpRequest();
//     xhr.onreadystatechange = function () {
//         if (xhr.readyState == 4 && xhr.status == 200) {
//             content.innerHTML = xhr.responseText;
//         }
//     }
//     xhr.open('GET', '../ajax/mahasiswa.php?search=' + search.value, true);
//     xhr.send();
// });
$(document).ready(function () {
    $("#search").on("keyup", function () {
        $("#content").load("ajax/mahasiswa.php?search=" + $("#search").val());
    })
});
