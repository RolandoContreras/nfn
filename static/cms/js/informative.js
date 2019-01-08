function new_informative(){
        var url= 'dashboard/informativos/load';
	location.href = site+url;
}
function edit_informative(message_id){    
     var url = 'dashboard/informativos/load/'+message_id;
     location.href = site+url;   
}
function delete_informative(message_id){
     bootbox.dialog("¿Confirma que desea eliminar el registro?", [        
        { "label" : "Cancelar"},
        {
            "label" : "Confirmar",
            "class" : "btn-danger",
            "callback": function() {
               $.ajax({
                   type: "post",
                   url: site+"dashboard/informativos/delete_informative",
                   dataType: "json",
                   data: {message_id : message_id},
                   success:function(data){                             
                   location.reload();
                   }         
           });
            }
        }
    ]);
}
function cancel_informative(){
	var url= 'dashboard/informativos';
	location.href = site+url;
}
