<!-- Modal -->
<div class="modal fade" id="modalQuestion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Thông báo</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Nếu bạn xóa câu hỏi này đồng thời những câu trả lời của câu hỏi này cũng sẽ xóa theo, bạn chắc muốn xóa chứ ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Thoát</button>
        <a href="<?= BASE_URL . 'quiz/remove-question?id='.$ques->id.'&id_quiz='.$_GET['id'].'&id_subject='.$_GET['id_subject']?>" class="btn btn-primary" >Xóa</a>
      </div>
    </div>
  </div>
</div>