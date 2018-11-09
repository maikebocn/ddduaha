<?php
require 'fungsi.php';

$nama_file= $_GET['file'];
$nama_file= str_replace('-_-', ' ', $nama_file).'.txt';
$posisi_file= "kata/".$nama_file;


if(!file_exists($posisi_file)){
exit();
}

$array= array_filter(array_unique(explode("\n", file_get_contents($posisi_file))));
shuffle($array);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Archive</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<meta name="NOINDEX,FOLLOW,NOARCHIVE,NOTRANSLATE">
</head>
<body>

<div class="container">
  <h2>Site Archive</h2>
  <h3>Preview Site Archive</h3>            
  <table class="table">
    <thead>
      <tr>
        <th>FileName</th>
	<th>Description</th>
        <th>File Type</th>
      </tr>
    </thead>
    <tbody>
<?php
$ii=1;
foreach($array as $item){
$title= trim($item);
$title= trim(preg_replace("![^a-z0-9]+!i", " ", $title));
$slug= trim(str_replace(' ', '-', $title),'-');
$pdfno= (($ii-1)*3)+1;
$docno= (($ii-1)*3)+2;

echo   '<tr>

        <td><a href="/'.$slug.'.pdf" title="'.$title.'">'.$title.'</a></td>
	<td>Description About '.$title.' Not <b>Available  Download '.$title.' .pdf </b>for detail</td>
        <td><b>PDF file</b></td>
        </tr>
        
        <tr>

        <td><a href="/'.$slug.'.doc" title="'.$title.'">'.$title.'</a></td>
		<td>Description About '.$title.' Not <b>Available  Download '.$title.' .doc </b>for detail</td>
        <td><b>DOC file</b></td>
        </tr>
        
';
++$ii;
}
?>
    
</tbody>
  </table>
</div>

<br>
<center><h2><b>Pages</b></h2></center>
<?php
$all= glob("kata/*.txt");
shuffle($all);

echo '<div style="display:yes">';

foreach($all as $file){
$file= str_replace(array('kata/', '.txt'), '', $file);
$file= str_replace(' ', '-_-', $file);
 echo '<a href="/page/'.$file.'" title="file '.$file.'">'.$file.'</a> | ';
}

echo '</div>';
?>
</body>
</html>
