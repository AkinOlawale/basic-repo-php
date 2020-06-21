<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Tech Test</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>
    <body>

        <div class="container">
            <h2>Form</h2>
            <form class="product-form">
                <div class="form-group">
                    <label for="pname">Product Name:</label>
                    <input type="text" class="form-control" id="pname" placeholder="Product Name:" name="product-name" required="required">
                </div>
                <div class="form-group">
                    <label for="qty">Quantity In Stock:</label>
                    <input type="text" class="form-control" id="qty" placeholder="Quantity In Stock" name="quantity-in-stock" required="required">
                </div>
                <div class="form-group">
                    <label for="price">Price Per Item</label>
                    <input type="text" class="form-control" id="price" placeholder="Price Per Item" name="price-per-item" required="required">
                </div>                
                <button type="submit" class="btn btn-success">Submit</button>
            </form>

            <div class="result"></div>
        </div>

    </body>
</html>

<script>
//javascript and AJAX process
    $('.product-form').submit(function (e) {
        e.preventDefault();
        $.ajax({
            url: "api/xml-process.php",
            type: "post",
            data: $(this).serialize(),
            beforeSend: function () {
                $('.result').html('Loading.. Please wait');
            },
            success: function (response) {
                //echo out table
                $('.result').html('<br/><br/><p style="font-weight:bold;">Results:</p><br/>' + response);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
            }
        });
    });
</script>