$('.btn.btn-danger').on('click', function() {
    console.log('user cliked on it ')

    $("#myModal").modal('show');


    $("#okay").on('click', function() {
        // console.log("clicking");
        $.ajax({
            url: '/api/delete',
            data: { email: email },
            type: 'POST',
            success: function(data) {
                admin();
                $("#delete_user").text("User is removed successfully.");
                $("#delete_user").fadeOut(5000);
            },
            error: function(jqXHR, textStatus, errorThrown) {

            }
        });
    })


});
