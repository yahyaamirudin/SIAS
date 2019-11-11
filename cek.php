
<!-- // $data  = [
// 	["sunny", 'hot', 'high', 'false', 'no'],
// 	["sunny", 'hot', 'high', 'true', 'no'],
// 	["cloudy", 'hot', 'high', 'false', 'yes'],
// 	["rainy", 'mild', 'high', 'false', 'yes'],
// 	["rainy", 'cool', 'normal', 'false', 'yes'],
// 	["rainy", 'cool', 'normal', 'true', 'yes'],
// 	["cloudy", 'cool', 'normal', 'true', 'yes'],
// 	["sunny", 'mild', 'high', 'false', 'no'],
// 	["sunny", 'cool', 'normal', 'false', 'yes'],
// 	["rainy", 'mild', 'normal', 'false', 'yes'],
// 	["sunny", 'mild', 'normal', 'true', 'yes'],
// 	["cloudy", 'mild', 'high', 'true', 'yes'],
// 	["cloudy", 'hot', 'normal', 'false', 'yes'],
// 	["rainy", 'mild', 'high', 'true', 'no'],

// ];
// Nama Atribut data
// $attributes = [1 => "outlook", 2 => "temperature", 3 => "humadity", 4 => 'windy'];

// Import Algoritma 
// include("c45.php");

//Buat instance 

// $c45 = new C45;

// Set data dan atribut
// $c45->setData($data)->setAttributes($attributes);
// // Hitung menggunakan data training
// $c45->hitung();

// Uji Coba dengan menggunakan 1 data testing sebagai berikut:

// $data_testing = ['rainy', 'hot', 'high', 'false'];
// echo $c45->predictDataTesting($data_testing);
// Luaran diatas akan menghasilkan jawaban Yes

// Sedangkan untuk melihat rule yang dihasilkan dari data set yang telah diberikan ialah dengan menggunakan perintah sebagai berikut:
// $c45->printRules();
	// $data = [
	// 	["cindy",'77','66','88','77','66','lulus'],	
	// 	["rudi",'77','55','66','77','55','tidak'],
	// 	["sardi",'88','5','88','99','66','tidak'],
	// 	["cindy",'87','77','67','89','78','lulus'],
	// 	["rudi",'76','88','78','98','66','lulus'],
	// 	["sardi",'88','99','88','66','60','lulus'],
	// ];
	// $attributes =[1 =>"tugas1",2 => "tugas2",3 =>"UH",4=>"UTS",5=>"UAS",6=>"Nilaiakhir"];
	// include("id3.php");
	// $id3  = new id3 ;
	// $id3->setData($data)->setAttributes($attributes);
	// $id3->hitung();

	// $data_testing = ["cindy",'77','66','67','77','66'];
	// echo $id3->predictDataTesting($data_testing);
	// $id3->printRules() -->
    <!DOCTYPE html>
    <html>
    <head>
        <link rel="stylesheet" href="css/bootstrap.min.css" />
        <link rel="stylesheet" href="css/font-awesome.min.css" />
        <link rel="stylesheet" href="css/style.css" />
    </head>
    </html>
    <body>
        <?php include 'koneksi.php'; ?>

        <div class="container">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <h1 class="h1 text-center">ID3 Algorithm</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                </div>
                <div class="col-md-2"></div>
            </div>
           
            <br>

            <!-- menghitung siswa lulu dan tidak -->
            <?php 
    
            $siswa      = "SELECT COUNT(Nilai_Akhir) as jumlah from nilai_siswa";
            $datasis    = mysqli_query($konek,$siswa);
            $resultsis  = mysqli_fetch_array($datasis);
            echo "jumlah siswa ".$resultsis['jumlah'];
            echo "<br>";

            $lulus      = "SELECT COUNT(Nilai_Akhir) as jumlah from nilai_siswa where Nilai_Akhir>=75";
            $datalul    = mysqli_query($konek,$lulus);
            $resultlul  = mysqli_fetch_array($datalul);
            echo "jumlah siswa lulus ".$resultlul['jumlah'];
            echo "<br>";

            $gagal      = "SELECT COUNT(Nilai_Akhir) as jumlah from nilai_siswa where Nilai_Akhir<75";
            $datagag    = mysqli_query($konek,$gagal);
            $resultgag  = mysqli_fetch_array($datagag);
            echo "jumlah siswa gagal ".$resultgag['jumlah'];
            echo "<br>";
            echo "<hr>";


            // <!-- menghitung data total tabel nilai uas -->

            $uastotal  =  "SELECT COUNT(UAS) as jumlah FROM nilai_siswa";
            $duastot   = mysqli_query($konek,$uastotal);
            $resultot = mysqli_fetch_array($duastot); 
            echo "jumlah total uas ".$resultot['jumlah'];
            echo "<br>";

            // <!-- menghitung data total tabel nilai uts -->

            $utstotal  =  "SELECT COUNT(UTS) as jumlah FROM nilai_siswa";
            $dutstot   = mysqli_query($konek,$utstotal);
            $resultot2 = mysqli_fetch_array($dutstot); 
            echo "jumlah total uts ".$resultot2['jumlah'];
            echo "<br>";
            echo "<hr>";
            

            // <!-- menghitung data lulus dan gagal  tabel nilai uts -->
            
            $uts = "SELECT COUNT(UTS) as jumlah FROM nilai_siswa where UTS >=75";
            $duts   = mysqli_query($konek,$uts);
            $resultuts = mysqli_fetch_array($duts); 
            echo "jumlah uts lulus ".$resultuts['jumlah'];
            echo "<br>";
            $uts2 = "SELECT COUNT(UTS) as jumlah FROM nilai_siswa where UTS <75";
            $duts2  = mysqli_query($konek,$uts2);
            $resultuts2 = mysqli_fetch_array($duts2); 
            echo "jumlah uts gagal ".$resultuts2['jumlah'];
            echo "<br>";
            echo "<hr>";

            // <!-- menghitung data lulus dan gagal  tabel nilai uts -->

            $uas    = "SELECT COUNT(UAS) as jumlah FROM nilai_siswa where UAS >=75";
            $duas   = mysqli_query($konek,$uas);
            $resultuas = mysqli_fetch_array($duas); 
            echo "jumlah uas lulus ".$resultuas['jumlah'];
            echo "<br>";
            $uas2    = "SELECT COUNT(UAS) as jumlah FROM nilai_siswa where UAS <75";
            $duas2   = mysqli_query($konek,$uas2);
            $resultuas2 = mysqli_fetch_array($duas2); 
            echo "jumlah uas gagal ".$resultuas2['jumlah'];
            echo "<br>";

            // $total= 0;
            // echo "jumlah ".$total = $resultot['jumlah']+$resultgag['jumlah'];
            
           //  <!-- mencari entropy semseta -->
           // <!--  <?php
            $entropytot = 0;
            $entropytot = (-($resultlul['jumlah']/$resultsis['jumlah'])*log($resultlul['jumlah']/$resultsis['jumlah'],2)+(-($resultgag['jumlah']/$resultsis['jumlah'])*log($resultgag['jumlah']/$resultsis['jumlah'],2)));
            echo "<br>";
            echo "entropynya total : ".$entropytot;

        // mencari entropy uts
            $entropyuts   = (-($resultuts['jumlah']/$resultot['jumlah'])*log($resultuts['jumlah']/$resultot['jumlah'],2)+(-($resultuts2['jumlah']/$resultot['jumlah'])*log($resultuts2['jumlah']/$resultot['jumlah'],2)));
            echo "<br>";
            echo "entropy uts ".$entropyuts;
        // mencari entropy uas
            $entropyuas   = (-($resultuas['jumlah']/$resultot['jumlah'])*log($resultuas['jumlah']/$resultot['jumlah'],2)+(-($resultuas2['jumlah']/$resultot['jumlah'])*log($resultuas2['jumlah']/$resultot['jumlah'],2)));
            echo "<br>";
            echo "entropy uas ".$entropyuas;
        //mencari gain uts
            $gainuts = $entropytot-((($resultuts['jumlah']/$resultot['jumlah'])*$entropyuts)+(($resultuts2['jumlah']/$resultot['jumlah'])*$entropyuts));
            echo "<br>";
            echo "gain uts ".$gainuts;
        //mencari gain uas
            $gainuas = $entropytot-((($resultuas['jumlah']/$resultot['jumlah'])*$entropyuas)+(($resultuas2['jumlah']/$resultot['jumlah'])*$entropyuas));
            echo "<br>";
            echo "gain uas ".$gainuas;
            echo "<br>";
         
            $maks = max($gainuas,$gainuts);
            if ($maks == $gainuas){
                if ($nuas>=75) {
                  $ket = 'Tuntas';
                  $ket = mysqli_real_escape_string($konek,$_POST['keterangan']);
                  // $ket = $_POST['keterangan'][$i];
              }
            }else if ($maks == $gainuts){
                if ($nuts>=75) {
                  $ket = 'Tuntas';
                  $ket = mysqli_real_escape_string($konek,$_POST['keterangan']);
                  // $ket = $_POST['keterangan'][$i];
                }
            }else{
                  $ket = 'Belumtuntas';
                  $ket = mysqli_real_escape_string($konek,$_POST['keterangan']);
                  // $ket = $_POST['keterangan'][$i];
            }

            ?>
             <!-- <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <div class="table-responsive">
                        <table class="table table-bordered table-condensed table-hover">
                            <tr>
                                <th>Nama</th>
                                <th>tugas1</th>
                                <th>tugas2</th>
                                <th>uts</th>
                                <th>uh</th>
                                <th>uas</th>
                                <th>nilai akhir</th>
                            </tr>
                            <?php
                            // $query = "SELECT * FROM nilai_siswa";
                            // $data  = mysqli_query($konek,$query);
                            // foreach($data as $w)
                            {
                                ?>
                                <tr>
                                    <td><?= $w['nama'] ?></td>
                                    <td><?= $w['tugas1'] ?></td>
                                    <td><?= $w['tugas2']?></td>
                                    <td><?= $w['UH'] ?></td>
                                    <td><?= $w['UTS'] ?></td>
                                    <td><?= $w['UAS']?></td>
                                    <td><?= $w['Nilai_Akhir']?></td>                                    
                                </tr>
                                <?php
                            }
                            ?>
                        </table>
                    </div>
                </div>
            </div> 
 -->
        </div>
    </body>

