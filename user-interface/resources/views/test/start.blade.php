<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Cards</title>

    <!-- Custom fonts for this template-->
<link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

<!-- Custom styles for this template-->
<link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">


</head>

<body id="page-top"  onload="getNextQuestion()">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->

        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->

                @include('layouts.header')
                
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                



                           <!-- Instructions Card -->
<div class="card mb-4 py-3 border-left-primary">
    <div class="card-body">
        <b>Instructions:</b> This questionnaire consists of 21 groups of statements. 
        Please read each group carefully. Then, select the one statement from each group that best describes how you have
         been feeling over the past two weeks, including today.
    </div>
</div>

<!-- Wrapper Container for Flexbox -->
<!-- Wrapper Container for Flexbox -->
<div class="d-flex justify-content-between">
    
    <!-- Question Card -->
    <div class="card shadow mb-4" style="width: 74%;">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary" id="question-title"></h6>
        </div>
        <div id="question-container"></div>
        <div class="card-body" id="options-container"></div>
        <div class="card-footer">
            <button class="btn btn-secondary" id="prev-btn" onclick="getPreviousQuestion()" disabled>Previous</button>
            <button class="btn btn-primary" id="next-btn" onclick="getNextQuestion()" disabled>Next</button>
        </div>
    </div>

    <!-- Depression Level Guide -->
    <div class="card shadow mb-4" style="width: 25%;">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Progress Bar</h6>
        </div>
        <div class="card-body">
            <div class="progress" style="height: 15px;">
                <div id="progressBar" class="progress-bar bg-primary" role="progressbar" 
                    style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                </div>
            </div>
            <p class="text-center mt-2"><strong id="progressText">0%</strong></p>
        </div>


    </div>
</div>

<!-- Submit Button -->
<div class="text-center mt-3">
    <button id="submitBtn" class="btn btn-primary" disabled>Submit</button>
</div>

<script>
    let totalQuestions = 21;
    let answeredQuestions = 0;
    let answeredSet = new Set();
    let totalScore = 0;
    let questionHistory = []; // Store previous questions & answers
    let currentQuestion = null; // Store current question data

    function updateProgress() {
        let questionName = $("input[type=radio]:checked").attr("name");

        if (questionName && !answeredSet.has(questionName)) {
            answeredSet.add(questionName);
            answeredQuestions = answeredSet.size;
        }

        let progress = (answeredQuestions / totalQuestions) * 100;
        $("#progressBar").css("width", progress + "%").attr("aria-valuenow", progress);
        $("#progressText").text(Math.round(progress) + "%");

        if (answeredQuestions === totalQuestions) {
            $("#submitBtn").removeAttr("disabled");
        }
    }

    function getNextQuestion() {
        $("#next-btn").prop("disabled", true);

        if (currentQuestion) {
            // Store current question and selected answer before moving forward
            let selectedValue = $("input[name='question_" + currentQuestion.id + "']:checked").val();
            questionHistory.push({ question: currentQuestion, answer: selectedValue });
        }

        $.ajax({
            url: "http://127.0.0.1:5000/next-question",
            type: "POST",
            contentType: "application/json",
            data: JSON.stringify({ current_id: currentQuestion ? currentQuestion.id : 0 }),
            success: function(data) {
                if (data.status === "done") {
                    let interpretation = getResultInterpretation(totalScore);
                    $("#question-container").html(`<h3>Exam Finished!</h3>`);
                    $("#options-container").html("");
                    $("#next-btn").hide();
                    $("#prev-btn").hide();
                } else {
                    displayQuestion(data);
                    $("#prev-btn").prop("disabled", false); // Enable Previous button
                }
            }
        });
    }

    function getPreviousQuestion() {
        if (questionHistory.length > 0) {
            let lastQuestionData = questionHistory.pop(); // Get the last question
            currentQuestion = lastQuestionData.question;

            displayQuestion(currentQuestion, lastQuestionData.answer); // Restore question with previous answer

            if (questionHistory.length === 0) {
                $("#prev-btn").prop("disabled", true);
            }

            $("#next-btn").prop("disabled", false);
        }
    }

    function displayQuestion(data, selectedAnswer = null) {
        $("#question-title").text(data.title);
        currentQuestion = data;
        $("#options-container").html("");

        let optionsHtml = "";
        data.options.forEach((option) => {
            optionsHtml += `
                <label>
                    <input type="radio" name="question_${data.id}" value="${option.value}" class="answer-option"> ${option.text}
                </label><br>
            `;
        });
        $("#options-container").html(optionsHtml);

        if (selectedAnswer !== null) {
            $(`input[name='question_${data.id}'][value='${selectedAnswer}']`).prop("checked", true);
        }

        $(".answer-option").on("change", function() {
            $("#next-btn").prop("disabled", false);
            updateProgress();
            totalScore += parseInt($(this).val());
        });
    }

    function getResultInterpretation(score) {
        if (score >= 1 && score <= 10) return "These ups and downs are considered normal.";
        else if (score >= 11 && score <= 16) return "Mild mood disturbance.";
        else if (score >= 17 && score <= 20) return "Borderline clinical depression.";
        else if (score >= 21 && score <= 30) return "Moderate depression.";
        else if (score >= 31 && score <= 40) return "Severe depression.";
        else return "Extreme depression.";
    }

    $(document).ready(function() {
        $("#next-btn").prop("disabled", true);
        $("#prev-btn").prop("disabled", true);
    });
</script>





                </div>
            </div>
        </div>
    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

   <!-- Bootstrap core JavaScript-->
<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Core plugin JavaScript-->
<script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

<!-- Custom scripts for all pages-->
<script src="{{ asset('js/sb-admin-2.min.js') }}"></script>


</body>

</html>