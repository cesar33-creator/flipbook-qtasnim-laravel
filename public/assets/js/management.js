$(document).ready(function() {
    $(document).on('click', '.btn-delete', function() {
        const id = $(this).data('id');
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: "btn btn-success mx-2",
                cancelButton: "btn btn-danger mx-2",
            },
            buttonsStyling: false
        });

        swalWithBootstrapButtons.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel!",
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: `/ManagementRoles/${id}`,
                    type: 'POST',
                    data: {
                        _method: 'DELETE',
                        _token: '{{ csrf_token() }}'
                    },
                    success: function() {
                        swalWithBootstrapButtons.fire(
                            "Deleted!",
                            "Your data has been deleted.",
                            "success"
                        ).then(() => location.reload());
                    },
                    error: function() {
                        swalWithBootstrapButtons.fire(
                            "Error!",
                            "There was a problem deleting the data.",
                            "error"
                        );
                    }
                });
            } else if (
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                    "Cancelled",
                    "Your data is safe :)",
                    "error"
                );
            }
        });
    });
});