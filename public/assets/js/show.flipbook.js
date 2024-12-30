$(document).ready(function() {
    $('#btnBack').on('click', function() {
        window.history.back();
    });

    //Alert Delete
    document.getElementById('btnDeletePd').addEventListener('click', function(e) {
        e.preventDefault(); // Prevent the form from submitting immediately

        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success mx-2',
                cancelButton: 'btn btn-danger mx-2'
            },
            buttonsStyling: false
        });

        swalWithBootstrapButtons.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                // Submit the form if confirmed
                document.getElementById('deleteForm').submit();
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                swalWithBootstrapButtons.fire({
                    title: 'Cancelled',
                    text: 'Your file is safe :)',
                    icon: 'error'
                });
            }
        });
    });

    //Share File
    $(document).ready(function() {
        $('#btnShare').on('click', function() {
            const fileUrl = "{{ asset('storage/' . $data->file_buku) }}"; // Absolute path file
            const fileName = "{{ $data->nama_buku }}"; // Nama file buku
            const privateCode = "12345ABC"; // Contoh kode untuk file private

            // Tampilkan dialog SweetAlert dengan opsi public/private
            Swal.fire({
                title: 'Bagikan File',
                text: 'Pilih tipe berbagi:',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Public',
                cancelButtonText: 'Private',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    // Public share
                    Swal.fire({
                        title: 'Bagikan File',
                        text: 'Salin tautan file ini untuk dibagikan secara publik:',
                        input: 'text',
                        inputValue: fileUrl,
                        showCancelButton: true,
                        confirmButtonText: 'Salin Tautan',
                        cancelButtonText: 'Tutup',
                        inputAttributes: {
                            readonly: true
                        }
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Salin tautan ke clipboard
                            navigator.clipboard.writeText(fileUrl).then(() => {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Tautan berhasil disalin!',
                                    text: 'Anda dapat membagikan tautan ini sekarang.',
                                });
                            }).catch((error) => {
                                console.error('Gagal menyalin tautan:', error);
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Gagal menyalin tautan!',
                                    text: 'Silakan coba lagi.',
                                });
                            });
                        }
                    });
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    // Private share
                    const privateLink = `${fileUrl}?code=${privateCode}`; // Tautan private dengan kode

                    Swal.fire({
                        title: 'Bagikan File',
                        text: 'Salin tautan file ini untuk dibagikan secara private (dengan kode):',
                        input: 'text',
                        inputValue: privateLink,
                        showCancelButton: true,
                        confirmButtonText: 'Salin Tautan',
                        cancelButtonText: 'Tutup',
                        inputAttributes: {
                            readonly: true
                        }
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Salin tautan private ke clipboard
                            navigator.clipboard.writeText(privateLink).then(() => {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Tautan berhasil disalin!',
                                    text: 'Anda dapat membagikan tautan ini sekarang.',
                                });
                            }).catch((error) => {
                                console.error('Gagal menyalin tautan:', error);
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Gagal menyalin tautan!',
                                    text: 'Silakan coba lagi.',
                                });
                            });
                        }
                    });
                }
            });
        });
    });
});