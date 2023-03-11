<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Consolidation</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active">PDF Viewer</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <div class="content">
        <div class="container-fluid">
            <form method="post" action="<?php echo base_url('PdfViewer/compare_view'); ?>" enctype="multipart/form-data">
                <div class="card card-primary card-outline-tabs">
                    <div class="card-header p-0 border-bottom-0">
                        <input type="file" name="pdf_file[]" multiple>
                        <button type="submit">Tampilkan</button>
                    </div>
                    <!-- Tambahkan sebuah iframe ke halaman baru -->
                    <div class="card-body">
                        <div class="div">
                            <div class="row">
                                <!-- <?php ?>
                                <div class="col-md-6">
                                    <iframe src="https://www.mistercoding.com/post/nestjs/membuat-crud-nestjs/" width="100%" height="500px"></iframe>
                                </div>
                                <div class="col-md-6">
                                    <iframe src="https://www.mistercoding.com/post/nestjs/membuat-crud-nestjs/" width="100%" height="500px"></iframe>
                                </div>
                                <div class="col-md-6">
                                    <iframe src="https://www.mistercoding.com/post/nestjs/membuat-crud-nestjs/" width="100%" height="500px"></iframe>
                                </div> -->
                                <?php for ($i = 0; $i < 4; $i++) { ?>
                                    <div class="col-md-6">
                                        <iframe src="https://www.mistercoding.com/post/nestjs/membuat-crud-nestjs/" width="100%" height="500px"></iframe>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">
    let docTitle = document.title;
    window.addEventListener("blur", () => {
        document.title = "Please come back!";
    });

    window.addEventListener("focus", () => {
        document.title = docTitle;
    });
</script>