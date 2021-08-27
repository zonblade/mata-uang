# mata-uang
mensimpelkan mata uang...
<br>
penjelasan<br>
```php
\MataUang\mata_uang($jumlahuang,$desimal,$dibulatkan);
```
jumlah uang tipe float angka<br>
desimal 1.22 (2 desimal) cukup masukan angka 2, jika 3 desimal masukan 3.<br>
dibulatkan, jika true maka `1.23` akan menjasi `1.20`
cara pakai
```php
<?php
require_once(__DIR__.'/path/to/mata_uang.php');
$uang = 12300; /* 12.3 Ribu */
$hasil = \MataUang\mata_uang($uang,2);
echo $hasil['num']; /* 12.30 */
echo $hasil['mark']; /* Ribu */
echo $hasil['res']; /* 12.30 Ribu */
```
