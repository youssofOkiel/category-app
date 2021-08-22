$(document).ready(function () {
          
    $('#category').on('change',function(e) {
      
     var category_id = e.target.value;
     
     $.ajax({
            
           url:"{{ route('subcat') }}",
           type:"POST",

           data: {
               category_id: category_id
               , _token: '{{csrf_token()}}' 
            },
           
           success:function (data) {
            console.log(data);
            $('#subcategory').empty();
            
            $.each(data.subcategories[0].subcategory, function(index,subcategory){
                 
                $('#subcategory').append('<option value="'+subcategory.id+'">'+subcategory.title+'</option>');
            })


           }
       })
    });

    $('#subcategory').on('change',function(e) {
      
      var subcategory_id = e.target.value;
      
      $.ajax({
             
            url:"{{ route('items') }}",
            type:"POST",

            data: {
              subcategory_id: subcategory_id
                , _token: '{{csrf_token()}}' 
             },
            
            success:function (data) {
             console.log(data);
             $('#items').empty();
             
             $.each(data.items, function(index,item){
                  
                 $('#items').append('<option value="'+item.id+'">'+item.title+'</option>');
             })

            }
        })
     });
});