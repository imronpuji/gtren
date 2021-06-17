<?php $this->extend('dashboard') ?>
<?php $this->section('content') ?>
<div class="content-header">
    <div>
        <h2 class="content-title card-title">Data Produk</h2>
        <!-- <p>Lorem ipsum dolor sit amet.</p> -->
    </div>
    <div><!-- 
        <a href="#" class="btn btn-light rounded font-md">Export</a>
        <a href="#" class="btn btn-light rounded  font-md">Import</a> -->
        <a href="<?= base_url() ?>/admin/tambahproduk" class="btn btn-primary btn-sm rounded">Create new</a>
    </div>
</div>
<div class="attention">
    <?php if(!empty(session()->getFlashdata('success'))){ ?>

        <div class="alert alert-success bg-success text-white">
            <?php echo session()->getFlashdata('success');?>
        </div>

    <?php } ?>

    <?php if(!empty(session()->getFlashdata('danger'))){ ?>

        <div class="alert alert-danger bg-danger text-white">
            <?php echo session()->getFlashdata('danger');?>
        </div>

    <?php } ?>
</div>
<div class="card mb-4">
    <header class="card-header">
        <div class="row align-items-center">
            <div class="col-md-3 col-12 me-auto mb-md-0 mb-3">
                <select class="form-select">
                    <option selected>All category</option>
                    <?php foreach ($categories as $category): ?>
                        <option value="<?= $category->id ?>"><?= $category->category ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <!-- <div class="col-md-2 col-6">
                <input type="date" value="02.05.2021" class="form-control">
            </div> -->
           <!--  <div class="col-md-2 col-6">
                <select class="form-select">
                    <option selected>Status</option>
                    <option>Active</option>
                    <option>Disabled</option>
                    <option>Show all</option>
                </select>
            </div> -->
        </div>
    </header> <!-- card-header end// -->
    <div class="card-body">
        <?php foreach ($products as $product): ?>
            <article class="itemlist">
                <div class="row align-items-center">
                    <div class="col-lg-4 col-sm-4 col-8 flex-grow-1 col-name">
                        <a class="itemside" href="#">
                            <div class="left">
                                <img src="<?= base_url() ?>/backend/imgs/items/1.jpg" class="img-sm img-thumbnail" alt="Item">
                            </div>
                            <div class="info">
                                <h6 class="mb-0"><?= $product->name ?></h6>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-2 col-sm-2 col-4 col-price"> <span><?= "Rp. ". number_format($product->sell_price) ?></span> </div>
                    <div class="col-lg-2 col-sm-2 col-4 col-status">
                        <span class="badge rounded-pill alert-success">Active</span>
                    </div>
                    <div class="col-lg-1 col-sm-2 col-4 col-date">
                        <span><?= $product->updated_at ?></span>
                    </div>
                    <div class="col-lg-2 col-sm-2 col-4 col-action text-end">
                        <a href="#" class="btn btn-sm font-sm rounded btn-brand">
                            <i class="material-icons md-edit"></i> Edit
                        </a>
                        <a href="#" class="btn btn-sm font-sm btn-light rounded">
                            <i class="material-icons md-delete_forever"></i> Delete
                        </a>
                    </div>
                </div> <!-- row .// -->
            </article>
        <?php endforeach ?>
    </div> <!-- card-body end// -->
</div> <!-- card end// -->
<div class="pagination-area mt-30 mb-50">
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-start">
            <?= $pager->links('products', 'product_pagination'); ?>
            <!-- <li class="page-item active"><a class="page-link" href="#">01</a></li>
            <li class="page-item"><a class="page-link" href="#">02</a></li>
            <li class="page-item"><a class="page-link" href="#">03</a></li>
            <li class="page-item"><a class="page-link dot" href="#">...</a></li>
            <li class="page-item"><a class="page-link" href="#">16</a></li>
            <li class="page-item"><a class="page-link" href="#"><i class="material-icons md-chevron_right"></i></a></li> -->

        </ul>
    </nav>
</div>
<?php $this->endSection() ?>