function register(){
    var name = document.getElementById("name").value;
    var last_name = document.getElementById("last_name").value;
    var email = document.getElementById("email").value;
    var dni = document.getElementById("dni").value;
    var phone = document.getElementById("phone").value;
    var pass = document.getElementById("pass").value;
    var pass2 = document.getElementById("pass2").value;
    var address = document.getElementById("address").value;
    var pais = document.getElementById("pais").value;
    var region = document.getElementById("region").value;
    var city = document.getElementById("city").value;
    //validate
        if(name == ""){
            document.getElementById("message_name").style.display = "block";
            $("#name").focus();
        }else if(last_name == ""){
            document.getElementById("message_last_name").style.display = "block";
            $("#last_name").focus();
        }else if(email == ""){
            document.getElementById("message_email").style.display = "block";
            $("#email").focus();
        }else if(dni == ""){
            document.getElementById("message_dni").style.display = "block";
            $("#dni").focus();
        }else if(phone == ""){
            document.getElementById("message_phone").style.display = "block";
            $("#phone").focus();
        }else if(pass == ""){
            document.getElementById("message_pass").style.display = "block";
            $("#pass").focus();
        }else if(pass2 == ""){
            document.getElementById("message_pass2").style.display = "block";
            $("#pass2").focus();
        }else if(address == ""){
            document.getElementById("message_address").style.display = "block";
            $("#address").focus();
        }else if(pais == ""){
            document.getElementById("message_pais").style.display = "block";
            $("#message_pais").focus();
        }else if(region == ""){
            document.getElementById("message_region").style.display = "block";
            $("#region").focus();
        }else if(city == ""){
            document.getElementById("message_city").style.display = "block";
            $("#city").focus();
        }else{
            if(pass !== pass2){
                document.getElementById("message_pass3").style.display = "block";
                $("#pass").focus();
            }else{
                $.ajax({
                    type: "post",
                    url: site+"register/validate",
                    dataType: "json",
                    data: {name : name,
                           last_name : last_name,
                            email : email,
                            dni : dni,
                            phone : phone,
                            pass : pass,
                            address : address,
                            pais : pais,
                            region : region,
                            city : city},
                    success:function(data){
                        if(data.status == "true"){
                            location.href = site + "register/step2";
                        }
                    }         
                  });
            }
        }
}

function crear(){
    var code = document.getElementById("code").value;
    var box = $('input[name="box"]:checked').val();
 
        if(code == ""){
            document.getElementById("message_code").style.display = "block";
            $("#code").focus();
        }else if(box == ""){
            $("#box").focus();
        }else{
            $.ajax({
                type: "post",
                url: site+"register/create_register",
                dataType: "json",
                data: {code : code,
                       box : box},
                success:function(data){
                    if(data.status == "true"){
                        document.getElementById("messages_respose").style.display = "block";
                        location.href = site + "backoffice";
                    }else{
                        document.getElementById("messages_respose_2").style.display = "block";
                    }
                }         
              });
        }
}



function verify_code(){
    var code = document.getElementById("code").value;
    if(code == ""){
        $("#code").focus();
        document.getElementById("message_code").style.display = "block";
    }else{
        $.ajax({
        type: "post",
        url: site + "register/validate_code",
        dataType: "json",
        data: {code: code},
        success:function(data){            
            if(data.message == "true"){         
                $(".alert-0").removeClass('text-danger').addClass('text-success').html(data.print);
                document.getElementById("submit").disabled = false;
            }else{
                $(".alert-0").removeClass('text-success').addClass('text-danger').html(data.print);
                document.getElementById("submit").disabled = true;
            }
        }            
        });
    }
}
function validate_2passwordr(password2) {
        var password1 = document.getElementById("clave").value;
        var password2 = document.getElementById("repita_clave").value;
        
        if(password1 == "" && password2 == ""){
            $(".alert-1").removeClass('text-success').addClass('text-danger').html("Contrase&ntilde;as Invalida <i class='fa fa-times-circle-o' aria-hidden='true'></i>");
        }else{
             if(password1 == password2){
                    $(".alert-1").removeClass('text-danger').addClass('text-success').html("Las contrase&ntilde;as coinciden <i class='fa fa-check-square-o' aria-hidden='true'></i>");
                }else{
                    $(".alert-1").removeClass('text-success').addClass('text-danger').html("Las contrase&ntilde;as no coinciden <i class='fa fa-times-circle-o' aria-hidden='true'></i>");
                }
        }
    }
function validate_region(id) {
        $.ajax({
        type: "post",
        url: site + "register/validate_region",
        dataType: "json",
        data: {id: id},
        success:function(data){            
                if(data.message == "true"){         
                    obj_region = data.print;
                    var texto = "";
                    texto = texto+'<option value="">Seleccionar  Región</option>';
                    var x = 0;               
                    $.each(obj_region, function(){
                        texto = texto+'<option value="'+obj_region[x]['id']+'">'+obj_region[x]['nombre']+'</option>';
                        x++; 
                    });
                    $("#region").html(texto);
            }else{
                    var texto = "";
                    texto = texto+'<option value="">Seleccionar País</option>';
                    $("#region").html(texto);
            }
        }            
    });
}
function fade_name(name){
    if(name !== ""){ 
        document.getElementById("message_name").style.display = "none";
    }
}
function fade_last_name(last_name){
    if(last_name != ""){ 
        document.getElementById("message_last_name").style.display = "none";
    }
}
function fade_email(email){
    if(email != ""){ 
        document.getElementById("message_email").style.display = "none";
    }
}
function fade_dni(dni){
    if(dni != ""){ 
        document.getElementById("message_dni").style.display = "none";
    }
}
function fade_phone(phone){
    if(phone != ""){ 
        document.getElementById("message_phone").style.display = "none";
    }
}
function fade_pass(pass){
    if(pass != ""){ 
        document.getElementById("message_pass").style.display = "none";
    }
}
function fade_pass2(pass2){
    if(pass2 != ""){ 
        document.getElementById("message_pass2").style.display = "none";
    }
}
function fade_address(address){
    if(address != ""){ 
        document.getElementById("message_address").style.display = "none";
    }
}
function fade_ciudad(city){
    if(city != ""){ 
        document.getElementById("message_city").style.display = "none";
    }
}
function fade_code(code){
    if(code !== ""){ 
        document.getElementById("message_code").style.display = "none";
    }
}
