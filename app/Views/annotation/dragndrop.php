<style>
    .pdf-meta {
        background: rgba(0, 0, 0, 0.2);
        padding: 10px;
    }

    .pdf-buttons {
        display: flex;
        justify-content: space-between;
        margin: 0 auto;
        width: 80%;
        text-align: center;
    }

    .page-count-container {
        display: flex;
        justify-content: space-between;
        /* padding: 0 10%; */
    }

    #page_num {
        width: 35px;
        display: inline;
        text-align: center;
    }

    #pdf-loader {
        display: none;
    }

    #pdf-canvas {
        width: 100%;
        border: 1px solid rgba(0, 0, 0, 0.2);
        box-sizing: border-box;
    }
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/imgareaselect/1.0.0-rc.1/css/imgareaselect-animated.css">
<!-- Main content -->
<section class="content">
    <?php if (isset($coordinate_sign) && $step == "getOTP") : ?>
        <div class="row">
            <div class="col-12">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title"><i class="fas fa-clipboard"></i> Dokumen siap untuk diproses</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <h4>Dokumen berikut telah ditambahkan spesimen dan siap untuk diproses.</h4>
                        <p>Autentikasi akan menggunakan OTP yang akan dikirimkan ke Email dan SMS atau Whatsapp.</p>

                        <button class="btn btn-primary getOTP">Kirim OTP</button>

                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

            </div>
            <!-- /.col -->
        </div>
    <?php endif; ?>
    <div class="row">
        <div class="col-12">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-clipboard"></i> <?= $form_title ?></h3>
                </div>
                <div class="card-body">
                    <div id="pdf-main-container" style="width: 60%; margin:0 auto;">
                        <div id="pdf-loader">Loading document ...</div>
                        <div id="pdf-contents">
                            <div class="col-md-12 pdf-meta">
                                <div class="pdf-buttons">
                                    <div class="col-md-4">
                                        <button id="pdf-first" class="btn btn-default btn-sm">First</button>
                                        <button id="pdf-prev" class="btn btn-default btn-sm">Prev</button>
                                    </div>
                                    <div class="col-md-3 align-items-center page-count-container">
                                        <div style="height: fit-content;">Page </div>
                                        <div style="height: fit-content;"><input type="text" id="page_num"> </div>
                                        <div style="height: fit-content;">of </div>
                                        <div style="height: fit-content;" id="page_count"></div>
                                    </div>
                                    <div class="col-md-4 float-left">
                                        <button id="pdf-next" class="btn btn-default btn-sm">Next</button>
                                        <button id="pdf-last" class="btn btn-default btn-sm">Last</button>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <canvas id="pdf-canvas" width="1000"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <form id="form-submit-setSignature">
                        <input type="hidden" name="<?= $csrf_token_name ?>" value="<?= $csrf_hash ?>">
                        <input type="hidden" name="authMode" value="0" />
                        <input type="hidden" name="id_flow_signing" value="<?= $id_flow_signing ?>" />
                        <input type="hidden" name="flow_request_id" value="<?= $flow_request_id ?>" />
                        <input type="hidden" name="flow_ticket_id" value="<?= $flow_ticket_id ?>" />
                        <input type="hidden" name="user_peruri_id" value="<?= $user_peruri_id ?>" />
                        <input type="hidden" name="x1" value="" />
                        <input type="hidden" name="x2" value="" />
                        <input type="hidden" name="y1" value="" />
                        <input type="hidden" name="y2" value="" />
                        <input type="hidden" name="lower_left_x" value="" required="required" />
                        <input type="hidden" name="lower_left_y" value="" required="required" />
                        <input type="hidden" name="upper_right_x" value="" required="required" />
                        <input type="hidden" name="upper_right_y" value="" required="required" />
                        <input type="hidden" name="dokumen_height" value="" required="required" />
                        <input type="hidden" name="dokumen_width" value="" required="required" />
                        <input type="hidden" name="dokumen_page" id="dokumen_page">
                        <!-- signature user -->
                        <input type="hidden" name="digital_signature_path" id="digital_signature_path" value="<?= $speciment ?>">
                        <input type="hidden" name="is_visible_sign" id="is_visible_sign" value="True">
                        <input type="hidden" name="order_id" id="order_id" value="<?= $orderId ?>">
                        <input type="hidden" name="dokumen_password" id="dokumen_password">
                        <input type="hidden" name="stamp_mode" id="stamp_mode" value="SPECIMEN">
                        <!--
						<label style="margin-bottom: 20px">
							<input type="checkbox" name="certificateLevel" value="1">&nbsp;Final Sign (Penandatangan Terakhir)
						</label>
						-->
                        <?php if ($step != "getOTP") : ?>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <button type="button" id="btnAddMore" class="btn btn-info btn-block">Tambahkan Spesimen</button>
                                </div>
                            </div>
                        <?php endif; ?>
                    </form>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
<!-- /.content -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.14.305/pdf.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/imgareaselect/0.9.10/js/jquery.imgareaselect.min.js"></script>


<script>
    const pdfAsDataUri = '<?= $base64 ?>';
    const pdf = convertDataURIToBinary(pdfAsDataUri);

    const pageNum = document.querySelector('#page_num');
    const pageCount = document.querySelector('#page_count');
    const currentPage = document.querySelector('#current_page');
    const previousPage = document.querySelector('#prev_page');
    const nextPage = document.querySelector('#next_page');
    const zoomIn = document.querySelector('#zoom_in');
    const zoomOut = document.querySelector('#zoom_out');

    const log_sign = '<?= json_encode($coordinate_sign) ?>';
    let coordinates = JSON.parse(log_sign);

    const initialState = {
        pdfDoc: null,
        currentPage: 1,
        pageCount: 0,
        zoom: 1,
    };

    $('#dokumen_page').val(1);

    function convertDataURIToBinary(dataURI) {
        var base64 = dataURI;
        var raw = window.atob(base64);
        var rawLength = raw.length;
        var array = new Uint8Array(new ArrayBuffer(rawLength));

        for (var i = 0; i < rawLength; i++) {
            array[i] = raw.charCodeAt(i);
        }
        return array;
    }

    pdfjsLib
        .getDocument(pdf)
        .promise.then((data) => {
            initialState.pdfDoc = data;
            // console.log('pdfDocument', initialState.pdfDoc);

            pageCount.textContent = initialState.pdfDoc.numPages;

            renderPage();
        })
        .catch((err) => {
            alert(err.message);
        });

    // Render the page.
    const renderPage = () => {
        // Load the first page.
        // console.log(initialState.pdfDoc, 'pdfDoc');
        initialState.pdfDoc
            .getPage(initialState.currentPage)
            .then((page) => {
                // console.log('page', page);

                const canvas = document.querySelector('#pdf-canvas');
                const ctx = canvas.getContext('2d');
                const viewport = page.getViewport({
                    scale: initialState.zoom,
                });

                canvas.height = viewport.height;
                canvas.width = viewport.width;

                // Render the PDF page into the canvas context.
                const renderCtx = {
                    canvasContext: ctx,
                    viewport: viewport,
                };

                page.render(renderCtx);

                pageNum.value = initialState.currentPage;

                $('input[name="dokumen_height"]').val(viewport.height);
                $('input[name="dokumen_width"]').val(viewport.width);

                var canvaspdf = $('#pdf-canvas');
                var canvasWidth = document.getElementById('pdf-canvas').clientWidth;
                var canvasHeight = document.getElementById('pdf-canvas').clientHeight;

                var llx = 0,
                    lly = 0,
                    urx = 0,
                    ury = 0;


                if (coordinates !== null && '<?= $step ?>' == "getOTP") {
                    coordinates.forEach(element => {
                        drawSpecimen(ctx, canvas, 1, [element]);
                    });
                } else {
                    var imgsign = new Image();
                    imgsign.onload = function() {
                        var signheight = imgsign.height;
                        var signwidth = imgsign.width;

                        $(canvaspdf).imgAreaSelect({
                            aspectRatio: signwidth + ':' + signheight,
                            handles: true,
                            show: true,
                            onSelectEnd: function(img, selection) {
                                var height = parseInt($('input[name="dokumen_height"]').val());
                                var width = parseInt($('input[name="dokumen_width"]').val());
                                var scale = width / (canvasWidth - 1);

                                var lower_left_x = selection.x1 * scale,
                                    lower_left_y = height - (selection.y2 * scale),
                                    upper_right_x = selection.x2 * scale,
                                    upper_right_y = height - (selection.y1 * scale);

                                var diff_x = Math.abs(lower_left_x - upper_right_x),
                                    diff_y = Math.abs(lower_left_y - upper_right_y)

                                if (diff_x < 1 && diff_y < 1) {
                                    $(canvaspdf).imgAreaSelect({
                                        x1: $('input[name="x1"]').val(),
                                        y1: $('input[name="y1"]').val(),
                                        x2: $('input[name="x2"]').val(),
                                        y2: $('input[name="y2"]').val()
                                    });
                                } else {
                                    $('input[name="x1"]').val(selection.x1);
                                    $('input[name="x2"]').val(selection.x2);
                                    $('input[name="y1"]').val(selection.y1);
                                    $('input[name="y2"]').val(selection.y2);
                                    $('input[name="lower_left_x"]').val(lower_left_x);
                                    $('input[name="lower_left_y"]').val(lower_left_y);
                                    $('input[name="upper_right_x"]').val(upper_right_x);
                                    $('input[name="upper_right_y"]').val(upper_right_y);
                                }
                            },
                            zIndex: -2,
                            borderWidth: 4,
                        });

                        var is_visible_sign = $('#is_visible_sign').val();
                        if (is_visible_sign == 'True') {
                            var wdth = 100;
                            var hgth = (signheight * wdth) / signwidth;

                            var height = parseInt($('input[name="dokumen_height"]').val());
                            var width = parseInt($('input[name="dokumen_width"]').val());
                            var scale = width / (canvasWidth - 1);


                            if (llx != 0 && lly != 0 && urx != 0 && ury != 0) {
                                var lower_left_x = llx,
                                    lower_left_y = lly,
                                    upper_right_x = urx,
                                    upper_right_y = ury;

                                var x1 = lower_left_x / scale,
                                    x2 = upper_right_x / scale,
                                    y1 = (height - upper_right_y) / scale,
                                    y2 = (height - lower_left_y) / scale;
                            } else {
                                var x1 = 0,
                                    x2 = 0 + wdth,
                                    y1 = 0,
                                    y2 = 0 + hgth;

                                var lower_left_x = x1 * scale,
                                    lower_left_y = height - (y2 * scale),
                                    upper_right_x = x2 * scale,
                                    upper_right_y = height - (y1 * scale);
                            }

                            $('input[name="x1"]').val(x1);
                            $('input[name="x2"]').val(x2);
                            $('input[name="y1"]').val(y1);
                            $('input[name="y2"]').val(y2);
                            $('input[name="lower_left_x"]').val(lower_left_x);
                            $('input[name="lower_left_y"]').val(lower_left_y);
                            $('input[name="upper_right_x"]').val(upper_right_x);
                            $('input[name="upper_right_y"]').val(upper_right_y);

                            $(canvaspdf).imgAreaSelect({
                                x1: x1,
                                y1: y1,
                                x2: x2,
                                y2: y2
                            });
                        }

                        var digital_signature_path = $('#digital_signature_path').val();
                        $(".imgareaselect-selection").css({
                            "background": "url('" + digital_signature_path + "') center/100% 100% no-repeat"
                        });
                    }
                    imgsign.src = $('#digital_signature_path').val();
                }
            });
    };

    function drawSpecimen(__CANVAS_CTX, __CANVAS, page_no, coordinates) {
        var image_specimen = new Image();
        image_specimen.src = coordinates[0].speciment;
        image_specimen.onload = function() {
            for (var i in coordinates) {
                if (coordinates[i].page == page_no) {
                    var height_doc = parseInt($('input[name="dokumen_height"]').val());
                    var width_doc = parseInt($('input[name="dokumen_width"]').val());
                    var scale_image = width_doc / (__CANVAS.width - 1);

                    var lower_left_x_image = coordinates[i].lowerLeftX,
                        lower_left_y_image = coordinates[i].lowerLeftY,
                        upper_right_x_image = coordinates[i].upperRightX,
                        upper_right_y_image = coordinates[i].upperRightY;

                    var x1_image = lower_left_x_image / scale_image,
                        x2_image = upper_right_x_image / scale_image,
                        y1_image = (height_doc - upper_right_y_image) / scale_image,
                        y2_image = (height_doc - lower_left_y_image) / scale_image;

                    var width_image = x2_image - x1_image,
                        height_image = y2_image - y1_image;

                    __CANVAS_CTX.drawImage(this, 10, 10);
                }
            }
        }
    }

    $(".getOTP").click(function() {
        var form = document.getElementById('form-submit-setSignature');
        var formData = new FormData(form);

        $('.preloader').fadeIn('fast');

        $.ajax({
                url: '<?= $base_url . $page; ?>/data/submit_getOTP',
                enctype: 'multipart/form-data',
                data: formData,
                processData: false,
                contentType: false,
                type: 'POST',
                dataType: 'json',
            })
            .done(function(data) {
                $('.preloader').fadeOut('fast');
                console.log(data);
                if (data.status == true) {
                    Swal.fire({
                        type: 'success',
                        title: 'Success',
                        text: data.message.value,
                        showConfirmButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'OK'
                    }).then(function() {
                        window.location.href = "<?= $base_url . $page ?>/data/process_signing/" + <?= $flow_request_id ?> + '/' + data.message.id_log;
                    });
                } else {
                    Swal.fire({
                        type: 'error',
                        title: 'Failed',
                        html: data.message,
                        showConfirmButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'OK'
                    }).then(function() {

                    });
                }
            })
    })

    $("#btnAddMore").click(function() {
        var form = document.getElementById('form-submit-setSignature');
        var formData = new FormData(form);

        $('.preloader').fadeIn('fast');

        $.ajax({
                url: '<?= $base_url . $page; ?>/data/submit_setSignature',
                enctype: 'multipart/form-data',
                data: formData,
                processData: false,
                contentType: false,
                type: 'POST',
                dataType: 'json',
            })
            .done(function(data) {
                $('.preloader').fadeOut('fast');
                console.log(data);
                if (data.status == true) {
                    Swal.fire({
                        type: 'success',
                        title: 'Success',
                        text: data.message,
                        showConfirmButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'OK'
                    }).then(function() {
                        location.reload(true);
                    });
                } else {
                    Swal.fire({
                        type: 'error',
                        title: 'Failed',
                        html: data.message,
                        showConfirmButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'OK'
                    }).then(function() {
                        window.location.href = "<?= $base_url . $page ?>/data";
                    });
                }
            })
    })
</script>