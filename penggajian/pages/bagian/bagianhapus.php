<div id="top" class="row mb-3">
    <div class="col">
        <h3>Hapus Data Bagian</h3>
    </div>
    <div class="col">
        <a href="?page=bagian" class="btn btn-primary float-end">
            <i class="fa fa-arrow-circle-left"></i>
            Kembali
        </a>
    </div>
</div>
<div id="pesan" class="row mb-3">
    <div class="col">
        <?php
        include "database/connection.php"; // Include the database connection file

        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            $sql = "DELETE FROM bagian WHERE id = $id";
            $result = mysqli_query($connection, $sql);

            if ($result) {
                ?>
                <div class="alert alert-success" role="alert">
                    <i class="fa fa-check-circle"></i>
                    Data bagian berhasil dihapus
                </div>
                <?php
            } else {
                ?>
                <div class="alert alert-danger" role="alert">
                    <i class="fa fa-exclamation-circle"></i>
                    Terjadi kesalahan: <?php echo mysqli_error($connection); ?>
                </div>
                <?php
            }
        } else {
            ?>
            <div class="alert alert-danger" role="alert">
                <i class="fa fa-exclamation-circle"></i>
                ID tidak ditemukan
            </div>
            <?php
        }
        ?>
        <meta http-equiv="refresh" content="2;url=?page=bagian">
    </div>
</div>
