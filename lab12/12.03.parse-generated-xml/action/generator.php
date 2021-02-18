<?php
/**
 * Created by PhpStorm.
 * User: Marwan
 * Date: 12/14/16
 */

$slides_info = [
  'subject' => "Introduction to Web Development",
  'author' => ['Albert Romeu', 'Jorge Sanz'],
  'source' => "http://slides.com/alrocar/intro-web-dev/fullscreen",
  'slide' => [
    [
      'index' => 1,
      'title' => 'Agenda',
      'content' => [
        'enumerate' => [
          'type' => 'numbers',
          'item' => ['HTML', 'CSS', 'JavaScript']
        ]
      ]
    ],
    [
      'index' => 2,
      'title' => 'Tools',
      'content' => [
        'points' => [
          'item' => ['A text editor', 'A browser', 'A web server']
          ]
      ]
    ],
    [
      'index' => 3,
      'title' => 'HTML',
      'content' => [
        'points' => [
          'item' => ['Hyper Text Markup Language', 'Standard for writing web pages', 'HTML Tags - 1991',
          'HTML 2.0 - 1995', 'HTML 4.0 - 1997', 'HTML 5.0 - 2014']
          ]
      ]
    ],
    [
      'index' => 4,
      'title' => 'WHAT IS HTML?',
      'content' => [
        'paragraph' => 'WEB PAGES that run in a web browser (client side)',
        'photo' => 'images/example.png',
      ]
    ]
  ]
];

header('Content-Type: text/xml');

echo '<?xml version="1.0" encoding="utf-8" ?>'."\n";
echo "<slides>\n";

foreach ($slides_info as $key => $value) {
  if (is_array($value)) {
    if ($key == 'slide') {
      foreach ($value as $item) {
        echo "<$key index=\"{$item['index']}\">";

        foreach ($item as $k => $q) {
          if ($k != 'index') {
            echo "<$k>";
            if (is_array($q)) {
              foreach ($q as $w => $r) {
                if ($w == 'enumerate' || $w == 'points') {
                  if (isset($r['type'])) {
                    echo "<$w type=\"{$r['type']}\">";
                  } else {
                    echo "<$w>";
                  }
                  foreach ($r['item'] as $e) {
                    echo '<item>';
                    echo $e;
                    echo '</item>';
                  }
                  echo "</$w>";
                } elseif ($w == 'paragraph') {
                  echo "<$w>" . htmlspecialchars($r) . "</$w>";
                } elseif ($w == 'photo') {
                  echo "<$w source=\"$r\" />";
                }
              }
            } else {
              echo $q;
            }
            echo "</$k>";
          }
        }


        echo "</$key>";
      }
    } elseif ($key == 'author') {
      foreach ($value as $item) {
        echo "<{$key}>$item</{$key}>";
      }
    }
  } else {

    echo "<{$key}>$value</{$key}>";
  }
}



echo "</slides>\n";

