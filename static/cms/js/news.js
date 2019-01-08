function edit_news(news_id){    
     var url = 'dashboard/noticias/load/'+news_id;
     location.href = site+url;   
}
function cancel_news(){
	var url= 'dashboard/noticias';
	location.href = site+url;
}
function add_news(){
	var url= 'dashboard/noticias/load';
	location.href = site+url;
}
function delete_news(news_id){
    bootbox.dialog("Confirma que desea eliminar la noticia", [        
        { "label" : "Cancelar"},
        {
            "label" : "Confirmar",
            "class" : "btn-danger",
            "callback": function() {
           $.ajax({
               type: "post",
               url: site+"dashboard/noticias/delete_news",
               dataType: "json",
               data: {news_id : news_id},
               success:function(data){                             
               location.reload();
               }         
           });
           }
        }
    ]);
}
