function mark_pay_comissions(commissions_id){
     bootbox.dialog("Confirma que desea marcar como pagado?", [        
        { "label" : "Cancelar"},
        {
            "label" : "Confirmar",
            "class" : "btn-success",
            "callback": function() {
               $.ajax({
                   type: "post",
                   url: site+"dashboard/comisiones/marcar_pagado",
                   dataType: "json",
                   data: {commissions_id : commissions_id},
                   success:function(data){                             
                   location.reload();
                   }         
           });
            }
        }
    ]);
}
function edit_comissions(commissions_id){    
     var url = 'dashboard/comisiones/load/'+commissions_id;
     location.href = site+url;   
}
function cancel_comissions(){
	var url= 'dashboard/comisiones';
	location.href = site+url;
}
function validate_customer(customer_id){
        $.ajax({
        type: "post",
        url: site + "dashboard/comisiones/validate_customer",
        dataType: "json",
        data: {customer_id: customer_id},
        success:function(data){            
            if(data.message == "true"){
                document.getElementById("code").value=data.code;    
                document.getElementById("name").value=data.name;
                $("#alert_message").html(data.print);
            }else{
                $("#alert_message").html(data.print);
            }
        }            
    });
}