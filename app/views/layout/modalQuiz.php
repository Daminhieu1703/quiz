<!-- Modal -->
<div class="modal fade" id="modalQuiz" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">THÊM QUIZ</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="<?= BASE_URL . 'quiz/tao-moi-quiz?id='.$_GET['id']?>">
        <input type="hidden" name="id">
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Tên quiz</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name">
          </div>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Thời gian làm quiz</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="duration_minutes">
          </div>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Ngày bắt đầu</label>
            <input type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="start_time">
          </div>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Ngày kết thúc</label>
            <input type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="end_time">
          </div>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Trạng thái</label>
            <select class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="status">
              <option selected disabled>Mời bạn chọn trạng thái</option>
              <option value="1">Ẩn</option>
              <option value="2">Hiện</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Is_shuffle</label>
            <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="is_shuffle">
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
</div>
<!-- Modal -->
<div class="modal fade" id="modalEditQuiz" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">SỬA QUIZ</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form method="post" action="<?= BASE_URL . 'quiz/luu-cap-nhat-quiz?id='.$_GET['id']?>">
        <input type="hidden" name="id" id ="id">
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Tên quiz</label>
            <input type="text" class="form-control" aria-describedby="emailHelp" name="name" id="nameQuiz">
          </div>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Thời gian làm quiz</label>
            <input type="text" class="form-control" aria-describedby="emailHelp" name="duration_minutes" id="timeQuiz">
          </div>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Ngày bắt đầu</label>
            <input type="date" class="form-control" id="dateStart" aria-describedby="emailHelp" name="start_time">
          </div>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Ngày kết thúc</label>
            <input type="date" class="form-control" id="dateEnd" aria-describedby="emailHelp" name="end_time">
          </div>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Trạng thái</label>
            <select class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="status">
              <option selected disabled>Mời bạn chọn trạng thái</option>
              <option value="1">Ẩn</option>
              <option value="2">Hiện</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Is_shuffle</label>
            <input type="number" class="form-control" id="is_shuffle" aria-describedby="emailHelp" name="is_shuffle">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">THOÁT</button>
          <button type="submit" class="btn btn-primary">SỬA</button>
        </div>
        </form> 
      </div>
    </div>
  </div>
</div>