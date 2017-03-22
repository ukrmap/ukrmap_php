<?php
echo '<h1>'.$article['title'];
if ($article['advertising']) { echo ADVERTISING_SUFFIX; }
echo '</h1>';

echo $article['content'];

$months = array('01'=>'января', '02'=>'февраля', '03'=>'марта', '04'=>'апреля', '05'=>'мая', '06'=>'июня', '07'=>'июля', '08'=>'августа', '09'=>'сентября', '10'=>'октября', '11'=>'ноября', '12'=>'декабря');
date_default_timezone_set('Europe/Kiev');
$time = strtotime($article['created_on']);
$date = date('j ', $time).$months[date('m', $time)].date(' Y г.', $time);

echo '<div style="float:right;margin-right:45px;font-style:italic;">'.$date.'</div>';
?>
