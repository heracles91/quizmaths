<?php
    session_start();
    include("../../fonctions.php");
    connectMaBase();
    include("functions.php");
    $search = mysql_query('SELECT * FROM identifiants WHERE id='.$_SESSION['id'].';');
    $infos = mysql_fetch_array($search);
?>
<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="UTF-8">
	<link href="/quizmaths/css/style.css" rel="stylesheet" />
	<link href="/quizmaths/exos/css/style.css" rel="stylesheet" />
	<title>Calcul Mental</title>
	<link rel="icon" type="image/x-icon" href="/quizmaths/images/icon.png">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
	<link href="/quizmaths/css/daynight.css" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous"> </head>

<body onload="checker()">
	<header>
		<section class="section-header">
			<div class="boutton-menu" style="display: none; width: 210px;"> <a onclick="displayMenu()" style="width: 40px; cursor:pointer;">&#9776;</a>
				<ul id="menu" class="hidemenu">
					<li><a href="/quizmaths/accueil">Accueil</a></li>
					<li><a href="/quizmaths/cours-et-lecons">Cours, Leçons</a></li>
					<li><a href="exercices">Exercices, Quizz</a></li>
					<?php
                        if ($_SESSION['logged_in'])
                        {
                            echo ('<li><a href="/quizmaths/moncompte">' . $infos['prenom'] . '</a></li>');
                        }
                        else
                        {
                            echo ('<li><a href="login">Me connecter</a></li>');
                        }
                    ?>
						<li><a href="mailto:jadeg2003@icloud.com">Contact</a></li>
				</ul>
			</div>
			<ul>
				<li><a href="/quizmaths/accueil">Accueil</a></li>
				<li><a href="/quizmaths/cours-et-lecons">Cours, Leçons</a></li>
				<li><a href="exercices">Exercices, Quizz</a></li>
			</ul> <img class="logo" src="/quizmaths/images/icon.png" alt="Logo du site">
			<ul>
				<?php
                    if ($_SESSION['logged_in'])
                    {
                        echo ('<li id="compte"><a href="/quizmaths/moncompte">' . $infos['prenom'] . '</a></li>');
                    }
                    else
                    {
                        echo ('<li id="compte"><a href="login">Me connecter</a></li>');
                    }
                ?>
                <div style="display: flex;justify-content: space-around;align-items: center;">
                    <form action="" class="searchbar">
                        <input type="search"> <i class="fa fa-search"></i> </form>
                    <div class="wrapper">
                        <div class="toggle">
                            <input class="toggle-input" name="nightmodecheckbox" type="checkbox" />
                            <div class="toggle-bg"></div>
                            <div class="toggle-switch">
                                <div class="toggle-switch-figure"></div>
                                <div class="toggle-switch-figureAlt"></div>
                            </div>
                        </div>
                    </div>
                </div>
			</ul>
		</section>
	</header>
	<div id="search_page"></div>
	<main>
		<h1>Calcul mental</h1>
		<div class="quiz">
			<?php $quizanswers = calculMental(); ?>
		</div>
	<div class="quiz-result"></div>
	</main>
	<script type="text/javascript" src="/quizmaths/cookies/daynight.js"></script>
	<script type="text/javascript" src="/quizmaths/js/navbar.js"></script>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<?php
        $themeClass = '';
        if (!empty($_COOKIE['theme']))
        {
            if ($_COOKIE['theme'] == 'dark')
            {
                $themeClass = 'dark-theme';
                echo ('<script type="text/javascript">
                        var x = document.querySelector("input[name=nightmodecheckbox]");
                        x.checked = true;
                        setNightMode();
                        </script>');
            }
            else if ($_COOKIE['theme'] == 'light')
            {
                $themeClass = 'light-theme';
            }
        }
    ?>
    <script>
        var Quiz = function() {
            var self = this;
            this.init = function() {
                self._bindEvents();
            }
            this.correctAnswers = [{
                question: 1,
                answer: '<?php echo ($quizanswers[1]); ?>'
            }, {
                question: 2,
                answer: '<?php echo ($quizanswers[2]); ?>'
            }, {
                question: 3,
                answer: '<?php echo ($quizanswers[3]); ?>'
            }, {
                question: 4,
                answer: '<?php echo ($quizanswers[4]); ?>'
            }, {
                question: 5,
                answer: '<?php echo ($quizanswers[5]); ?>'
            }, {
                question: 6,
                answer: '<?php echo ($quizanswers[6]); ?>'
            }, ]
            this._pickAnswer = function($answer, $answers) {
                $answers.find('.quiz-answer').removeClass('active');
                $answer.addClass('active');
            }
            this._calcResult = function() {
                var numberOfCorrectAnswers = 0;
                $('ul[data-quiz-question]').each(function(i) {
                    var $this = $(this),
                        chosenAnswer = $this.find('.quiz-answer.active').data('quiz-answer'),
                        correctAnswer;
                    for(var j = 0; j < self.correctAnswers.length; j++) {
                        var a = self.correctAnswers[j];
                        if(a.question == $this.data('quiz-question')) {
                            correctAnswer = a.answer;
                        }
                    }
                    if(chosenAnswer == correctAnswer) {
                        numberOfCorrectAnswers++;
                        // highlight this as correct answer
                        $this.find('.quiz-answer.active').addClass('correct');
                    } else {
                        $this.find('.quiz-answer[data-quiz-answer="' + correctAnswer + '"]').addClass('correct');
                        $this.find('.quiz-answer.active').addClass('incorrect');
                    }
                });
                if(numberOfCorrectAnswers < 3) {
                    return {
                        code: 'bad',
                        text: "Dommage.. Réessaye encore !"
                    };
                } else if(numberOfCorrectAnswers == 3 || numberOfCorrectAnswers == 4) {
                    return {
                        code: 'mid',
                        text: 'Tu y es preque !'
                    };
                } else if(numberOfCorrectAnswers > 4) {
                    return {
                        code: 'good',
                        text: 'R.AS., tu connais tes tables de multiplications'
                    };
                }
            }
            this._isComplete = function() {
                var answersComplete = 0;
                $('ul[data-quiz-question]').each(function() {
                    if($(this).find('.quiz-answer.active').length) {
                        answersComplete++;
                    }
                });
                if(answersComplete >= 6) {
                    return true;
                } else {
                    return false;
                }
            }
            this._showResult = function(result) {
                $('.quiz-result').addClass(result.code).html(result.text);
            }
            this._bindEvents = function() {
                $('.quiz-answer').on('click', function() {
                    var $this = $(this),
                        $answers = $this.closest('ul[data-quiz-question]');
                    self._pickAnswer($this, $answers);
                    if(self._isComplete()) {
                        // scroll to answer section
                        $('html, body').animate({
                            scrollTop: $('.quiz-result').offset().top
                        });
                        self._showResult(self._calcResult());
                        $('.quiz-answer').off('click');
                    }
                });
            }
        }
        var quiz = new Quiz();
        quiz.init();
    </script>
</body>

</html>