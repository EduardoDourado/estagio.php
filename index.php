<?php
$name = "nome";
$array = array(1,2,3,4);
$array2 = true;
//title paragrago div dentro da div input tipo text fazer um paragrafo para cada indice do array usar uma div foreach p
echo "<title>Delicias da geo</title>";
echo "<h1>Bolo de fuba</h1>";
echo "<div>
<input type='text'>
</div>";
echo "<div>";
foreach ($array as  $value) {
 echo"<p>$value</p>";
}
echo "</div>";



foreach ($array as  $value) {
   foreach ($array as  $value) {
    break 2;
   }

if ($value ==3) {
    echo $value . "<br>";
}

}
foreach ($array as  $value) {
    if ($value == 2) {
      echo ($name);
       
    }

    if ($value == "nome") {
        echo ($array2);
    }

}