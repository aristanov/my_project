function deleteAjax(id){
   
    if(confirm('Вы уверены?')){
      
      $.ajax({

           type:'post',
           url:'controllers/delete.php',
           data:{delete_id:id},
           success:function(data){
           
                $('#delete'+id).hide('slow');

           }
      });
    }
  }
