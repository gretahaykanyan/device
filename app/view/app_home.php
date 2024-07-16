<nav class="navbar navbar-light bg-light p-0 m-1">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <i class="bi bi-person-fill-gear"></i>
            <span class="d-inline-block "><?php echo $_SESSION['uname']?></span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
            <i class="bi bi-list-nested"></i>
        </button>
    </div>
</nav>

<div class="toast-container d-flex justify-content-center align-items-center w-100">
    <?php
    if (isset($_SESSION['delete']) && $_SESSION['delete'] != '') {
    ?>
        <div id="liveToast1" class="toast hide show text-white bg-danger mt-5" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="1000">
            <div class="toast-header">
                <strong class="me-auto">Զգուզացում</strong>
                <small>1 րոպե առաջ</small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                <?php
                echo $_SESSION['delete'];
                unset($_SESSION['delete']);
                ?>
            </div>
        </div>
    <?php
    }; ?>
    <div id="liveToast1" class="toast hide text-white bg-danger mt-5" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="1000">
        <div class="toast-header">
            <strong class="me-auto">Զգուզացում</strong>
            <small>1 րոպե առաջ</small>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body error"></div>
    </div>

    <div id="liveToast2" class="toast hide text-white bg-info mt-5" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="1000">
        <div class="toast-header">
            <strong class="me-auto">Զգուզացում</strong>
            <small>1 րոպե առաջ</small>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body success"></div>
    </div>
</div>

<div class="panel_inner home tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
    <div class="row justify-content-between mb-3 p-0">
        <h3 class="col">Սարքավորում</h3>
        <div class="col d-flex justify-content-end p-0">
            <form method="post" id="selectform">
            <div class="btn-group me-3">
                <select class="form-select device" name="selectdevice" aria-label="Default select example">
                    <option value="Բոլորը" selected>Սարքավորման տեսակը</option>
                    <option value="Սմարթֆոն">Սմարթֆոն</option>
                    <option value="Համակարգիչ">Համակարգիչ</option>
                    <option value="Պլանշետ">Պլանշետ</option>
                    <option value="Նոթբուք">Նոթբուք</option>
                </select>
            </div>
            <div class="btn-group me-3">
                <select class="form-select brand " name="selectbrand" aria-label="Default select example">
                    <option value="Բոլորը" selected> Բրենդ</option>
                    <option value="Samsung">Samsung</option>
                    <option value="Applle">Applle</option>
                    <option value="Huawei">Huawei</option>
                    <option value="Nokia">Nokia</option>
                </select>
            </div>
       
           
        </form>
        </div>
    </div>

    <div class="tab col-12   justify-content-start p-0">
        <table class="table mb-5 pb-5">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Տեսակ</th>
                    <th scope="col">Մոդել</th>
                    <th scope="col">Նկար</th>
                    <th scope="col">Գինը</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody class="fetch"></tbody>
        </table>
    </div>
</div>