<?php
function t($key) {
  switch ($key) {
    case 'synopsis': return SYNOPSIS; break;
    case 'textbook': return TEXTBOOK; break;
  }
}

function entry_path($entry, $locele) {
  switch ($entry['level']) {
    case 1: return '/'.$locele.'-'.$entry['category'].'/';
    case 2: return '/'.$locele.'-'.$entry['course'].'/';
    case 3: return '/'.$locele.'-'.$entry['course'].'/'.$entry['id'].'.html';
  }
}

function show_entry_path($entry) {
  return '/'.$GLOBALS['locale'].'-'.$entry['course'].'/'.$entry['id'].'.html';
}

function show_entry_content($entry) {
  $translation = "content/pages/$entry[dir2]/$entry[text_file]_$GLOBALS[locale].htm";
  if (file_exists($translation)) {
    require($translation);
  } else {
    require("content/pages/$entry[dir2]/$entry[text_file].htm");
  }
}

function files_dir($entry) {
  switch ($entry['dir2']) {
    case 'wh6b': return 'wh6a'; break;
    case 'wh11b': return 'wh11a'; break;
    default: return $entry['dir2'];
  }
}

function question_answers($question) {
  $answers = array();
  foreach ($question as $tag => $node) {
    if ($tag == 'answer') {
      $answers[] = $node;
    }
  }
  return $answers;
}

function question_variants($question) {
  $variants = array();
  foreach ($question as $tag => $node) {
    if ($tag == 'variant') {
      foreach ($node as $item) {
        $variants[] = $item;
      }
    }
  }
  return $variants;
}

function correct_answers($question, $LETTERS) {
  if ($question['simple'] == 'False') {
    $pairs = array();
    foreach (question_variants($question) as $index => $item) {
      if ($item['flag'] != '0') {
        $pairs[] = $item['flag'].' - '.$LETTERS[$index];
      }
    }
    sort($pairs);
    return join(', ', $pairs);
  } else {
    $correct_letters = array();
    $index = 0;
    foreach ($question as $answer) {
      if ($answer['flag'] == '1') {
        $correct_letters[] = $LETTERS[$index];
      }
      $index++;
    }
    return join(', ', $correct_letters);
  }
}

function convert_xml_entry_to_array($object){
  $res = array();
  foreach ($object as $key => $node) {
    if ($key == 'level' || $key == 'sequence') {
      $res[$key] = intval($node);
    } else {
      $res[$key] = strval($node);
    }
  }
  return $res;
}

function cmp_sequence($a, $b) {
  return $a['sequence'] - $b['sequence'];
}

function escapehtmlchars($string) {
  return str_replace(array('&', "'", '"', '<', '>'), array('&amp;', '&apos;', '&quot;', '&lt;', '&gt;'), $string);
}

function article_path($article) {
  if ($article['slug']) {
    return '/article/'.$article['id'].'-'.$article['slug'].'.html';
  } else {
    return '/article/'.$article['id'].'.html';
  }
}

function index_path($locale) {
  if (isset($_GET['q'])) {
    return '/'.$locale.'/?q='.urlencode($_GET['q']);
  } else {
    if ($locale == 'uk') {
      return '/';
    } else {
      return '/'.$locale;
    }
  }
}
?>
