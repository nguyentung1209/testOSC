<form action="" method="post">
    <label for="">Mời nhập dãy ký tự: </label>
    <input type="text" name="n" value="" required>
    <button type="submit">Submit</button>
</form>
<?php
if(isset($_POST['n']))
{
    $input = $_POST['n'];
    $input = trim($input);
    $input = str_replace(' ','', $input);
    $input = strtolower($input);
    if(preg_match("/^[a-z]+$/", $input)){
        $arr = [];
        for($i = 0;$i < strlen($input); $i++){
            array_push($arr, $input[$i]);
        }
        echo strlen($input) . "</br>";
        $arr_count = array_count_values($arr);
        $arr_len = strlen($input);
        if($arr_len % 2 == 0){
            foreach($arr_count as $key=>$value){
                if($arr_count[$key] > (strlen($input)/2))
                {
                    echo "0";
                    break;
                }
                else{
                    echo "1";
                    break;
                }
            }
        }
        else{
            foreach($arr_count as $key=>$value){
                if($arr_count[$key] > (strlen($input)/2 + 1))
                {
                    echo "0";
                    break;
                }
                else{
                    echo "1";
                    break;
                }
            }
        }

    }
}
?>