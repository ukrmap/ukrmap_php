<?php
$available_locales = array('uk', 'ru', 'en', 'be');
define('DEFAULT_LOCALE', 'uk');
$languages = array('en'=>'English', 'be'=>'Беларускую', 'ru'=>'Русский', 'uk'=>'Українська');

$locale = isset($_GET['locale']) && in_array($_GET['locale'], $available_locales) ? $_GET['locale'] : DEFAULT_LOCALE;
$GLOBALS['locale'] = $locale;

switch ($locale) {
  case 'uk':
    define('TITLE', 'Українські підручники та карти. Всесвітня історія, історія України, географія.');
    define('SYNOPSIS', 'конспект');
    define('TEXTBOOK', 'підручник');
    define('GEOGRAPHY', 'Географія');
    define('WORLD_HISTORY', 'Всесвітня історія');
    define('UKRAINE_HISTORY', 'Історія України');
    define('ANSWER', 'Відповідь');
    define('SEARCH', 'Пошук');
    define('SEARCH_RESULTS', 'Результати пошуку');
    define('NO_RESULTS', 'На жаль, за Вашим запитом нічого не знайдено.');
    break;
  case 'ru':
    define('TITLE', 'Украинские учебники и карты. Всемирная история, история Украины, география.');
    define('SYNOPSIS', 'конспект');
    define('TEXTBOOK', 'учебник');
    define('GEOGRAPHY', 'География');
    define('WORLD_HISTORY', 'Всемирная история');
    define('UKRAINE_HISTORY', 'История Украины');
    define('ANSWER', 'Ответ');
    define('SEARCH', 'Поиск');
    define('SEARCH_RESULTS', 'Результаты поиска');
    define('NO_RESULTS', 'К сожалению, по Вашему запросу ничего не найдено.');
    break;
  case 'en':
    define('TITLE', 'Ukrainian textbooks and maps. World History, History of Ukraine, Geography.');
    define('SYNOPSIS', 'compendium');
    define('TEXTBOOK', 'textbook');
    define('GEOGRAPHY', 'Geography');
    define('WORLD_HISTORY', 'World History');
    define('UKRAINE_HISTORY', 'History of Ukraine');
    define('ANSWER', 'Answer');
    define('SEARCH', 'Search');
    define('SEARCH_RESULTS', 'Search Results');
    define('NO_RESULTS', 'Sorry, no results have been found.');
    break;
  case 'be':
    define('TITLE', 'Ўкраінскі падручнікаў і карты. Сусветная гісторыя, гісторыя Украіны, геаграфія.');
    define('SYNOPSIS', 'канспект');
    define('TEXTBOOK', 'падручнік');
    define('GEOGRAPHY', 'Геаграфія');
    define('WORLD_HISTORY', 'Сусветная гісторыя');
    define('UKRAINE_HISTORY', 'Гісторыя Украіны');
    define('ANSWER', 'Адказ');
    define('SEARCH', 'Пошук');
    define('SEARCH_RESULTS', 'Вынікі пошуку');
    define('NO_RESULTS', 'На жаль, па Вашым запыце нічога не знойдзена.');
    break;
}
$title = 'title_'.$locale;
?>
