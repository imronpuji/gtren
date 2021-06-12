<?php $this->extend('dashboard') ?>

<?php $this->section('content') ?>
<div class="row">
    <div class="col-9">
        <div class="content-header">
            <h2 class="content-title">Tambah Produk</h2>
            <div>
                <button class="btn btn-light rounded font-sm mr-5 text-body hover-up">Save to draft</button>
                <button class="btn btn-md rounded font-sm hover-up">Publich</button>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card mb-4">
            <div class="card-header">
                <h4>Basic</h4>
            </div>
            <div class="card-body">
                <form>
                    <div class="mb-4">
                        <label for="product_name" class="form-label">Nama Produk</label>
                        <input type="text" placeholder="Type here" class="form-control" id="product_name">
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Deskripsi</label>
                        <textarea placeholder="Type here" class="form-control" rows="4"></textarea>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-4">
                                <label class="form-label">Harga Pokok</label>
                                <div class="row gx-2">
                                    <input placeholder="$" type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-4">
                                <label class="form-label">Harga Jual</label>
                                <input placeholder="$" type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-4">
                                <label class="form-label">Komisi Affiliate</label>
                                <input type="text" placeholder="%" class="form-control" id="product_name">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-4">
                                <label class="form-label">Komisi Stokis</label>
                                <input type="text" placeholder="%" class="form-control" id="product_name">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div> <!-- card end// -->
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
                    <input class="form-control" type="file">
                </div>
            </div>
        </div> <!-- card end// -->
        <div class="card mb-4">
            <div class="card-header">
                <h4>Kategori</h4>
            </div>
            <div class="card-body">
                    <div class="mb-4">
                        <label class="form-label">Kategori</label>
                        <select class="form-select">
                            <option> Automobiles </option>
                            <option> Home items </option>
                            <option> Electronics </option>
                            <option> Smartphones </option>
                            <option> Sport items </option>
                            <option> Baby and Tous </option>
                        </select>
                    </div>
                </div> <!-- row.// -->
            </div>
        </div> <!-- card end// -->
    </div>
</div>
<?php $this->endSection() ?>
