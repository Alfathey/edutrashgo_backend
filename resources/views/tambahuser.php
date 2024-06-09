<?php
include('./template/head.php');
?>

<div class="container py-5">
  <h2>Tambah Data User</h2>
  <form class="mt-4" method="POST">
    <div class="mb-3">
      <label for="name" class="form-label">Nama</label>
      <input name="name" type="text" class="form-control" id="name" />
    </div>
    <div class="mb-3">
      <label for="email" class="form-label">Email</label>
      <input name="email" type="email" class="form-control" id="email" />
    </div>
    <div class="mb-3">
      <label for="password" class="form-label">Password</label>
      <input
        name="password"
        type="password"
        class="form-control"
        id="password"
      />
    </div>
    <button type="submit" class="btn btn-success">Simpan</button>
  </form>
</div>

<?php
include('./template/foot.php');
?>