<div class="container">
    <form action="<?= base_url('register_proses') ?>" method="post">
    <?php if (isset($_GET['ref'])): ?>
        <input type="hidden" name="ref" value="<?= $_GET['ref'] ?>">
    <?php else: ?>
        <input type="hidden" name="ref" value="">
    <?php endif; ?>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Nama</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="nama">
        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
    </div>
    <button type="submit" class="btn btn-primary" name="button">Submit</button>
</form>
</div>
