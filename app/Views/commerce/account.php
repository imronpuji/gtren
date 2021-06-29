<?= $this->extend('commerce/templates/index') ?>
<?= $this->section('content') ?>
<section class="pt-50 pb-150">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 ">
                <div class="row">
                    <div class="col-md-4">
                        <div class="dashboard-menu">
                            <ul class="nav flex-column" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link <?= ($segments[0] == "account" ? "active" : null) ?>" id="dashboard-tab" href="<?= base_url('account') ?>" role="tab" aria-controls="dashboard" aria-selected="false"><i class="fa fa-atom mr-15"></i>Dashboard</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link <?= ($segments[0] == "orders" ? "active" : null) ?>" id="orders-tab" href="<?= base_url('orders') ?>"><i class="fa fa-shopping-basket mr-15"></i>Orders</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link <?= ($segments[0] == "tracking" ? "active" : null) ?>" id="track-orders-tab" href="<?= base_url('tracking') ?>" role="tab" aria-controls="track-orders" aria-selected="false"><i class="fa fa-paper-plane mr-15"></i>Track Your Order</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link <?= ($segments[0] == "address" ? "active" : null) ?>" id="address-tab" href="<?= base_url('address') ?>" role="tab" aria-controls="address" aria-selected="true"><i class="fa fa-map-marked mr-15"></i>My Address</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link <?= ($segments[0] == "profile" ? "active" : null) ?>" id="account-detail-tab" href="<?= base_url('profile') ?>" role="tab" aria-controls="account-detail" aria-selected="true"><i class="fa fa-user-edit mr-15"></i>Account details</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link <?= ($segments[0] == "upgrade" ? "active" : null) ?>" id="upgrade-tab" href="<?= base_url('upgrade') ?>" role="tab" aria-controls="upgrade" aria-selected="true"><i class="fa fa-upload mr-15"></i>Upgrade Akun</a>
                                </li>
                                <li class="nav-item bg-danger">
                                    <a class="nav-link text-white" href="/logout"><i class="text-white fa fa-lock mr-15"></i>Logout</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="tab-content dashboard-content">
                            <?php if($segments[0] == "orders"): ?>
                                <div class="tab-pane fade active show" id="orders" role="tabpanel" aria-labelledby="orders-tab">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="mb-0">Your Orders</h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>Order</th>
                                                            <th>Date</th>
                                                            <th>Status</th>
                                                            <th>Total</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>#1357</td>
                                                            <td>March 45, 2020</td>
                                                            <td>Processing</td>
                                                            <td>$125.00 for 2 item</td>
                                                            <td><a href="#" class="btn-small d-block">View</a></td>
                                                        </tr>
                                                        <tr>
                                                            <td>#2468</td>
                                                            <td>June 29, 2020</td>
                                                            <td>Completed</td>
                                                            <td>$364.00 for 5 item</td>
                                                            <td><a href="#" class="btn-small d-block">View</a></td>
                                                        </tr>
                                                        <tr>
                                                            <td>#2366</td>
                                                            <td>August 02, 2020</td>
                                                            <td>Completed</td>
                                                            <td>$280.00 for 3 item</td>
                                                            <td><a href="#" class="btn-small d-block">View</a></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php elseif($segments[0] == "tracking"): ?>
                                <div class="tab-pane fade active show" id="track-orders" role="tabpanel" aria-labelledby="track-orders-tab">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="mb-0">Orders tracking</h5>
                                        </div>
                                        <div class="card-body contact-from-area">
                                            <?php if(!empty(session()->getFlashdata('success'))){ ?>

                                                <div class="alert alert-success bg-success text-white">
                                                    <?php echo session()->getFlashdata('success');?>
                                                </div>

                                            <?php } ?>
                                            <p>To track your order please enter your OrderID in the box below and press "Track" button. This was given to you on your receipt and in the confirmation email you should have received.</p>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <form class="contact-form-style mt-30 mb-50" action="<?php base_url() ?>/track" method="post">

                                                            <div class="input-style mb-20">
                                                                 <label class="form-label">Kurir</label>
                                                                <select class="form-select" name="courier">
                                                                    <?php foreach ($couries as $courier): ?>
                                                                        <option value="<?= $courier['code'] ?>">
                                                                            <?= $courier['description'] ?>
                
                                                                        </option>
                                                                    <?php endforeach ?>
                                                                </select>
                                                            </div>

                                                        <div class="input-style mb-20">
                                                            <label>Nomor Resi</label>
                                                            <input name="awb" placeholder="Found in your order confirmation email" type="text" class="square">
                                                        </div>
                                                        <button class="btn-sm submit submit-auto-width" type="submit"><i class="fa fa-paper-plane mr-15"></i>Track</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php elseif($segments[0] == "address"): ?>
                                <div class="tab-pane fade active show" id="address" role="tabpanel" aria-labelledby="address-tab">
                                    <div class="row mb-3">
                                        <div class="col-lg-12">
                                            <button class="btn btn-primary btn-sm">Tambah Alamat</button>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="card mb-3 mb-lg-0">
                                                <div class="card-header">
                                                    <h5 class="mb-0">Billing Address</h5>
                                                </div>
                                                <div class="card-body">
                                                    <address>3522 Interstate<br> 75 Business Spur,<br> Sault Ste. <br>Marie, MI 49783</address>
                                                    <p>New York</p>
                                                    <a href="#" class="btn-small">Edit</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h5 class="mb-0">Shipping Address</h5>
                                                </div>
                                                <div class="card-body">
                                                    <address>4299 Express Lane<br>
                                                        Sarasota, <br>FL 34249 USA <br>Phone: 1.941.227.4444</address>
                                                    <p>Sarasota</p>
                                                    <a href="#" class="btn-small">Edit</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php elseif($segments[0] == "profile"): ?>
                                <div class="tab-pane fade active show" id="account-detail" role="tabpanel" aria-labelledby="account-detail-tab">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>Account Details</h5>
                                        </div>
                                        <div class="card-body">
                                            <p>Already have an account? <a href="page-login-register.html">Log in instead!</a></p>
                                            <form method="post" name="enq">
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label>First Name <span class="required">*</span></label>
                                                        <input required="" class="form-control square" name="name" type="text">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>Last Name <span class="required">*</span></label>
                                                        <input required="" class="form-control square" name="phone">
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label>Display Name <span class="required">*</span></label>
                                                        <input required="" class="form-control square" name="dname" type="text">
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label>Email Address <span class="required">*</span></label>
                                                        <input required="" class="form-control square" name="email" type="email">
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label>Current Password <span class="required">*</span></label>
                                                        <input required="" class="form-control square" name="password" type="password">
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label>New Password <span class="required">*</span></label>
                                                        <input required="" class="form-control square" name="npassword" type="password">
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label>Confirm Password <span class="required">*</span></label>
                                                        <input required="" class="form-control square" name="cpassword" type="password">
                                                    </div>
                                                    <div class="col-md-12">
                                                        <button type="submit" class="btn btn-fill-out submit" name="submit" value="Submit">Save</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            <?php elseif($segments[0] == "upgrade"): ?>
                                <div class="tab-pane fade active show" id="upgrade" role="tabpanel" aria-labelledby="upgrade-tab">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>Upgrade Akun</h5>
                                        </div>
                                        <div class="card-body">
                                            <p class="pb-5 mb-20">
                                                Silahkan masukkan kode untuk mengupgrade akun anda menjadi stokis
                                            </p>
                                            <?php if(!empty(session()->getFlashdata('success'))): ?>

                                                <div class="alert alert-success bg-success text-white">
                                                    <?php echo session()->getFlashdata('success');?>
                                                </div>

                                            <?php else : ?>
                                                <div class="alert alert-warning bg-warning">
                                                    <i class="fa fa-exclamation-triangle"></i> Kode hanya bisa didapatkan dari Admin Gtren.
                                                </div>
                                            <?php endif ?>
                                            <form method="post">
                                                <div class="form-group col-md-12">
                                                    <label>Kode <span class="required">*</span></label>
                                                    <input required class="form-control square" name="code" type="text">
                                                </div>
                                                <div class="mb-3 form-check">
                                                    <input type="checkbox" required class="form-check-input" id="exampleCheck1">
                                                    <label class="form-check-label" for="exampleCheck1">Saya benar telah mendapatkan kode dari admin</label>
                                                  </div>
                                                <div class="col-md-12">
                                                    <button type="submit" class="btn btn-sm btn-fill-out submit" name="submit" value="Submit">
                                                        <i class="fa fa-upload"></i> Upgrade
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            <?php elseif($segments[0] == "account"): ?>
                                <div class="tab-pane fade active show" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="mb-0"><?= greeting(user()->username) ?> </h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="text-center">
                                                <img src="<?= base_url() ?>/frontend/imgs/page/avatar-1.jpg" class="img-fluid rounded-circle w-25">
                                                <h3><?= user()->fullname ?></h3>
                                                <p>
                                                    <?php foreach (user()->getRoles() as $role): ?>
                                                        <?= $role ?>
                                                    <?php endforeach ?>
                                                </p>

                                            </div>
                                            <div class="row my-3">
                                                <div class="col-lg-6">
                                                    <div class="card bg-primary">
                                                        <div class="card-body">
                                                            <h2 class="text-white">35</h2>
                                                            <p class="text-white">Total Orders</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="card bg-danger">
                                                        <div class="card-body">
                                                            <h2 class="text-white">35</h2>
                                                            <p class="text-white">Total Orders</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endif ?>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection()  ?>