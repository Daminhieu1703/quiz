<!doctype html>
<html lang="en">
<head>
    <title>Quiz làm bài</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="\WEB16305-PHP2\asm1\app\views\css\start-quiz.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <div class="holder d-flex align-items-center justify-content-center">
        <div class="container mt-5 mb-5">
            @if ($questions->isEmpty())
                <header class="text-center mb-3">
                    <h1 class="content">Hiện tại <?= $quizs->name ?> đang trống, chúng tôi sẽ update các câu hỏi sớm nhất</h1>
                </header>
            @else
                <header class="text-center mb-3">
                    <h1 class="content"><?= $quizs->name ?></h1>
                    <p class="fst-italic">Thời gian còn lại: <span id="time"></span></p>
                </header>
                <form action="<?= BASE_URL . 'quiz/submit-quiz?id='.$_GET['id_subject'].'&id_student_quiz='.$student_quiz_id->id.'&id_quizs='.$_GET['id']?>" method="post" name="submit-auto" id="submit-auto">
                    @foreach ($questions as $i => $ques)
                        <div class="row mt-1">
                            <div class="col-md-13">
                                <div class="p-card bg-white p-2 rounded px-3">
                                    <div class="card-body p-5">
                                        <div class="d-flex align-items-center mb-4 pb-4 border-bottom"><i class="fas fa-question-circle fa-3x"></i>
                                            <div class="ms-3">
                                                <h4 class="text-uppercase fw-weight-bold mb-0"><?= $ques->name ?></h4>
                                                <input type="hidden" name="q<?=$i+1?>" value="<?= $ques->id ?>">
                                            </div>
                                        </div>
                                        @foreach($arr_answers[$i] as $j => $answer)
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="mapQuestion<?=$i+1?>" id="flexRadioDefault1" value="<?= $answer->id?>">
                                                <label class="form-check-label" for="flexRadioDefault1"><?= $answer->content ?></label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <button type="submit" class="btn btn-success mt-3 btn-lg float-end">Nộp bài</button>
                </form>
            @endif
        </div>
    </div>
    <script>
         // Set the date we're counting down to
        var now = new Date()
        var endtime = new Date(now);
        endtime.setMinutes(now.getMinutes() + {{$time}});
        endtime.setSeconds(now.getSeconds() + 0);
        var countDownDate = endtime.getTime();

        // Update the count down every 1 second
        var x = setInterval(function() {

            // Get today's date and time
            var now = new Date().getTime();

            // Find the distance between now and the count down date
            var distance = countDownDate - now;

            // Time calculations for days, hours, minutes and seconds
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            // Display the result in the element with id="demo"
            document.getElementById("time").innerHTML = minutes + " phút " + seconds + " giây ";
            if (minutes == 0) {
                document.getElementById("time").innerHTML = seconds + " giây ";
            }
            // If the count down is finished, write some text
            if (distance < 0) {
                clearInterval(x);
                document.getElementById("time").innerHTML = "Hết giờ";
                document.forms['submit-auto'].submit();
            }
        }, 1000);
        setInterval(() => {
            $.get("<?=BASE_URL?>quiz/check-time?id=<?=$student_quiz_id->id ?>", function(data) {});
        }, 1000);
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>