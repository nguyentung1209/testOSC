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
    $start = strpos($input, '<');
    echo $start . "</br>";
    $end = strrpos($input, '>',$start);
    echo $end . "</br>";
    $len = strlen($input);
    if ($end !== false) {
        echo $input;
        //$string = substr($input, $start);

    } else {
        $string = substr($input, $start, $len-$start);
    }
    libxml_use_internal_errors(true);
    libxml_clear_errors();
    $xml = simplexml_load_string($input);
    if(count(libxml_get_errors())==0){
        echo "1";
    }
    else{
        echo "0";
    }
}
?>