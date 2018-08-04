function send_messages_home(){
    var name = document.getElementById("name").value;
    var phone = document.getElementById("phone").value;
    var email = document.getElementById("email").value;
    var subject = document.getElementById("subject").value;
    var comments = document.getElementById("messages").value;
    
    if(name == ""){
        document.getElementById("message_name").style.display = "block";
        $("#name").focus();
    }else if(phone == ""){
        document.getElementById("message_phone").style.display = "block";
        $("#phone").focus();
    }else if(email == ""){
        document.getElementById("message_email").style.display = "block";
        $("#email").focus();
    }else if(subject == ""){
        document.getElementById("message_subject").style.display = "block";
        $("#subject").focus();
    }else if(comments == ""){
        document.getElementById("message_comments").style.display = "block";
        $("#messages").focus();
    }else{
        var email_2 = validar_email(email);
        if(email_2 == true){
               $.ajax({
               type: "post",
               url: site+"home/send_messages",
               dataType: "json",
               data: {name : name,
                      phone : phone,
                      email : email,
                      subject : subject,
                      comments : comments},
               success:function(data){
                   if(data){
                       document.getElementById("messages").style.display = "block";
                   }
               }         
             });
             
             document.getElementById("messages_respose").style.display = "block";
             
        }else{
            document.getElementById("message_email").style.display = "block";
            $("#email").focus();
        }
    }
}
function validar_email( email ){
    var regex = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return regex.test(email) ? true : false;
}
function fade_name(name){
    var name = document.getElementById("name").value;
    if(name != ""){ 
        document.getElementById("message_name").style.display = "none";
    }
}
function fade_phone(phone){
    var phone = document.getElementById("phone").value;
    if(phone != ""){ 
        document.getElementById("message_phone").style.display = "none";
    }
}
function fade_subject(subject){
    var subject = document.getElementById("subject").value;
    if(subject != ""){ 
        document.getElementById("message_subject").style.display = "none";
    }
}
function fade_email(email){
    var email = document.getElementById("email").value;
    if(email != ""){ 
        document.getElementById("message_email").style.display = "none";
    }
}
function fade_comments(comments){
    var comments = document.getElementById("messages").value;
    if(comments != ""){ 
        document.getElementById("message_comments").style.display = "none";
    }
}

