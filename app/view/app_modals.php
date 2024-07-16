<div class="modal fade" id="edit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Փոխել տվյալները</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="post" id="editform" class="d-flex  flex-column align-items-center justify-content-center  needs-validation" enctype="multipart/form-data" novalidate>
                    <div class="input-field">
                        <i class="bi bi-router-fill"></i>
                        <select class="form-select" aria-label="Տեսակ" id="editdevice" name="editdevice" required>
                            <option value="Սմարթֆոն">Սմարթֆոն</option>
                            <option value="Համակարգիչ">Համակարգիչ</option>
                            <option value="Պլանշետ">Պլանշետ</option>
                            <option value="Նոթբուք">Նոթբուք</option>
                        </select>
                    </div>
                    <div class="input-field">
                        <i class="bi bi-buildings-fill"></i>
                        <select class="form-select" aria-label="Բրենդ" id="editbrand" name="editbrand" required>
                            <option value="Samsung">Samsung</option>
                            <option value="Applle">Applle</option>
                            <option value="Huawei">Huawei</option>
                            <option value="Nokia">Nokia</option>
                        </select>
                    </div>
                    <div class="input-field">
                        <i class="bi bi-spellcheck"></i>
                        <input class="form-control" type="text" name="editmodel" placeholder="Մոդել" id="editmodel" required />

                    </div>
                    <img src="" id="editimg" class="mb-3" width="100%"><br>
                    <div class="input-field">
                        <i class="bi bi-card-image"><input class="form-control img" type="file" name="editimage" placeholder="Նկար" accept=".jpg,.png,.svg" /> </i>

                        <span id="image" class="image">Սարքավորման Նկար</span>
                    </div>
                    <div class="input-field">
                        <i class="bi bi-currency-dollar"></i>
                        <input class="form-control" type="number" name="editprice" placeholder="Գինը" id="editprice" required />
                    </div>
                    <input type="hidden" id="editid" name="editid" />
                    <button class="button" name="editDevice" id="edit_submit" type="submit">Փոխել</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="more" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Մանրամասն</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card m-auto" style="width: 18rem;">
                    <img src="" class="card-img-top" id="moreimg">
                    <div class="card-body">
                        <h5 class="card-title"><span id="morebrand"></span>  <span id="moremodel"></span></h5>
                        <p class="card-text">Տեսակ: <span id="moredevice"></span><br> quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary" id="moreprice" ></a>
                    </div>
                </div>
             
            </div>

        </div>
    </div>
</div>