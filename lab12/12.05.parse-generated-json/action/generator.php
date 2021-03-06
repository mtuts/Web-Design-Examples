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

header('Content-Type: text/json');

echo json_encode($slides_info);


