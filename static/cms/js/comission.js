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