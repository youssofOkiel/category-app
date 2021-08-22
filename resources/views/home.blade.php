<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

    
    {{-- bootstrab css --}}
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"> --}}

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>


</head>
    <body class="antialiased">
      <div class="container-fluid m-5">
        <div class="">
          <a type="button" class="btn btn-warning" href="{{route('home-ar')}}">
            ar
          </a>
        </div>
      </div>
        <div class="container" style="margin-top: 50px; margin-left: 300px">
          <div class="row">
              <div class="col-lg-6">
                  <form action="">
                     
                    <h4>Category</h4>
                      <select class="browser-default custom-select" name="category" id="category">
                          <option selected>Select category</option>
                          @foreach ($categoris as $item)
                          <option value="{{ $item->id }}">{{ $item->title }}</option>
                          @endforeach
                      </select>
                     
                      <h4>Subcategory</h4>
                      <select class="browser-default custom-select" name="subcategory" id="subcategory">
                        <option selected>Select sub-category</option>
                      </select>

                      <h4>items</h4>
                      <select class="browser-default custom-select" name="items" id="items">
                        <option selected>Select items</option>
                      </select>

                      <button class="btn btn-primary" type="submit"> add item </button>
                  </form>
                                 
              </div>
          </div>
      </div>

      <script type="text/javascript">
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
    </script>

        {{-- jquert cdn   --}}
        {{-- <script src="{{ asset('js/main.js') }}" defer></script> --}}
        
    </body>
</html>
