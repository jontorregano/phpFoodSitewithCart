</div>
<!-- /row -->

</div>
<!-- /container -->

<!-- jQuery library -->
<script src="libs/jquery-3.2.1.min.js"></script>

<!-- bootstrap JavaScript -->
<script src="libs/bootstrap-3.3.7/css/bootstrap.min.css"></script>
<script src="libs/css/bootstrap/docs-assets/js/holder.js"></script>
<script>
    $(document).ready(function(){
        // add to cart button listener
        $('.add-to-cart-form').on('submit', function(){

            // info is in the table / single product layout
            var id = $(this).find('.product-id').text();
            var quantity = $(this).find('.cart-quantity').val();

            // redirect to add_to_cart.php, with parameter values to process the request
            window.location.href = "add_to_cart.php?id=" + id + "&quantity=" + quantity;
            return false;
        });

        // update quantity button listener
        $('.update-quantity-form').on('submit', function(){

            // get basic information for updating the cart
            var id = $(this).find('.product-id').text();
            var quantity = $(this).find('.cart-quantity').val();

            // redirect to update_quantity.php, with parameter values to process the request
            window.location.href = "update_quantity.php?id=" + id + "&quantity=" + quantity;
            return false;
        });

        // change product image on hover
        $(document).on('mouseenter', '.product-img-thumb', function(){
            var data_img_id = $(this).attr('data-img-id');
            $('.product-img').hide();
            $('#product-img-'+data_img_id).show();
        });
    });
</script>

</body>
<!-- Footer-->
<footer class="footer">
    <div class="footer-copyright">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="text-center">
                        <span class="copyright">© 2017 Grab It N Go, All Rights Reserved.</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer end-->

</html>