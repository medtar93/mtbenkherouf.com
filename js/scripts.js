
(function($) {
    $("#contactForm").submit(function(event){
    // cancels the form submission
    event.preventDefault();
    submitForm();
});
    $.ajax({
    type: "POST",
    url: "php/form-process.php",
    data: "name=" + name + "&email=" + email + "&message=" + message,
    success : function(text){
        if (text == "success"){
            formSuccess();
        } else {
            formError();
            submitMSG(false,text);
        }
    }
});
});