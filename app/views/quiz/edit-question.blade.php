<!doctype html>
<html lang="en">
<head>
  <title>Danh sách môn học</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="\WEB16305-PHP2\asm1\app\views\css\style.css">
  <link rel="stylesheet" href="\WEB16305-PHP2\asm1\app\views\css\new-question-answer.css">
</head>
<body>
  <div class="page">
    @include('layout.sidebar')
    <section class="hero-wrap js-fullheight">
      <div class="container px-0">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center" data-scrollax-parent="true">
          <div class="col-md-12 ftco-animate text-center">
            <div class="desc">
              <div class="container mt-5">
                <div class="row d-flex justify-content-center align-items-center">
                  <div class="col-md-6">
                    <form action="<?= BASE_URL . 'quiz/edit-question?id=' . $_GET['id_subject'] ?>" id="regForm" method="post">
                     @if ($question->isEmpty())
                      <h5>Bài quiz này hiện tại chưa có câu hỏi nào mời bạn thêm câu hỏi</h5>
                      <div style="overflow:auto;" id="nextprevious">
                        <div style="float:right;"> <a class="btn btn-secondary" href="<?= BASE_URL . 'quiz?id=' . $_GET['id_subject'] ?>" >Trờ lại</a> <a class="btn btn-success" href="<?= BASE_URL . 'quiz/tao-moi-cau-hoi?id=' . $_GET['id_subject'] ?>" >Thêm câu hỏi</a> </div>
                      </div>
                    @else
                      <h5>Câu hỏi - Đáp án</h5>
                      <div class="all-steps" id="all-steps">@foreach ($question as $i)<span class="step"></span>@endforeach</div>
                      @foreach ($question as $i => $ques)
                        <div class="tab">
                          Câu hỏi
                          <input type="hidden" value="<?= $ques->id ?>" name="id<?= $i + 1 ?>">
                          <p><input placeholder="Điền cầu hỏi vào đây" name="q<?= $i + 1 ?>" id="" cols="30" rows="1" oninput="this.className = ''" value="<?= $ques->name ?>"></input></p>
                          Đáp án
                          @foreach ($arr_answer[$i] as $j => $answer)
                            <div class="group-input-select">
                              <input type="hidden" value="<?= $answer->id ?>" name="id_answer<?= $j + 1 ?>quiz<?= $i + 1 ?>">
                              <p><input type="text" placeholder="Đáp án <?= $j + 1 ?>" oninput="this.className = ''" name="content<?= $j + 1 ?>quiz<?= $i + 1 ?>" value="<?= $answer->content ?>"></p>
                              <p><select name="is_correct<?= $j + 1 ?>quiz<?= $i + 1 ?>" id="selects">
                                  <option <?= ($answer->is_correct == 1) ? 'selected' : "" ?> value="1">Sai</option>
                                  <option <?= ($answer->is_correct == 2) ? 'selected' : "" ?> value="2">Đúng</option>
                                </select>
                              </p>
                            </div>
                          @endforeach
                          <p><button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalQuestion"><i class="fas fa-trash-alt"></i></button></p>
                          <?php include_once "./app/views/layout/modalQuestion.php"; ?>
                        </div>
                      @endforeach
                      <div class="tab"></div>
                      <div style="overflow:auto;" id="nextprevious">
                        <div style="float:right;"> <button type="button" id="prevBtn" onclick="nextPrev(-1)">Trở lại</button> <button type="button" id="nextBtn" onclick="nextPrev(1)">Tiếp</button> </div>
                      </div>
                    @endif
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <?php if (isset($_SESSION['user']) && $_SESSION['user']->role_id == 2) { ?>
    <?php include_once "./app/views/layout/modalSubject.php";?>
    <script src="\WEB16305-PHP2\asm1\app\views\js\edit-subject.js"></script>
  <script src="\WEB16305-PHP2\asm1\app\views\js\edit-question.js"></script>
  <?php } ?>
  <?php include_once "./app/views/layout/link-js.php" ?>
</body>
</html>