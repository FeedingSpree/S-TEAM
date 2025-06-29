
$(document).ready(function () {
    
  
    $(document).on('click','.increment-btn', function (e) {
        e.preventDefault();
        var qty = $(this).closest('.product_data').find('.input-qty').val();
        var value = parseInt(qty, 10);
        value = isNaN(value) ? 1 : value;
        if(value < 10){
            value++;
            $(this).closest('.product_data').find('.input-qty').val(value);
        }
    });
    
    
    $(document).on('click','.decrement-btn', function (e) { 
        e.preventDefault();
        var qty = $(this).closest('.product_data').find('.input-qty').val();
        
        var value = parseInt(qty, 10);
        value = isNaN(value) ? 1 : value;
        if(value > 1){
            value--;
            $(this).closest('.product_data').find('.input-qty').val(value);
        }
    });

    $(document).on('click', '.addToCartBtn', function (e) {
        e.preventDefault();
        console.log("Button clicked"); // Check if the button is detected
    });
    
    
    
    $(document).on('click', '.addToCartBtn', function (e) {
        e.preventDefault();
    
        // Locate the parent container and get the quantity value
        var productContainer = $(this).closest('.product_data'); // Find the closest product data container
        var qtyField = productContainer.find('.input-qty'); // Locate the input field
        var qty = parseInt(qtyField.val()); // Parse the value as an integer
        var prod_id = $(this).val(); // Get the product ID from the button value
    
        // If quantity is invalid, set it to 1
        if (isNaN(qty) || qty <= 0) {
            qty = 1;
            qtyField.val(qty); // Reset the input field value to 1
        }
    
        console.log("Sending data:", { prod_id, qty }); // Debugging log
    
        // Send data via AJAX
        $.ajax({
            method: "POST",
            url: "functions/handlecart.php",
            data: {
                "prod_id": prod_id,
                "prod_qty": qty,
                "scope": "add"
            },
            success: function (response) {
                console.log("Server Response:", response); // Log the server's response
                if (response == 201) {
                    alertify.success("Product Added to Cart");
                } else if (response == "existing") {
                    alertify.success("Product Already in Cart");
                } else if (response == 401) {
                    alertify.error("Login to Continue");
                } else if (response == 500) {
                    alertify.error("Something went wrong");
                }
            },
            error: function (xhr, status, error) {
                console.error("AJAX Error:", status, error); // Debugging error
            }
        });
    });
    
    


    $(document).on('click','.updateQty', function () {
        var qty = $(this).closest('.product_data').find('.input-qty').val();
        var prod_id = $(this).closest('.product_data').find('.prodId').val();
        $.ajax({
            method: "POST",
            url: "functions/handlecart.php",
                data: {
                    "prod_id": prod_id,
                    "prod_qty": qty,
                    "scope": "update"
                },
            success: function (response) {
                // console.log(response);
            }
        });

    });


    $(document).on('click','.deleteItem', function () {
        
        var cart_id = $(this).val();
       
        $.ajax({
            method: "POST",
            url: "functions/handlecart.php",
                data: {
                    "cart_id": cart_id,
                    "scope": "delete"
                },
            success: function (response) {
                console.log(response);
                    if(response == 200)
                    {
                        alertify.success("Product Deleted From Cart");
                        $('#mycart').load(location.href + ' #mycart');
                    }else{
                        alertify.success(response);
                    }

            }
        });

    });




    });