<script src="{{ asset('assets/site/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/site/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/site/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/site/js/wow.min.js') }}"></script>
<script src="{{ asset('assets/site/js/owl.carousel.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/3.2.3/jquery.cookie.min.js"></script>
<script src="{{ asset('assets/common/js/axios.min.js') }}"></script>
<script src="{{ asset('assets/site/js/custom.js') }}"></script>
<script>
    $(".item-inc").click(function(e){
        e.preventDefault(); // Prevent the default action of the link
        var inputField = $(this).siblings(".item-qty"); // Get the input field next to the clicked element
        var currentValue = parseInt(inputField.val()); // Get the current value
        inputField.val(currentValue + 1); // Increment the value by 1
    });

    // Decrement Quantity
    $(".item-desc").click(function(e){
        e.preventDefault(); // Prevent the default action of the link
        var inputField = $(this).siblings(".item-qty"); // Get the input field next to the clicked element
        var currentValue = parseInt(inputField.val()); // Get the current value
        if (currentValue > 1) { // Ensure the value doesn't go below 1
            inputField.val(currentValue - 1); // Decrement the value by 1
        }
    });
</script>
