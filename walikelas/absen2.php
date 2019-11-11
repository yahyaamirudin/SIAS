<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php
    $siswa = ['Ali','Bejo','Cakra'];
    $jml_siswa = count($siswa);
    ?>
    <form action="" method="post">
    <?php
        $absen = ['H','S','I','A'];

        foreach ($siswa as $key => $i) {
            echo $i . " : ";
            foreach ($absen as $key => $v) {
                ?>
                <input type="radio" name="ket<?= $i ?>" value="<?= $v ?>"> <?= $v ?>
                <?php
            }
            echo "<br>";
        }
    ?>
    <button type="submit" name="sb">SUbmit</button>
    </form>
    <?php
    if (isset($_POST['sb'])) {
        $ket = [];

        foreach ($siswa as $key => $vs) {
            $ket[$vs] = $_POST['ket'.$vs];
        }
        print_r($ket);
    }
    ?>
</body>
</html>


 <!-- <td><?php echo $no++; ?></td>
                    <td><?php echo $data['ID_Kelas']; ?></td>
                     <td><?php echo $data['NIS']; ?></td>
                    <td><?php echo $data['Nama']; ?></td> -->