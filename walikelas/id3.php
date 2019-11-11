<?php  
class C45 
{
    protected $data;
    protected $attributes;
    protected $target;
    protected $rules;
    protected $finalRules;
    protected $hasilPrediksi;

    public function setData(array $data) 
    {
        $this->data = $data;

        return $this;
    }

    public function setAttributes(array $attributes)
    {
        $this->attributes = $attributes;

        return $this;
    }

    protected function getTarget() 
    {
        $target = [];
        foreach($this->data as $item) {
            $target[] = $item[count($item) -1];
        }

        return $target;
    }





    public function hitung()
    {
        $this->_hitung($this->data, $this->attributes);
        $this->generateRules();
    }

    public function _hitung(array $data, array $attributes, $base = null, $kasus = null)     
    {
        // HITUNG JUMLAH DATA
        $jumlah_data = count($data);

        // MENGAMBIL DATA KOLOM TARGET
        $kolom_target = [];
        foreach($data as $item) {
            $kolom_target[] = $item[count($item)-1];
        }

        // MENGHITUNG NILAI ENTROPY
        $entropy_total = 0;
        foreach(array_count_values($kolom_target) as $t) {
            $entropy_total = $entropy_total - $t/$jumlah_data * log($t/$jumlah_data, 2);
        }

        /**
         * UNTUK TIAP ATRIBUT:
         *     - MENGHITUNG ENTROPY TIAP KASUS
         *     - MENGHITUNG GAIN
         */
        foreach($attributes as $indexAttribute => $label) {

            $data_kolom_atribut = []; // VARIABEL UNTUK MENAMPUNG DATA KOLOM ATRIBUT KE-I
            $data_kolom_target = [];  // VARIABEL UNTUK MENAMPUNG DATA KOLOM TARGET
            $data_atribut_and_target = [];
            foreach ($data as $key => $value) {
                $data_kolom_atribut[$key] = $value[$indexAttribute-1];
                $data_kolom_target[$key] = $value[count($value)-1];
                $data_atribut_and_target[] = [$value[$indexAttribute-1], $value[count($value)-1]];
            }

            $jumlah_data_tiap_kasus = array_count_values($data_kolom_atribut);
            $label_target = array_unique($this->getTarget());
            $total_data= 0;

            $data_per_kasus = [];
            foreach($data_atribut_and_target as $item) {
                if(!isset($data_per_kasus[$item[0]][$item[1]])) 
                    $data_per_kasus[$item[0]][$item[1]] = 1;
                else
                    $data_per_kasus[$item[0]][$item[1]]++;
            }

            $lx = 0;
            $labels[$indexAttribute] = [];
            foreach($data_per_kasus as $case=>$value){

                $entropyAttribute=0;
                $l = 0;
                $jumlah_case =  array_sum($value);
                foreach($value as $i=>$v) {
                    $pi = $v/$jumlah_case;
                    $entropyAttribute = $entropyAttribute -$pi*log($pi,2);
                }

                if($entropyAttribute == 0) {
                    $nilai_default = array_keys($value)[0];
                    $labels[$indexAttribute][$case] = $nilai_default;
                }
                $leafs[$indexAttribute][$case] = $entropyAttribute;
                // echo $case." Entropy ", $entropyAttribute , "<br>";
                $lx += $jumlah_case/$jumlah_data*$entropyAttribute;

            }
            $gain =  $entropy_total - $lx;
            $gains[$indexAttribute] = $gain;
            // echo "Gain " . $gain, "<br>";


        }
        // Mengurutkan gain, untuk menjacari gain terbesar
        $l = arsort($gains);
        // Mengambil gain terbesar
        $root = array_keys($gains)[0]; 
        $this->rules[$root] = [];
        if($base != null) {
            $this->rules[$base][$kasus] = [
                'kasus' => $kasus,
                'forward' => $root
            ];
        }

        // echo "<h1>Atribut root ", $attributes[$root], "</h1>";
        foreach($leafs[$root] as $label => $entropy) {
            // echo "<h1 style='color:red'>$label $entropy</h1>";
            if($entropy == 0) {
                $this->rules[$root][$label] = [
                    "kasus" => $label, 
                    "nilai" => $labels[$root][$label]
                ];
                // echo "<h1 style='color:blue'> $root ". $label . ' '.$labels[$root][$label], "</h1>";
            }

            if($entropy > 0 && $entropy <= 1) {

                if ($base != null) {
                    // echo "Roote ".$root;
                    $this->rules[$root][$label] = [
                        "kasus" => $label.'-', "forward" => $base+1

                    ];
                    // echo "<hr>", $root;
                } else {
                    $this->rules[$root][$label] = $label;
                }

                // Hapus atribut yang telah menjadi root
                unset($attributes[$root]);

                $data_next_itarasi = [];
                foreach($data as $index=>$itemData) {
                    if($itemData[$root - 1] == $label) {
                        $data_next_itarasi[] = $itemData;
                    }
                }
                // Next Iterasi
                $this->_hitung($data_next_itarasi, $attributes, $root, $label);
            }

        }


    }

}


?>