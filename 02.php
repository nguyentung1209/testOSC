<form action="" method="post">
    <label for="">Mời nhập mảng số nguyên: </label>
    <input type="text" name="n" value="[]" required>
    <button type="submit">Submit</button>
</form>
<?php
if(isset($_POST['n']))
{
    $input = $_POST['n'];
    if($input[0] == "[" && $input[-1] == "]")
    {
        $input = trim($input);
        $input = ltrim($input, '[');
        $input = rtrim($input, ']');
        $input = str_replace(' ','', $input);
        $arr = explode(',', $input);
        if(count($arr) >= 2){
            for($i = 0; $i < count($arr); $i++){
                if(!is_numeric($arr[$i]) || ($arr[$i] * 10) % 10 != 0){
                    echo "0";
                    break;
                }
            }
        }
        $max1 = null;
        $max2 = null;
        for($i = 0; $i < count($arr); $i++){
            if($max1 < $arr[$i]){
                $max2 = $max1;
                $max1 = $arr[$i];
            }
            elseif($max1 > $arr[$i] && $max2 < $arr[$i]){
                $max2 = $arr[$i];
            }
        }
        echo $max2;
    }
    else{
        echo "0";
    }
}
?>