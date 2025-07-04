$(document).ready(function() {

    $('.delete_product_btn').click(function (e) { 
        e.preventDefault();
        
        var id = $(this).val()
        

        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this imaginary file!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              $.ajax({
                method: "POST",
                url: "code.php",
                data: {
                    'product_id':id,
                    'delete_product_btn':true 
                }, 
                success: function (response) {
                 window.location.href='products.php';
                  if(response.status == 200){
                    
                    swal("Success!", "Product Deleted Successfully", "success");
                    $("#products_table").load(location.href + " #products_table");  
                  } else if(response.status == 500){
                    swal("Error!", "Product Not Deleted", "error");
                  }
                }
              });
            } 
          });
    });
    
});
