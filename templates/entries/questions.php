<?php
$LETTERS = array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p');
$xmlfile = $entry['xmlfile'];
$xmlfile_locale = str_replace('.xml', "_$locale.xml", $xmlfile);
if (file_exists($xmlfile_locale)) {
  $xmlfile = $xmlfile_locale;
}

$xml = file_get_contents($xmlfile);
$testing = simplexml_load_string($xml);

echo '<h1>'.$entry[$title].'</h1>';
// echo '<h1>'.$testing['name'].'</h1>';

foreach ($testing as $question) {
  echo '<div class="question">';
  echo '<h4>'.$question['text'].'</h4>';
  echo '<br/>';

  if ($question['simple'] == 'False') {
    echo '<ol type="1">';
    foreach (question_answers($question) as $answer) {
      echo "<li>$answer[text]</li>";
    }
    echo '</ol>';

    echo '<div style="margin-left: 4%;">';
    echo '<ol type="a">';
    foreach (question_variants($question) as $item) {
      echo "<li>$item[text]</li>";
    }
    echo '</ol>';
    echo '</div>';

  } else {
    echo '<ol type="a">';
    foreach ($question as $answer) {
      echo '<li>'.$answer['text'].'</li>';
    }
    echo '</ol>';
  }

  echo '</div>';

  echo '<div class="correct-answer">';
  echo ANSWER.': '.correct_answers($question, $LETTERS);
  echo '</div>';
}

echo '<br/>';
require('templates/entries/pager.php');
?>
