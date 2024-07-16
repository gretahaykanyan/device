<?php include(__DIR__ . "\..\config.php");
 if($_SESSION['uname'] == false){
    header('Location: signin');
      }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="<?= ROOT ?>css\style_app.css?v=<?php echo time(); ?>" />
    <title>Network</title>
</head>

<body>

    <div class="container-fluid row p-3 g-0 h-100">
        <div class="container-fluid flex-column d-none d-sm-block col-2 menu mt-3 ">
            <div class="navbar navbar-expand-lg align-self-center p-0">
                <ul class="nav nav-pills flex-column align-self-center" id="pills-tab" role="tablist">
                    <li class="nav-item nav_header">
                        <i class="bi bi-hdd-network-fill"></i>
                        <a class="nav-link navbar-brand disabled" aria-disabled="true" href="#" style="color:#FBE175;">Network</a>
                    </li>

                    <li class="nav-item menu-item active" role="presentation">
                        <i class="bi bi-router"></i>
                        <a class="nav-link menu-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Ընդհանուր</a>
                    </li>
                    <li class="nav-item menu-item">
                        <i class="bi bi-patch-plus"></i role="presentation">
                        <a class="nav-link menu-link" id="pills-add-tab" data-bs-toggle="pill" data-bs-target="#pills-add" type="button" role="tab" aria-controls="pills-add" aria-selected="true">Ավելացնել</a>
                    </li>

                    <li class="nav-item nav_footer">
                        <i class="bi bi-box-arrow-in-right"></i>
                        <a class="nav-link" href="?logout">Դուրս գալ</a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="container-fluid col-12 col-sm-10 panel tab-content" id="pills-tabContent">
            <?php include_once(__DIR__ . "\app_home.php") ?>
            <?php include_once(__DIR__ . "\app_add.php") ?>
        </div>

        <div class="container-fluid flex-column col col-md-2 menu  offcanvas offcanvas-start p-3" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class=" offcanvas-body navbar navbar-expand-lg  p-0">
                <ul class="nav nav-pills flex-column align-self-start ps-3" id="pills-tab" role="tablist">
                    <li class="nav-item nav_header">
                        <i class="bi bi-hdd-network-fill"></i>
                        <a class="nav-link navbar-brand disabled" aria-disabled="true" href="#" style="color:#FBE175;">Network</a>
                    </li>

                    <li class="nav-item menu-item active" role="presentation">
                        <i class="bi bi-router"></i>
                        <a class="nav-link menu-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Ընդհանուր</a>
                    </li>
                    <li class="nav-item menu-item">
                        <i class="bi bi-patch-plus"></i role="presentation">
                        <a class="nav-link menu-link" id="pills-add-tab" data-bs-toggle="pill" data-bs-target="#pills-add" type="button" role="tab" aria-controls="pills-add" aria-selected="true">Ավելացնել</a>
                    </li>
                    <li class="nav-item nav_footer">
                        <i class="bi bi-box-arrow-in-right"></i>
                        <a class="nav-link" href="signin.php">Դուրս գալ</a>
                    </li>
                </ul>
            </div>

        </div>

        <?php include_once(__DIR__ . "\app_modals.php") ?>
    </div>


    <script src="<?= ROOT ?>js/action_app.js?v=<?php echo time(); ?>"></script>
    <script src="<?= ROOT ?>js/app.js?v=<?php echo time(); ?>"></script>

</body>

</html>