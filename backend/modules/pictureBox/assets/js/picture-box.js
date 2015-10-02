function loadPage(page,state,divId){
                    
    state.imageNumber=page;

    refreshPictureBox(divId,state)
}

function setTitleAlt(state,divId){
     var title = $("#"+divId+" input[name=title]").val();
     var alt = $("#"+divId+" input[name=alt]").val();
     var data = {};
     data.title = title;
     data.alt = alt;
     data.id = state.id;
     data.elementId = state.elementId;
     data.pictureId = state.pictureBoxPage;

    $.ajax({
        url:"/pictureBox/default/ajax-set-title",
        data:data,
        cache:false,
        async:true,
        type:"post",
        success:function(html){

             alert("Сохранено. ");
             refreshPictureBox(divId,state);
             
        }
    });
 
   
}

function refreshPictureBox(divId,state){


    $.ajax({
        url:"/pictureBox/default/ajax-layout",
        data:state,
        cache:false,
        async:false,
        success:function(html){

            $("#"+divId).html(html);

            
        },
        error:function(param,param1,param2){
            alert(param.responseText);
        }
    });
}