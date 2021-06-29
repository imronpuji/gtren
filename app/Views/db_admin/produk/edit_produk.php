<?php $this->extend('dashboard') ?>

<?php $this->section('content') ?>
<form action="<?= base_url('/updateproduk') ?>/<?= $product->id ?>" method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="col-9">
            <div class="content-header">
                <h2 class="content-title">Edit Produk</h2>
                <div>
                    <button class="btn btn-light rounded font-sm mr-5 text-body hover-up">Save to draft</button>
                    <button type="submit" class="btn btn-md rounded font-sm hover-up">Publich</button>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <?php if (! empty($errors)) : ?>
                <div class="alert bg-danger text-white">
                <?php foreach ($errors as $field => $error) : ?>
                    <p><?= $error ?></p>
                <?php endforeach ?>
                </div>
            <?php endif ?>
            <div class="card mb-4">
                <div class="card-header">
                    <h4>Produk</h4>
                </div>
                <div class="card-body">
                    <div class="mb-4">
                        <label for="product_name" class="form-label">Nama Produk</label>
                        <input name="name" type="text" placeholder="Type here" class="form-control" id="product_name" value="<?= $product->name ?>">
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Deskripsi</label>
                        <textarea name="description" placeholder="Type here" class="form-control" rows="4"><?= $product->description ?></textarea>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-4">
                                <label class="form-label">Harga Pokok</label>
                                <div class="row gx-2">
                                    <input name="fixed_price" placeholder="$" type="text" class="form-control" value="<?= $product->fixed_price ?>">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-4">
                                <label class="form-label">Harga Jual</label>
                                <input name="sell_price" placeholder="$" type="text" class="form-control" value="<?= $product->sell_price ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-4">
                                <label class="form-label">Komisi Affiliate</label>
                                <input name="affiliate_commission" type="text" placeholder="%" class="form-control" id="product_name" value="<?= $product->affiliate_commission ?>">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-4">
                                <label class="form-label">Komisi Stokis</label>
                                <input name="stockist_commission" type="text" placeholder="%" class="form-control" id="product_name" value="<?= $product->stockist_commission ?>">
                            </div>
                        </div>
                    </div>
                </div>
            </div> 

            <div class="card mb-4">
                <div class="card-header">
                    <h4>Gambar</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <?php for($i = 0; $i < count($product->photos); $i++): ?>
                            <div class="col-lg-6 col-md-12 mb-4 mb-lg-0">
                                <a class="d-inline btn-sm btn-primary" href="<?= base_url('/products/delete_photo')?>/<?= $product->id ?>/<?= $i ?>">Hapus</a>             
                                <img
                                  src="<?= base_url('uploads/product_photos')?>/<?= $product->photos[$i] ?>"
                                  class="w-100 shadow-1-strong mb-4"
                                  alt="jkkj"
                                />
                            </div>
                        <?php  endfor; ?>
                    </div>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header">
                    <h4>Kategori</h4>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        <?php for($i = 0; $i < count($product_categories); $i++): ?>
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                <div class="ms-2 me-auto">
                                  <div class="fw-bold"><?= $product_categories[$i]->category ?></div>
                                </div>
                                <a class="d-inline btn btn-sm btn-light" href="<?= base_url('/products/delete_category')?>/<?= $product->id ?>/<?= $i ?>">Hapus</a>             
                            </li>
                        <?php endfor; ?>
                    </ul>
                </div>
            </div> 


            <!-- card end// -->
            <!-- <div class="card mb-4">
                <div class="card-header">
                    <h4>Shipping</h4>
                </div>
                <div class="card-body">
                    <form>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-4">
                                    <label for="product_name" class="form-label">Width</label>
                                    <input type="text" placeholder="inch" class="form-control" id="product_name">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-4">
                                    <label for="product_name" class="form-label">Height</label>
                                    <input type="text" placeholder="inch" class="form-control" id="product_name">
                                </div>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label for="product_name" class="form-label">Weight</label>
                            <input type="text" placeholder="gam" class="form-control" id="product_name">
                        </div>
                        <div class="mb-4">
                            <label for="product_name" class="form-label">Shipping fees</label>
                            <input type="text" placeholder="$" class="form-control" id="product_name">
                        </div>
                    </form>
                </div>
            </div> --> <!-- card end// -->
        </div>
        <div class="col-lg-3">
            <div class="card mb-4">
                <div class="card-header">
                    <h4>Media</h4>
                </div>
                <div class="card-body">
                    <div class="input-upload">
                        <img src="<?= base_url() ?>/backend/imgs/theme/upload.svg" alt="">
                        <input name="file[]" class="form-control" type="file" id="file" multiple>
                    </div>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header">
                    <h4>Kategori</h4>
                </div>
                <div class="card-body h-100">
                        <?php foreach ($categories as $category): ?>
    
                            <div class="custom-control custom-radio">
                              <input type="checkbox" id="customRadio1" name="category[]" value="<?= $category->id ?>" class="custom-control-input">
                              <label class="custom-control-label" for="customRadio1"><?= $category->category ?></label>
                            </div>

                        <?php endforeach ?>
                </div>
            </div>  <!-- card end// -->
            <!--  --> <!-- card end// -->
        </div>
    </div>
</form>

<?php $this->endSection() ?>
