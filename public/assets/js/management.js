$(document).ready(function () {
    // Inisialisasi SweetAlert2 dengan styling custom
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: "btn btn-success mx-2", // Tambahkan margin horizontal
            cancelButton: "btn btn-danger mx-2",   // Tambahkan margin horizontal
        },
        buttonsStyling: false,
    });

    // Event untuk tombol back
    $("#backButton").on("click", function () {
        console.log("Back button clicked!");
        if (window.history.length > 1) {
            window.history.back();
        } else {
            alert("Tidak ada halaman sebelumnya.");
        }
    });

    // Menutup navbar saat klik di luar
    $(document).on("click", function (event) {
        var target = $(event.target);
        if (
            !target.closest(".navbar").length &&
            !target.closest(".form-inline").length
        ) {
            $(".navbar-collapse").collapse("hide");
        }
    });

    // Filter button aktif sesuai URL
    const currentURL = window.location.href;
    $(".filter-tabs a").each(function () {
        const href = $(this).attr("href");
        if (currentURL.includes(href)) {
            $(".filter-tabs .btn").removeClass("active");
            $(this).addClass("active");
        }
    });

    // SweetAlert2 untuk tombol hapus
    const deleteButtons = document.querySelectorAll(".delete-button");

    deleteButtons.forEach((button) => {
        button.addEventListener("click", function () {
            const deleteUrl = this.getAttribute("data-url");

            swalWithBootstrapButtons
                .fire({
                    title: "Yakin Hapus Data Roles?",
                    text: "Anda tidak akan dapat mengembalikan ini!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Yes, delete it!",
                    cancelButtonText: "No, cancel!",
                    reverseButtons: true,
                })
                .then((result) => {
                    if (result.isConfirmed) {
                        // Kirim permintaan delete menggunakan fetch
                        fetch(deleteUrl, {
                            method: "POST",
                            headers: {
                                "X-CSRF-TOKEN": document
                                    .querySelector('meta[name="csrf-token"]')
                                    .getAttribute("content"),
                                "Content-Type": "application/json",
                            },
                            body: JSON.stringify({ _method: "DELETE" }),
                        })
                            .then((response) => {
                                if (response.ok) {
                                    swalWithBootstrapButtons
                                        .fire({
                                            title: "Deleted!",
                                            text: "Anda Berhasil Hapus Data Roles.",
                                            icon: "success",
                                        })
                                        .then(() => {
                                            // Reload halaman setelah penghapusan berhasil
                                            location.reload();
                                        });
                                } else {
                                    swalWithBootstrapButtons.fire({
                                        title: "Error",
                                        text: "Data Roles Tidak Bisa di Hapus.",
                                        icon: "error",
                                    });
                                }
                            })
                            .catch((error) => {
                                swalWithBootstrapButtons.fire({
                                    title: "Error",
                                    text: "An unexpected error occurred.",
                                    icon: "error",
                                });
                            });
                    } else if (result.dismiss === Swal.DismissReason.cancel) {
                        swalWithBootstrapButtons.fire({
                            title: "Cancelled",
                            text: "Data Roles Anda Aman :)",
                            icon: "error",
                        });
                    }
                });
        });
    });
});
