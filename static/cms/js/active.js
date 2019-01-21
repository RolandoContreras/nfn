function active_cliente(invoice_id,customer_id,parents_id){
    bootbox.dialog("Confirma que desea activar la cuenta?", [        
        { "label" : "Cancelar"},
        {
            "label" : "Confirmar",
            "class" : "btn-success",
            "callback": function() {
           $.ajax({
               type: "post",
               url: site+"dashboard/activaciones_clientes/active",
               dataType: "json",
               data: {invoice_id : invoice_id,  
                      customer_id : customer_id,
                      parents_id : parents_id},
               success:function(data){                             
               location.reload();
               }         
           });
           }
        }
    ]);
}