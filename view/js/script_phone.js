$(document).ready(function () {
    // READ recods on page load
    readPhones(); // calling function
    $("#area_code").mask('99');
    
});


function addPhone() {
    // get values
    var country_code = $("#country_code").val()
    var area_code = $("#area_code").val()
    var phone = $("#phone").val()
    var id_contact = $("#id_contact").val()
   
    // Add record
    $.post("ajax/phone/add.php", {
        country_code: country_code,
        area_code: area_code,
        phone: phone,
        id_contact: id_contact
    }, function (data, status) {
        // close the popup
        $("#add_new_record_modal").modal("hide");
 
        // read records again
        readPhones();
 
        // clear fields from the popup
        $("#name").val("");
   
    });
}
 

 
function readPhones() {
    var id = $("#id_contact").val();
    $.get("ajax/phone/read.php?id="+id, {}, function (data, status) {
        $(".records_content").html(data);
    });
}

function DeletePhone(id) {
    var conf = confirm("Tem certeza que deseja remover o telefone?");
    if (conf == true) {
        $.post("ajax/phone/delete.php", {
                id: id
            },
            function (data, status) {
                readPhones();
            }
        );
    }
}

function GetPhoneDetails(id, country_code, area_code, phone ) {
    
    $("#update_country_code").val(country_code)
    $("#update_area_code").val(area_code); 
    $("#update_phone").val(phone)
    $("#hidden_phone_id").val(id);
   
    $("#update_user_modal").modal("show");
}

function UpdatePhone() {
    var id_contact = $("#id_contact").val();
    var id_phone = $("#hidden_phone_id").val();
    var country_code = $("#update_country_code").val();
    var area_code = $("#update_area_code").val();
    var phone = $("#update_phone").val();

    $.post("ajax/phone/update.php", {
            id_contact: id_contact,
            id_phone: id_phone,
            country_code: country_code,
            area_code: area_code,
            phone: phone
        },
        function (data, status) {
            // hide modal popup
            $("#update_user_modal").modal("hide");
            // reload Users by using readRecords();
            readPhones();
        }
    );
}

function DialPhone(country_code, area_code, phone) {
    var tel = "+" + country_code + area_code + phone;
    window.location.href="tel:+"+tel;
}