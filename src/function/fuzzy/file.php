<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>test data</title>
</head>

<body>
    <div class="container">
        <h2 class="mt-5" >karywan - budi</h2>
        <form class="mt-5" action="fuzzy.php" method="POST">
            <p>penilaian motif diri</p>
            <?php for($i = 1; $i <= 6 ; $i++) :?>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="motif_diri" value="<?= $i ?>">
                <label class="form-check-label">
                   <?= $i ?>
                </label>
            </div>
            <?php endfor;?>
            <p>penilaian pengetahuan</p>
            <?php for($i = 1; $i <= 6 ; $i++) :?>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="pengetahuan" value="<?= $i ?>">
                <label class="form-check-label">
                   <?= $i ?>
                </label>
            </div>
            <?php endfor;?>
            <p>penilaian keterampilan</p>
            <?php for($i = 1; $i <= 6 ; $i++) :?>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="keterampilan" value="<?= $i ?>">
                <label class="form-check-label">
                   <?= $i ?>
                </label>
            </div>
            <?php endfor;?>

            <button class="btn btn-primary my-5" type="submit" >save</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>