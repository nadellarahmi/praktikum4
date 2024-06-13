<?php
include "database/connection.php";

// Mengaktifkan mode pengecualian untuk koneksi MySQLi
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
?>
<div class="row">
    <div class="col">
        <h3>Karyawan</h3>
    </div>
    <div class="col">
        <a href="?page=karyawantambah" class="btn btn-success float-end">
            <i class="fa fa-plus-circle"></i>
            Tambah
        </a>
    </div>
</div>
<div class="row mt-3">
    <div class="col">
    <?php
        try {
            $selectSQL = "SELECT K.*, B.nama AS nama_bagian FROM karyawan K LEFT JOIN bagian B ON K.bagian_id = B.id";
            $result = mysqli_query($connection, $selectSQL);

            if (mysqli_num_rows($result) == 0) {
                ?>
                <div class="alert alert-light" role="alert">
                    Data Kosong
                </div>
                <?php
            } else {
                ?>
                <table class="table bg-white rounded shadow-sm table-hover">
                    <thead>
                        <tr>
                            <th scope="col" width="50">NIK</th>
                            <th scope="col">Nama Karyawan</th>
                            <th scope="col">Bagian</th>
                            <th scope="col" width="200">Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                            <tr class="align-middle">
                                <th scope="row"><?php echo $row["nik"] ?></th>
                                <td><?php echo $row["nama"] ?></td>
                                <td><?php echo $row["nama_bagian"] ?></td>
                                <td>
                                    <a href="?page=karyawanubah&nik=<?php echo $row["nik"] ?>" class="btn btn-primary">
                                        <i class="fa fa-edit"></i>
                                        Ubah
                                    </a>
                                    <a href="?page=karyawanhapus&nik=<?php echo $row["nik"] ?>"
                                       onclick="javascript: return confirm('Konfirmasi data akan dihapus?');"
                                       class="btn btn-danger">
                                        <i class="fa fa-trash"></i>
                                        Hapus
                                    </a>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
                <?php
            }
        } catch (Exception $e) {
            ?>
            <div class="alert alert-danger" role="alert">
                Error: <?php echo $e->getMessage(); ?>
            </div>
            <?php
        }
    ?>
    </div>
</div>
