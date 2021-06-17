<?php $this->extend('dashboard') ?>
<?php $this->section('content') ?>
<div class="content-header">
    <div>
        <h2 class="content-title card-title">Categories </h2>
        <p>Add, edit or delete a category</p>
    </div>
    <div>
        <input required type="text" placeholder="Search Categories" class="form-control bg-white">
    </div>
</div>
<div class="card">
    <div class="card-body">

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

        <div class="row">
            <div class="col-md-3">
                <?php if (isset($category)): ?>
                    <form action="<?= base_url('category/update/'.$category->id) ?>" method="post">
                        <div class="mb-4">
                            <label for="category" class="form-label">Category</label>
                            <input required type="text" placeholder="Type here" class="form-control" name="category" id="category" value="<?= $category->category ?>" />
                        </div>
                        <div class="d-grid">
                            <button class="btn btn-primary" type="submit">Update category</button>
                        </div>
                    </form>
                <?php else: ?>
                    <form action="<?= base_url('category/save') ?>" method="post">
                        <div class="mb-4">
                            <label for="category" class="form-label">Category</label>
                            <input required type="text" placeholder="Type here" name="category" class="form-control" id="category" />
                        </div>
                        <div class="d-grid">
                            <button class="btn btn-primary" type="submit">Save category</button>
                        </div>
                    </form>       
                <?php endif ?>               
            </div>
            <div class="col-md-9">
                <div class="table-responsive">
                    <?php if (isset($category)): ?>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><b><?= $category->category ?></b></td>
                                    <td>
                                        <a href="<?= base_url('category/edit/'.$category->id) ?>">
                                            <button class="btn btn-primary rounded">
                                                <i class="material-icons md-edit"></i>
                                                Edit
                                            </button>
                                        </a>
                                        <a href="<?= base_url('category/delete/'.$category->id) ?>">
                                            <button class="btn rounded">
                                                <i class="material-icons md-delete"></i>
                                                Hapus
                                            </button>
                                        </a>
                                    </td>
                                </tr>
                                    
                            </tbody>
                        </table>
                    <?php else: ?>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($categories as $category): ?>
                                    
                                <tr>
                                    <td><b><?= $category->category ?></b></td>
                                    <td>
                                        <a href="<?= base_url('category/edit/'.$category->id) ?>">
                                            <button class="btn btn-primary rounded">
                                                <i class="material-icons md-edit"></i>
                                                Edit
                                            </button>
                                        </a>
                                        <a href="<?= base_url('category/delete/'.$category->id) ?>">
                                            <button class="btn border rounded">
                                                <i class="material-icons md-delete"></i>
                                                Hapus
                                            </button>
                                        </a>
                                    </td>
                                </tr>
                                <?php endforeach ?>
                                    
                            </tbody>
                        </table>
                    <?php endif ?>
                </div>
            </div> <!-- .col// -->
        </div> <!-- .row // -->
    </div> <!-- card body .// -->
</div> <!-- card .// -->

<?php $this->endSection() ?>