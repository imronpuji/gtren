  <?= $this->extend('commerce/templates/index') ?>
  <?= $this->section('content') ?>
  <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="index.html" rel="nofollow">Home</a>
                    <span></span> Pages
                    <span></span> Login / Register
                </div>
            </div>
        </div>
        <section class="pt-150 pb-150">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 m-auto">
                        <div class="row">
                            <div class="col-lg-5">
                               <?= view('Myth\Auth\Views\_message_block') ?>
                                <div class="login_wrap widget-taber-content p-30 background-white border-radius-10">
                                    <div class="padding_eight_all bg-white">
                                        <div class="heading_s1">
                                            <h3 class="mb-30">Login</h3>
                                        </div>

                                        <!-- form login -->
                                        <form method="post" action="<?= route_to('login') ?>">
                                            <!-- <?= csrf_field()?>
 -->
                                            <!-- email -->
    <!--                                         <div class="form-group">
                                                <input type="email" required="" name="login" placeholder="Your Email"  class="<?php if(session('errors.login')) : ?>is-invalid<?php endif ?>">
                                                <div class="invalid-feedback">
                                                    <?= session('errors.login') ?>
                                                </div>
                                            </div> -->
                                            <!-- <div class="form-group">
                                                <input type="text" class="form-control <?php if(session('errors.login')) : ?>is-invalid<?php endif ?>"
                                                       name="login" placeholder="<?=lang('Auth.emailOrUsername')?>">
                                                <div class="invalid-feedback">
                                                    <?= session('errors.login') ?>
                                                </div>
                                            </div> -->

                                            <!-- password -->
                                            <!-- <div class="form-group">
                                                <input required="" class="<?php if(session('errors.login')) : ?>is-invalid<?php endif ?>" type="password" name="password" placeholder="Password">
                                                <div class="invalid-feedback">
                                                    <?= session('errors.password') ?>
                                                </div>
                                            </div> -->

                                           <!--  <div class="login_footer form-group">
                                                <div class="chek-form">
                                                    <div class="custome-checkbox">
                                                        <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox1" value="">
                                                        <label class="form-check-label" for="exampleCheckbox1"><span>Remember me</span></label>
                                                    </div>
                                                </div>
                                                <a class="text-muted" href="#">Forgot password?</a>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-fill-out btn-block hover-up" name="login">Log in</button>
                                            </div> -->


                                            <?php if ($config->validFields === ['email']): ?>
                                                <div class="form-group">
                                                    <label for="login"><?=lang('Auth.email')?></label>
                                                    <input type="email" class="form-control <?php if(session('errors.login')) : ?>is-invalid<?php endif ?>"
                                                           name="login" placeholder="<?=lang('Auth.email')?>">
                                                    <div class="invalid-feedback">
                                                        <?= session('errors.login') ?>
                                                    </div>
                                                </div>
                                            <?php else: ?>
                                                <div class="form-group">
                                                    <label for="login"><?=lang('Auth.emailOrUsername')?></label>
                                                    <input type="text" class="form-control <?php if(session('errors.login')) : ?>is-invalid<?php endif ?>"
                                                           name="login" placeholder="<?=lang('Auth.emailOrUsername')?>">
                                                    <div class="invalid-feedback">
                                                        <?= session('errors.login') ?>
                                                    </div>
                                                </div>
                                            <?php endif; ?>

                                                <div class="form-group">
                                                    <label for="password"><?=lang('Auth.password')?></label>
                                                    <input type="password" name="password" class="form-control  <?php if(session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?=lang('Auth.password')?>">
                                                    <div class="invalid-feedback">
                                                        <?= session('errors.password') ?>
                                                    </div>
                                                </div>

                                            <?php if ($config->allowRemembering): ?>
                                                                    <div class="form-check">
                                                                        <label class="form-check-label">
                                                                            <input type="checkbox" name="remember" class="form-check-input" <?php if(old('remember')) : ?> checked <?php endif ?>>
                                                                            <?=lang('Auth.rememberMe')?>
                                                                        </label>
                                                                    </div>
                                            <?php endif; ?>

                                                                    <br>

                                                                    <button type="submit" class="btn btn-primary btn-block"><?=lang('Auth.loginAction')?></button>

                                        </form>
                                        <!-- form login end -->

                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-1"></div>
                            
                            <div class="col-lg-6">
                                <div class="login_wrap widget-taber-content p-30 background-white border-radius-5">
                                    <div class="padding_eight_all bg-white">
                                        <?= view('Myth\Auth\Views\_message_block') ?>
                                        <div class="heading_s1">
                                            <h3 class="mb-30">Create an Account</h3>
                                        </div>
                                        <p class="mb-50 font-sm">
                                            Your personal data will be used to support your experience throughout this website, to manage access to your account, and for other purposes described in our privacy policy
                                        </p>

                                        <!-- register -->

                                        <!-- <form method="post">
                                            <div class="form-group">
                                                <input type="text" required="" name="username" placeholder="Username">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" required="" name="email" placeholder="Email">
                                            </div>
                                            <div class="form-group">
                                                <input required="" type="password" name="password" placeholder="Password">
                                            </div>
                                            <div class="form-group">
                                                <input required="" type="password" name="password" placeholder="Confirm password">
                                            </div>
                                            <div class="login_footer form-group">
                                                <div class="chek-form">
                                                    <div class="custome-checkbox">
                                                        <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox12" value="">
                                                        <label class="form-check-label" for="exampleCheckbox12"><span>I agree to terms &amp; Policy.</span></label>
                                                    </div>
                                                </div>
                                                <a href="page-privacy-policy.html"> <i class="far fa-clone mr-5 text-muted"></i> Lean more</a>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-fill-out btn-block hover-up" name="login">Submit &amp; Register</button>
                                            </div>
                                        </form> -->

                                        <form action="<?= route_to('register') ?>" method="post">
                                            <?= csrf_field() ?>

                                            <div class="form-group">
                                                <label for="email"><?=lang('Auth.email')?></label>
                                                <input type="email" class="form-control <?php if(session('errors.email')) : ?>is-invalid<?php endif ?>"
                                                       name="email" aria-describedby="emailHelp" placeholder="<?=lang('Auth.email')?>" value="<?= old('email') ?>">
                                                <small id="emailHelp" class="form-text text-muted"><?=lang('Auth.weNeverShare')?></small>
                                            </div>

                                            <div class="form-group">
                                                <label for="username"><?=lang('Auth.username')?></label>
                                                <input type="text" class="form-control <?php if(session('errors.username')) : ?>is-invalid<?php endif ?>" name="username" placeholder="<?=lang('Auth.username')?>" value="<?= old('username') ?>">
                                            </div>

                                            <div class="form-group">
                                                <label for="password"><?=lang('Auth.password')?></label>
                                                <input type="password" name="password" class="form-control <?php if(session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?=lang('Auth.password')?>" autocomplete="off">
                                            </div>

                                            <div class="form-group">
                                                <label for="pass_confirm"><?=lang('Auth.repeatPassword')?></label>
                                                <input type="password" name="pass_confirm" class="form-control <?php if(session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" placeholder="<?=lang('Auth.repeatPassword')?>" autocomplete="off">
                                            </div>

                                            <br>

                                            <button type="submit" class="btn btn-primary btn-block"><?=lang('Auth.register')?></button>
                                        </form>


                                        <hr>

                                        <p><?=lang('Auth.alreadyRegistered')?> <a href="<?= route_to('login') ?>"><?=lang('Auth.signIn')?></a></p>

                                        <div class="divider-text-center mt-15 mb-15">
                                            <span> or</span>
                                        </div>
                                        <ul class="btn-login list_none text-center mb-15">
                                            <li><a href="#" class="btn btn-facebook hover-up"><i class="fab fa-facebook-f mr-10"></i>Facebook</a></li>
                                            <li><a href="#" class="btn btn-google hover-up"><i class="fab fa-google mr-10"></i>Google</a></li>
                                        </ul>
                                        <div class="text-muted text-center">Already have an account? <a href="#">Sign in now</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
<?= $this->endSection() ?>