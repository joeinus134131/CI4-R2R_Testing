<?= $this->extend('layouts/template'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h1>Finance Reconsiliation.</h1>
        </div>
    </div>
    <div class="col">
        <div class="btn-group">
            <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Condition
            </button>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="#">IF</a>
                <a class="dropdown-item" href="#">IF Else</a>
                <a class="dropdown-item" href="#">Else</a>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="btn-group">
            <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Operator
            </button>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="#">Equal to</a>
                <a class="dropdown-item" href="#">Greater than</a>
                <a class="dropdown-item" href="#">Smaller than</a>
                <a class="dropdown-item" href="#">Greater than or equal to</a>
                <a class="dropdown-item" href="#">Smaller than or equal to</a>
                <a class="dropdown-item" href="#">Not equal to</a>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>