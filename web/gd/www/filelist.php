<?php
//require "head.php";


if (isset($_SESSION['sandbox'])) {
    $fdir = $_SESSION['sandbox'];
    $flist = glob($fdir.'/*');
} else {
    exit();
}


/*foreach($flist as $fn){
    echo $fn.',';
}*/

?>
<div class="row">
    <h1>File List</h1>
    <table class="table">
        <thead>
            <tr>
                <th width="15%">#</th>
                <th>File</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $i=0; 
        foreach($flist as $file){
            $fa = explode('/',$file);
            $fname = $fa[count($fa)-1];
        ?>
            <tr>
                <th><?=$i?></th>
                <th><a href="download.php?f=<?=$fname?>"><?=$fname?></a></th>
            </tr>
        <?php $i++;}?>
        </tbody>
    </table>
</div>
<?php
//require "foot.php";
?>
