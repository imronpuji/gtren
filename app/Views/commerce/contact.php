<?= $this->extend('commerce/templates/index') ?>
<?= $this->section('content') ?>
<div class="page-header breadcrumb-wrap">
    <div class="container">
        <div class="breadcrumb">
            <a href="index.html" rel="nofollow">Home</a>
            <span></span> Pages
            <span></span> Contact us
        </div>
    </div>
</div>
<section class="hero-2">
    <div class="hero-content">
        <div class="container">
            <div class="text-center">
                <h4 class="text-brand mb-20">Get in touch</h4>
                <h1 class="mb-30 wow fadeIn animated font-xxl fw-900">
                    Let's Talk About <br>Your <span class="text-style-1">Idea</span>
                </h1>
                <p class="w-50 m-auto mb-50 wow fadeIn animated">Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum quam eius placeat, a quidem mollitia at accusantium reprehenderit pariatur provident nam ratione incidunt magnam sequi.</p>
                <p class="wow fadeIn animated">
                    <a class="btn btn-brand btn-lg font-weight-bold text-white border-radius-5 btn-shadow-brand hover-up" href="page-about.html">About Us</a>
                    <a class="btn btn-outline btn-lg btn-brand-outline font-weight-bold text-brand bg-white text-hover-white ml-15 border-radius-5 btn-shadow-brand hover-up">Support Center</a>
                </p>
            </div>
        </div>
    </div>
</section>
<section class="section-border pt-50 pb-50">
    <div class="container">
        <div id='map-panes' class="leaflet-map mb-50"></div>
        <div class="row">
            <div class="col-md-4 mb-4 mb-md-0">
                <h4 class="mb-15 text-muted">Wowy Office</h4>
                205 North Michigan Avenue, Suite 810<br>
                Chicago, 60601, USA<br>
                <abbr title="Phone">Phone:</abbr> (123) 456-7890<br>
                <abbr title="Email">Email: </abbr>contact@Wowy.com<br>
                <a class="btn btn-outline btn-sm btn-brand-outline font-weight-bold text-brand bg-white text-hover-white mt-20 border-radius-5 btn-shadow-brand hover-up"><i class="fa fa-map text-muted mr-15"></i>View map</a>
            </div>
            <div class="col-md-4 mb-4 mb-md-0">
                <h4 class="mb-15 text-muted">Wowy Studio</h4>
                205 North Michigan Avenue, Suite 810<br>
                Chicago, 60601, USA<br>
                <abbr title="Phone">Phone:</abbr> (123) 456-7890<br>
                <abbr title="Email">Email: </abbr>contact@Wowy.com<br>
                <a class="btn btn-outline btn-sm btn-brand-outline font-weight-bold text-brand bg-white text-hover-white mt-20 border-radius-5 btn-shadow-brand hover-up"><i class="fa fa-map text-muted mr-15"></i>View map</a>
            </div>
            <div class="col-md-4">
                <h4 class="mb-15 text-muted">Wowy Shop</h4>
                205 North Michigan Avenue, Suite 810<br>
                Chicago, 60601, USA<br>
                <abbr title="Phone">Phone:</abbr> (123) 456-7890<br>
                <abbr title="Email">Email: </abbr>contact@Wowy.com<br>
                <a class="btn btn-outline btn-sm btn-brand-outline font-weight-bold text-brand bg-white text-hover-white mt-20 border-radius-5 btn-shadow-brand hover-up"> <i class="fa fa-map text-muted mr-15"></i> View map</a>
            </div>
        </div>
    </div>
</section>
<section class="mt-50 pt-50 pb-50">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-lg-10 m-auto">
                <div class="contact-from-area  padding-20-row-col wow tmFadeInUp">
                    <h3 class="mb-10 text-center">Drop Us a Line</h3>
                    <p class="text-muted mb-30 text-center font-sm">Lorem ipsum dolor sit amet consectetur.</p>
                    <form class="contact-form-style text-center" id="contact-form" action="#" method="post">
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="input-style mb-20">
                                    <input name="name" placeholder="First Name" type="text">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="input-style mb-20">
                                    <input name="email" placeholder="Your Email" type="email">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="input-style mb-20">
                                    <input name="telephone" placeholder="Your Phone" type="tel">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="input-style mb-20">
                                    <input name="subject" placeholder="Subject" type="text">
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="textarea-style mb-30">
                                    <textarea name="message" placeholder="Message"></textarea>
                                </div>
                                <button class="submit submit-auto-width" type="submit">Send message</button>
                            </div>
                        </div>
                    </form>
                    <p class="form-messege"></p>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>