var filenameku = $(".btn-preview").data("name");
var id = $(".btn-preview").data("id");
console.log(filenameku, id);

var fileUrl= "/uploads/" + filenameku;
var pdf = new PDFAnnotate("pdf-container", fileUrl, {
    onPageUpdated(page, oldData, newData) {
        console.log(page, oldData, newData);
    },
    ready() {
        console.log("Plugin initialized successfully");
    },
    scale: 1.25,
    pageImageCompression: "FAST", // FAST, MEDIUM, SLOW(Helps to control the new PDF file size)
    });

function changeActiveTool(event) {
    var element = $(event.target).hasClass("tool-button")
      ? $(event.target)
      : $(event.target).parents(".tool-button").first();
    $(".tool-button.active").removeClass("active");
    $(element).addClass("active");
}

function enableSelector(event) {
    event.preventDefault();
    changeActiveTool(event);
    pdf.enableSelector();
}

function enablePencil(event) {
    event.preventDefault();
    changeActiveTool(event);
    pdf.enablePencil();
}

function enableAddText(event) {
    event.preventDefault();
    changeActiveTool(event);
    pdf.enableAddText();
}

function enableAddArrow(event) {
    event.preventDefault();
    changeActiveTool(event);
    pdf.enableAddArrow();
}

function addImage(event) {
    event.preventDefault();
    pdf.addImageToCanvas()
}

function enableRectangle(event) {
    event.preventDefault();
    changeActiveTool(event);
    pdf.setColor('rgba(255, 0, 0, 0.3)');
    pdf.setBorderColor('blue');
    pdf.enableRectangle();
}

function deleteSelectedObject(event) {
  event.preventDefault();
  pdf.deleteSelectedObject();
}

function savePDF() {
    Swal.fire({
        title: 'Are you sure?',
        text: "Your data will be saved!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, saved it!'
      }).then((result) => {
        if (result.isConfirmed) {
          Swal.fire(
            'Success',
            'Successfully add data.',
            'success'
          )
        }
        $pdf = pdf.savePdf(filenameku);
    })
}

function clearPage() {
    pdf.clearActivePage();
}

function showPdfData() {
    var string = pdf.serializePdf();
    $('#dataModal .modal-body pre').first().text(string);
    PR.prettyPrint();
    $('#dataModal').modal('show');
}

$(function () {
    // $('.color-tool').click(function () {
    //     $('.color-tool.active').removeClass('active');
    //     $(this).addClass('active');
    //     color = $(this).get(0).style.backgroundColor;
    //     console.log(color);
    //     pdf.setColor(color);
    // });

    $('#colorselector').change(function () {
        var color = $(this).val()
        console.log(color);
        pdf.setColor(color);
    });
    

    $('#brush-size').change(function () {
        var width = $(this).val();
        pdf.setBrushSize(width);
    });

    $('#font-size').change(function () {
        var font_size = $(this).val();
        pdf.setFontSize(font_size);
    });
});
