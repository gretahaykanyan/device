<div class="panel_inner add tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
  <h1 class="text-center">Ավելացնել սարքավորում</h1>
  <form method="post" class="d-flex  row align-items-centre justify-content-around text-center needs-validation mt-md-2 p-3" id="form" enctype="multipart/form-data" novalidate>
    <div class="input-field col-md-7 mt-4">
      <i class="bi bi-router-fill"></i>
      <select class="form-select" aria-label="Տեսակ" id="device" name="device" required>
        <option selected disabled>Սարքավորման տեսակը</option>
        <option value="Սմարթֆոն">Սմարթֆոն</option>
        <option value="Համակարգիչ">Համակարգիչ</option>
        <option value="Պլանշետ">Պլանշետ</option>
        <option value="Նոթբուք">Նոթբուք</option>
      </select>

    </div>
    <div class="input-field col-md-7">
      <i class="bi bi-buildings-fill"></i>
      <select class="form-select" aria-label="Բրենդ" id="brand" name="brand" required>
        <option selected disabled>Թողարկող ընկերություն</option>
        <option value="Samsung">Samsung</option>
        <option value="Applle">Applle</option>
        <option value="Huawei">Huawei</option>
        <option value="Nokia">Nokia</option>
      </select>
    </div>
    <div class="input-field col-md-7">
      <i class="bi bi-spellcheck"></i>
      <input class="form-control" type="" name="model" placeholder="Մոդել" id="model" required />
    </div>
    <div class="input-field col-md-7">
      <i class="bi bi-card-image" style="max-height: 55px;"><input class="form-control " type="file" name="image" placeholder="Նկար" id="img" accept=".jpg,.png,.svg,.webp" required /> </i>
      <span id="image">Սարքավորման Նկար</span>
    </div>
    <div class="input-field col-md-7">
      <i class="bi bi-currency-dollar"></i>
      <input class="form-control" type="number" name="price" placeholder="Գինը" id="price" required />
    </div>
    <button class="button col-md-6 m-auto" name="add" id="submit" type="submit">Ավելացնել</button>
  </form>
</div>