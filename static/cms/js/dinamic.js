function save_content(dinamic_id){
    var editorText = CKEDITOR.instances.content.getData();
    var title =  document.getElementById("title").value;
    bootbox.dialog("Confirma que desea guardar el contenido", [        
        { "label" : "Cancelar"},
        {
            "label" : "Confirmar",
            "class" : "btn-success",
            "callback": function() {
           $.ajax({
               type: "post",
               url: site+"dashboard/legal/save_content",
               dataType: "json",
               data: {dinamic_id : dinamic_id,
                      title : title,
                      editorText : editorText},
               success:function(data){                             
               location.reload();
               }         
           });
           }
        }
    ]);
}