<?php
$available_locales = array('uk', 'ru', 'en', 'be');
define('DEFAULT_LOCALE', 'uk');
$languages = array('en'=>'English', 'be'=>'Беларускую', 'ru'=>'Русский', 'uk'=>'Українська');

$locale = isset($_GET['locale']) && in_array($_GET['locale'], $available_locales) ? $_GET['locale'] : DEFAULT_LOCALE;
$GLOBALS['locale'] = $locale;

switch ($locale) {
  case 'uk':
    define('TITLE', 'Українські підручники та карти. Всесвітня історія, історія України, географія.');
    define('META_DESCRIPTION', 'Навчальні матеріали, конспекти і підручники, карти та питання з географії, всесвітньої історії та історії України.');
    define('SYNOPSIS', 'конспект');
    define('TEXTBOOK', 'підручник');
    define('GEOGRAPHY', 'Географія');
    define('WORLD_HISTORY', 'Всесвітня історія');
    define('UKRAINE_HISTORY', 'Історія України');
    define('ANSWER', 'Відповідь');
    define('SEARCH', 'Пошук');
    define('SEARCH_RESULTS', 'Результати пошуку');
    define('NO_RESULTS', 'На жаль, за Вашим запитом нічого не знайдено.');
    define('ARTICLES', 'Статті');
    define('ADVERTISING_SUFFIX', ' <i style="color:grey;">(реклама)</i>');
    break;
  case 'ru':
    define('TITLE', 'Украинские учебники и карты. Всемирная история, история Украины, география.');
    define('META_DESCRIPTION', 'Учебные материалы, конспекты и учебники, карты и вопросы по географии, всемирной истории и истории Украины.');
    define('SYNOPSIS', 'конспект');
    define('TEXTBOOK', 'учебник');
    define('GEOGRAPHY', 'География');
    define('WORLD_HISTORY', 'Всемирная история');
    define('UKRAINE_HISTORY', 'История Украины');
    define('ANSWER', 'Ответ');
    define('SEARCH', 'Поиск');
    define('SEARCH_RESULTS', 'Результаты поиска');
    define('NO_RESULTS', 'К сожалению, по Вашему запросу ничего не найдено.');
    define('ARTICLES', 'Статьи');
    define('ADVERTISING_SUFFIX', ' <i style="color:grey;">(реклама)</i>');
    break;
  case 'en':
    define('TITLE', 'Ukrainian textbooks and maps. World History, History of Ukraine, Geography.');
    define('META_DESCRIPTION', 'Educational materials, compendiums and textbooks, maps, and questions on geography, world history and the history of Ukraine.');
    define('SYNOPSIS', 'compendium');
    define('TEXTBOOK', 'textbook');
    define('GEOGRAPHY', 'Geography');
    define('WORLD_HISTORY', 'World History');
    define('UKRAINE_HISTORY', 'History of Ukraine');
    define('ANSWER', 'Answer');
    define('SEARCH', 'Search');
    define('SEARCH_RESULTS', 'Search Results');
    define('NO_RESULTS', 'Sorry, no results have been found.');
    define('ARTICLES', 'Articles');
    define('ADVERTISING_SUFFIX', ' <i style="color:grey;">(advertising)</i>');
    break;
  case 'be':
    define('TITLE', 'Ўкраінскі падручнікаў і карты. Сусветная гісторыя, гісторыя Украіны, геаграфія.');
    define('META_DESCRIPTION', 'Навучальныя матэрыялы, канспекты і падручнікі, карты і пытанні па геаграфіі, сусветнай гісторыі і гісторыі Украіны.');
    define('SYNOPSIS', 'канспект');
    define('TEXTBOOK', 'падручнік');
    define('GEOGRAPHY', 'Геаграфія');
    define('WORLD_HISTORY', 'Сусветная гісторыя');
    define('UKRAINE_HISTORY', 'Гісторыя Украіны');
    define('ANSWER', 'Адказ');
    define('SEARCH', 'Пошук');
    define('SEARCH_RESULTS', 'Вынікі пошуку');
    define('NO_RESULTS', 'На жаль, па Вашым запыце нічога не знойдзена.');
    define('ARTICLES', 'Артыкулы');
    define('ADVERTISING_SUFFIX', ' <i style="color:grey;">(рэклама)</i>');
    break;
}
$title = 'title_'.$locale;
?>
