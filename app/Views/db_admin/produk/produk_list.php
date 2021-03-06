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
            <div class="col-md-2 col-6">
                <input type="date" value="02.05.2021" class="form-control">
            </div>
            <div class="col-md-2 col-6">
                <select class="form-select">
                    <option selected>Status</option>
                    <option>Active</option>
                    <option>Disabled</option>
                    <option>Show all</option>
                </select>
            </div>
        </div>
    </header> <!-- card-header end// -->
    <div class="card-body">
        <?php foreach ($products as $product): ?>
            <article class="itemlist">
                <div class="row align-items-center">
                    <div class="col-lg-4 col-sm-4 col-8 flex-grow-1 col-name">
                        <a class="itemside" href="#">
                            <div class="left">
                                 <?php for($i = 0; $i < 1; $i++): ?>
                                    <img class="img-sm img-thumbnail" src="<?php base_url() ?>/uploads/product_photos/<?= $product->photos[$i] ?>" alt="">
                                <?php endfor ?>
                            </div>
                            <div class="info">
                                <h6 class="mb-0"><?= $product->name ?></h6>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-2 col-sm-2 col-4 col-price"> <span><?= "Rp. ". number_format($product->sell_price) ?></span> </div>
                     <div class="col-lg-2 col-sm-2 col-4 col-price"> <span><?= "Rp. ". number_format($product->fixed_price) ?></span> </div>
                    <div class="col-lg-2 col-sm-2 col-4 col-status">
                        <?php $categories = $product->getCategory($product->categories); ?>

                        <?php foreach($categories as $category): ?>
                            <a href="<?= base_url('product/category/'. strtolower($category->category) ) ?>">
                            <?= $category->category ?>
                            </a>
                        <?php endforeach ?>
                    </div>
                    <div class="col-lg-1 col-sm-2 col-4 col-date">
                        <span><?= $product->updated_at ?></span>
                    </div>
                    <div class="col-lg-2 col-sm-2 col-4 col-action text-end">
                        <div class="dropdown">
                            <a href="#" data-bs-toggle="dropdown" class="btn btn-light rounded btn-sm font-sm"> <i class="material-icons md-more_horiz"></i> </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="<?= base_url('products/edit/'.$product->id)  ?>">Edit info</a>
                                <a class="dropdown-item text-danger" href="<?= base_url('products/delete/'.$product->id)  ?>">Delete</a>
                            </div>
                        </div> 
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