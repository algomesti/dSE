$(document).ready(function () {
    // READ recods on page load
    readTipo(); // calling function
});

function readTipo() {
    $.ajax({
        url: "localhost:8080/product_type",
      }).done(function(data) {
          console.log(data);
      });
    //$.get("localhost:8080/product_type", {}, function (data, status) {
      // console.log(data);
    //    $(".records_content").html(data);
    //});
}

