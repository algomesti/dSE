$(document).ready(function () {
    // READ recods on page load
    readContacts(); // calling function
});

function addContact() {
    // get values
    var name = $("#name").val();
   
    // Add record
    $.post("ajax/contact/add.php", {
        name: name
    }, function (data, status) {
        // close the popup
        $("#add_new_record_modal").modal("hide");
 
        // read records again
        readContacts();
 
        // clear fields from the popup
        $("#name").val("");
   
    });
}
 
function readContacts() {
    $.get("ajax/contact/read.php", {}, function (data, status) {
        $(".records_content").html(data);
    });
}

function DeleteContact(id) {
    var conf = confirm("Tem certeza que deseja remover o contato?");
    if (conf == true) {
        $.post("ajax/contact/delete.php", {
                id: id
            },
            function (data, status) {
                readContacts();
            }
        );
    }
}

function GetContactDetails(id, name) {
   
    $("#update_name").val(name)
    $("#hidden_user_id").val(id);
    $("#update_user_modal").modal("show");
}

function UpdateContact() {
    var name = $("#update_name").val();
    var id = $("#hidden_user_id").val();

    $.post("ajax/contact/update.php", {
            id: id,
            name: name
        },
        function (data, status) {
            // hide modal popup
            $("#update_user_modal").modal("hide");
            // reload Users by using readRecords();
            readContacts();
        }
    );
}

function openPhones(id) {
    var url = 'http://localhost/phonebookapi/front/phone.php?id='+id;
    window.location.href = url;
}