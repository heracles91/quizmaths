<?php
function calculMental()
{
    for ($print = 1;$print <= 6;$print++)
    {
        $chiffre1 = rand(0, 10);
        $chiffre2 = rand(0, 10);
        //Tant que les deux chiffres sont 0 on reprends un nombre entre -10 et 20
        while ($chiffre1==0 and $chiffre2==0)
        {
            $chiffre2 = rand(0, 10);
        }
        if ($chiffre1 == 0)
        {
            $a = $chiffre1 - ($chiffre2);
            $b = $chiffre1 + ($chiffre2);
            $c = $chiffre1 * $chiffre2;
            $d = 10 * ($chiffre2);
        }
        else if ($chiffre2 == 0)
        {
            $a = $chiffre2 - ($chiffre1);
            $b = $chiffre2 + ($chiffre1);
            $c = $chiffre2 * $chiffre1;
            $d = 10 * ($chiffre1);
        }
        else
        {
            $a = $chiffre1 * ($chiffre2 + 1);
            $b = $chiffre1 * ($chiffre2 + 2);
            $c = $chiffre1 * $chiffre2;
            $d = $chiffre1 * ($chiffre2 - 1);
        }
        $numbers = array(
            $a,
            $b,
            $c,
            $d
        );
        shuffle($numbers);
        $operateur = "x";
        $question = $chiffre1 . " x " . $chiffre2;
        $abcd = array("a", "b", "c", "d");
        for ($i = 0;$i <= 3;$i++)
        {
            if ($numbers[$i] == $chiffre1 * $chiffre2)
            {
                $letters = $abcd[$i];
            }
        }
        echo '<div>';
        echo ('<h2 class="quiz-question">Q' . $print . ': ' . $question . '</h2>');
        echo ('<ul data-quiz-question="' . $print . '">');
        echo ('<li class="quiz-answer" data-quiz-answer="a">' . $numbers[0] . '</li>');
        echo ('<li class="quiz-answer" data-quiz-answer="b">' . $numbers[1] . '</li>');
        echo ('<li class="quiz-answer" data-quiz-answer="c">' . $numbers[2] . '</li>');
        echo ('<li class="quiz-answer" data-quiz-answer="d">' . $numbers[3] . '</li>');
        echo ('</ul>');
        echo '</div>';
        $answer[$print]=$letters;
    }
    return $answer;
}
?>