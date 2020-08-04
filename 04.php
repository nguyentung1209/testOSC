<form action="" method="post">
    <label for="">Mời nhập dãy ký tự: </label>
    <input type="text" name="n" value="" required>
    <button type="submit">Submit</button>
</form>
<?php
$source =  isset($_POST['n']) ? $_POST['n'] : '';
$source_array = json_decode($source);
$end = [];
$arr = [];
$except_person = [];
if (is_array($source_array)) {
    foreach ($source_array as $key => $value) {
        if (in_array("covid", $value)) {
            array_push($value, 0);
            array_push($end, $value);
        }
    }
}
foreach ($end as $key => $value) {
    add_to_array($source_array, $except_person, $value[0], $end[$key], 0);
}
$result = json_encode($end);
print_r($result);
function add_to_array($arr_compare, &$arr_except, $person, &$arr_add, $order)
{
    if (in_array($person, $arr_except))
        return;
    foreach ($arr_compare as $item) {
        if (in_array('covid', $item))
            continue;
        if ($person === $item[0])
            continue;
        if (in_array($person, $item)) {
            array_push($arr_add, [$item[0], $person, $order + 1]);
        }
    }
    $arr_except[] = $person;
    if (is_array(($arr_add)))
        foreach ($arr_add as $key => $value) {
            add_to_array($arr_compare, $arr_except, $value[0], $arr_add[$key], $order + 1);
        }
}
?>