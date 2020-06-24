<?php
function debug($db, $table, $column)
{
    $con = mysqli_connect("localhost", "root", "");
    if ($con) {
        mysqli_select_db($con, $db);
        $q = "SELECT * FROM " . $table;
        $f = mysqli_query($con, $q);
        if ($f) {
            $nr = mysqli_num_rows($f);
            $i = 1;
            while ($i <= $nr) {
                while ($row = mysqli_fetch_assoc($f)) {
                    if ($i != $row[$column]) {
                        $nq = "UPDATE " . $table . " SET " . $column . "=" . $i . " WHERE " . $column . "=" . $row[$column];
                        $fnq = mysqli_query($con, $nq);
                        if ($fnq) {
                            echo $column . " Column Updated";
                        }
                    }
                    $i++;
                }
            }
        }
    }
    mysqli_close($con);
}
debug("db", "table", "column");
?>
