<?php
    function connect_DB()
    {
    $konek = mysqli_connect("localhost","root","","webakhir");
        // $konek = new pdo('mysqli:dbname=' . $db_name . ';host=' . $db_host, $db_user, $db_pass);
        // $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // $pdo->query('SET NAMES utf8; SET CHARACTER SET utf8');
        return $konek;
    }

    function getColumnsNames()
    {
        $stmt = connect_DB() -> prepare("
            SHOW COLUMNS FROM nilai_siswa
            ");
        $stmt -> execute();
        return $stmt;
    }

    function getTables()
    {
        $stmt = connect_DB() -> prepare("SHOW TABLES in webakhir");
        $stmt -> execute();
        return $stmt;
    }

    function classAttributeValues($attr)
    {
        $stmt = connect_DB() -> prepare("SELECT DISTINCT $attr FROM nilai_siswa");
        $stmt -> execute(array($attr));
        return $stmt -> fetchAll();
    }

    function rowsNum()
    {
        $stmt = connect_DB() -> prepare('SELECT count(*) FROM weathers');
        $stmt -> execute();
        return $stmt -> fetch();
    }

    function valueNum($column, $value)
    {
        $stmt = connect_DB() -> prepare("SELECT count($column) FROM weathers WHERE play ='" . $value . "'");
        $stmt -> execute();
        return $stmt -> fetch();
    }

    function entropy($data = array())
    {
        print_r($data);
        echo "<br />";
        echo $data[0];
        echo "<br />";
        echo $data[1];
        echo "<br />";
        echo $data[2];
        echo "<br /><br />";

        $result = array();
        $probabilty = array();
        $log = array();
        $dataLength = count($data);

        for($i = 0; $i < $dataLength - 1; ++$i)
        {
             $probabilty[$i] = $data[$i + 1] / $data[$i];
             echo $probabilty[$i] . "<br />";
             $log[$i] = log($probabilty[$i], 2);
             echo $log[$i] . "<br />";
             $result[$i] = $probabilty[$i] * $log[$i];
             echo $result[$i] . "<br /><br /><hr />";
        }

        $entropy = 0;

        /*print_r($probabilty);
        echo "<br />";
        print_r($log);
        echo "<br />";
        print_r($result);
        echo "<br />";*/

        for($j = 0; $j < count($result); ++$j)
        {
            $entropy += $result[$j];
            echo $entropy . "<br /><hr />";
        }

        return abs($entropy);

    }