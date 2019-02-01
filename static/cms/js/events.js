function modal_img(id){
    // Get the modal
    var modal = document.getElementById('myModal');
    var captionText = "Imagen";
    // Get the image and insert it inside the modal - use its "alt" text as a caption
    var img = document.getElementById(id);
    var modalImg = document.getElementById("img01");
    img.onclick = function(){
      modal.style.display = "block";
      modalImg.src = this.src;
      captionText.innerHTML = this.alt;
    }
    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];
    // When the user clicks on <span> (x), close the modal
    span.onclick = function() { 
      modal.style.display = "none";
    }
}
function add_events(){
	var url= 'dashboard/eventos/load';
	location.href = site+url;
}
function edit_events(event_id){    
     var url = 'dashboard/eventos/load/'+event_id;
     location.href = site+url;   
}
function cancelar_events(){
	var url= 'dashboard/eventos';
	location.href = site+url;
}
function delete_events(event_id){
    bootbox.dialog("Confirma que desea elimiar el evento del sistema", [        
        { "label" : "Cancelar"},
        {
            "label" : "Confirmar",
            "class" : "btn-danger",
            "callback": function() {
           $.ajax({
               type: "post",
               url: site+"dashboard/eventos/delete",
               dataType: "json",
               data: {event_id : event_id},
               success:function(data){                             
               location.reload();
               }         
           });
           }
        }
    ]);
}