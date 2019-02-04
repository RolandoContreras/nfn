function nueva_factura_consumo(){
    bootbox.dialog("Confirma que desea crear las facturas de consumo?", [        
        { "label" : "Cancelar"},
        {
            "label" : "Confirmar",
            "class" : "btn-success",
            "callback": function() {
           $.ajax({
               type: "post",
               url: site+"dashboard/jobs/crear_factura_consumo",
               dataType: "json",
               data: {},
               success:function(data){                             
               location.reload();
               }         
           });
           }
        }
    ]);
}