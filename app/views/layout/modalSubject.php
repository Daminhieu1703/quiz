<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">THÊM MÔN HỌC</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form method="post" action="<?= BASE_URL . 'mon-hoc/luu-tao-moi'?>">
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Tên môn học</label>
          <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">THOÁT</button>
        <button type="submit" class="btn btn-primary">THÊM</button>
      </div>
      </form>  
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">SỬA MÔN HỌC</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
    <form method="post" action="" id="modalForm">
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Tên môn học</label>
          <input type="text" class="form-control" id="inputModal" aria-describedby="emailHelp" name="name">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">THOÁT</button>
        <button type="submit" class="btn btn-primary">LƯU</button>
      </div>
    </form>
    </div>
  </div>
</div>