// Fungsi untuk membuat cover PDF
function generatePdfCover(fileUrl, container) {
    const loadingTask = pdfjsLib.getDocument(fileUrl);
    loadingTask.promise.then(pdf => {
        pdf.getPage(1).then(page => {
            const viewport = page.getViewport({ scale: 1 });
            const canvas = document.createElement('canvas');
            const context = canvas.getContext('2d');
            canvas.height = viewport.height;
            canvas.width = viewport.width;
            container.appendChild(canvas);

            const renderTask = page.render({ canvasContext: context, viewport: viewport });
            renderTask.promise.then(() => console.log('Page rendered'));
        });
    });
}

// Fungsi upload file
$('#uploadFile').on('change', function(event) {
    const formData = new FormData();
    formData.append('pdf', event.target.files[0]);

    $.ajax({
        url: '/upload-pdf',
        method: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
            const filename = response.filename;
            const newThumb = $(`
                <div class="thumb" data-name="${filename}">
                    <button class="delete-btn" data-filename="${filename}">&times;</button>
                    <div class="pdf-cover"></div>
                </div>
            `);

            $('.covers').append(newThumb);
            generatePdfCover(`/storage/pdfs/${filename}`, newThumb.find('.pdf-cover')[0]);
        }
    });
});

// Fungsi delete file
$(document).on('click', '.delete-btn', function() {
    const filename = $(this).data('filename');
    const thumb = $(this).closest('.thumb');

    $.ajax({
        url: `/delete-pdf/${filename}`,
        method: 'DELETE',
        success: function() {
            thumb.remove();
        }
    });
});
