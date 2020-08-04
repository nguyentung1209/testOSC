<form action="" method="post">
    <label for="">Mời nhập số n: </label>
    <input type="text" name="n" value="" required>
    <button type="submit">Submit</button>
</form>
<?php
    if(isset($_POST['n']))
    {
        $n =  $_POST['n'];
        $result = "";
        if(is_numeric($n))
        {
            if(($n * 10) % 10 == 0){
                if($n > 0 && $n < 100){
                    echo "n = " . $n . "</br>";
                    for ($i = 1; $i < $n+1; $i++){
                        if($i % 3 == 0 && $i % 5 == 0){
                            $result .= "SmartOSC,";
                        }
                        elseif ($i % 3 == 0){
                            $result .= "Smart,";
                        }
                        elseif ($i % 5 == 0){
                            $result .= "OSC,";
                        }
                        else{
                            $i = (string)$i;
                            $result .= $i . ",";
                        }
                    }
                    echo "Kết quả: " . rtrim($result, ",") . ".";
                }
                else{
                    echo "Vui lòng nhập số lớn hơn 0 và nhỏ hơn 100";
                }
            }
            else {
                echo "Vui lòng nhập số nguyên!";
            }
        }
        else{
            echo "Vui lòng nhập số!";
        }
    }
?>