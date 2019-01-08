function edit_sell_bank(sell_id){    
     var url = 'dashboard/ventas_bank/load/'+sell_id;
     location.href = site+url;   
}
function edit_sell_card(sell_id){    
     var url = 'dashboard/ventas_card/load/'+sell_id;
     location.href = site+url;   
}
function process_sell_bank(sell_id,code,email){
    bootbox.dialog("Confirma que desea marcar como procesado?", [        
        { "label" : "Cancelar"},
        {
            "label" : "Confirmar",
            "class" : "btn-success",
            "callback": function() {
           $.ajax({
               type: "post",
               url: site+"dashboard/ventas/procesar_bank",
               dataType: "json",
               data: {sell_id : sell_id,
                      code:code,
                      email:email
                      },
               success:function(data){                             
               location.reload();
               }         
           });
           }
        }
    ]);
}

function process_sell_card(sell_id,first_name,last_name,email){
    bootbox.dialog("Confirma que desea marcar como procesado?", [        
        { "label" : "Cancelar"},
        {
            "label" : "Confirmar",
            "class" : "btn-success",
            "callback": function() {
           $.ajax({
               type: "post",
               url: site+"dashboard/ventas/procesar_card",
               dataType: "json",
               data: {sell_id : sell_id,
                      first_name:first_name,
                      last_name:last_name,
                      email:email
                      },
               success:function(data){                             
               location.reload();
               }         
           });
           }
        }
    ]);
}

function cancel_sell(sell_id){
    bootbox.dialog("Confirma que desea marcar como cancelado?", [        
        { "label" : "Cancelar"},
        {
            "label" : "Confirmar",
            "class" : "btn-danger",
            "callback": function() {
           $.ajax({
               type: "post",
               url: site+"dashboard/ventas/cancelar",
               dataType: "json",
               data: {sell_id : sell_id},
               success:function(data){                             
               location.reload();
               }         
           });
           }
        }
    ]);
}
function cancelar_bank(){
    var url = 'dashboard/ventas_bank';
     location.href = site+url;
}
function cancelar_card(){
    var url = 'dashboard/ventas_card';
     location.href = site+url;
}