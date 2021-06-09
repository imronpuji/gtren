<div class="container">
    <form action="<?= base_url('register_proses') ?>" method="post">
    <?php if (isset($_GET['ref'])): ?>
        <input type="hidden" name="ref" value="<?= $_GET['ref'] ?>">
    <?php else: ?>
        <input type="hidden" name="ref" value="">
    <?php endif; ?>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Nama</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="nama"><br>
         <label for="exampleInputEmail1" class="form-label">Phone</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="phone"><br>
         <label for="exampleInputEmail1" class="form-label">Email</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email"><br>
         <label for="exampleInputEmail1" class="form-label">Alamat</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="alamat">

    </div>
    <button type="submit" class="btn btn-primary" name="button">Submit</button>
</form>
</div>
