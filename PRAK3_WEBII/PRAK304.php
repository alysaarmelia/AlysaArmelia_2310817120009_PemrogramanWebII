<!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>PRAK304</title>
 </head>
 <body>
     <?php 
     $bintang = isset($_POST['bintang']) ? $_POST['bintang'] : NULL;
     $picture = "<img style='width: 70px;' src='star-images-9441.png' >";
     if(isset($_POST['tambah'])) $bintang += 1;
     if(isset($_POST['kurang'])) $bintang -= 1;
     ?>

     <?php if(empty($bintang)) : ?>
         <form action="" method="post">
             <label for="bintang">Jumlah Bintang :</label>
             <input type="text" name="bintang"> <br>
             <button type="submit" name="submit">Submit</button>
         </form>

     <?php else : ?>
         Jumlah Bintang : <?= $bintang ?> <br><br>
         <?php for($i = 0; $i < $bintang; $i++) echo $picture; ?>
         <form action="" method="post">
             <input type="hidden" name="bintang" value="<?= $bintang ?>">
             <button type="submit" name="tambah" value="tambah">tambah</button>
             <button type="submit" name="kurang" value="kurang">kurang</button> 
         </form>
     <?php endif; ?>
 </body>
 </html>