/**
 * Created by Marwan on 12/14/16.
 */

var slides_container;
var slides = [];
var current = 0;

function clear_slides() {
  slides = [];
  current = 0;
  slides_container.innerHTML = "";
}

function prevSlide() {
  if (current > 0) {
    var prev, c, q;
    current--;
    q = slides[current];
    c = document.querySelector('.slide:not(.hidden)');
    prev = document.querySelector('.slide[data-index="' + q + '"]')
    if (c) c.classList.add('hidden');
    if (prev) prev.classList.remove('hidden');
  }
}

function nextSlide() {
  if (current < slides.length - 1) {
    var next, c, q;
    current++;
    q = slides[current];
    c = document.querySelector('.slide:not(.hidden)');
    next = document.querySelector('.slide[data-index="' + q + '"]');
    if (c) c.classList.add('hidden');
    if (next) next.classList.remove('hidden');
  }
}

function addSlide(index, title, contents) {
  var slide = document.createElement('div');
  var head = document.createElement('h2');
  var cont = document.createElement('div');
  var tmp1, tmp2, i, j, ul, li;

  slides.push(index);

  head.innerHTML = title;
  slide.appendChild(head);

  tmp1 = contents.getElementsByTagName('enumerate');
  if (tmp1.length > 0) {
    for (i = 0; i < tmp1.length; i++) {
      tmp2 = tmp1[i].getElementsByTagName('item');
      if  (tmp2.length > 0) {
        if (tmp1[i].getAttribute('type') == 'numbers') {
          ul = document.createElement('ol');
          cont.appendChild(ul);

          for (j = 0; j < tmp2.length; ++j) {
            li = document.createElement('li');

            li.innerHTML = tmp2[j].firstChild.nodeValue;

            ul.appendChild(li);
          }

        }
      }
    }

  }
  tmp1 = contents.getElementsByTagName('points');
  if (tmp1.length > 0) {
    for (i = 0; i < tmp1.length; i++) {
      tmp2 = tmp1[i].getElementsByTagName('item');
      if  (tmp2.length > 0) {
        ul = document.createElement('ul');
        cont.appendChild(ul);

        for (j = 0; j < tmp2.length; ++j) {
          li = document.createElement('li');

          li.innerHTML = tmp2[j].firstChild.nodeValue;

          ul.appendChild(li);
        }
      }
    }
  }
  tmp1 = contents.getElementsByTagName('paragraph');
  if (tmp1.length > 0) {
    for (i = 0; i < tmp1.length; i++) {
      tmp2 = document.createElement('p');
      tmp2.innerHTML = tmp1[i].firstChild.nodeValue;
      cont.appendChild(tmp2);
    }
  }
  tmp1 = contents.getElementsByTagName('photo');
  if (tmp1.length > 0) {
    for (i = 0; i < tmp1.length; i++) {
      tmp2 = document.createElement('img');
      tmp2.setAttribute('src', tmp1[i].getAttribute('source'));
      tmp2.setAttribute('width', '100%');
      cont.appendChild(tmp2);
    }
  }

  slide.appendChild(cont);

  slide.setAttribute('data-index', index);
  slide.classList.add('slide');

  if (index > 1) {
    slide.classList.add('hidden');
  }

  slides_container.appendChild(slide);
}

function set_info(subject, authors) {
  var p = document.querySelector('#header');
  var a = document.querySelector('.authors');
  var q = "", i;

  p.innerHTML = subject;

  for (i = 0; i < authors.length; ++i) {
    if (i > 0) q += ", ";
    if (i > 0 && i == authors.length - 1) q += "and ";
    q += authors[i].firstChild.nodeValue;
  }
  a.innerHTML = "By: " + q;
}


function load_slides() {
  // using Ajax to request XML file from server
  var xh;
  if (window.XMLHttpRequest) {
    // check browser support IE7+, firefox, Chrome, Opera, Safari
    xh = new XMLHttpRequest();
  } else {
    xh = new ActiveXObject("Microsoft.XMLHTTP");
  }

  xh.onreadystatechange = function() {
    var i, index, title, authors, content, y;
    if (xh.readyState == XMLHttpRequest.DONE) {
      if (xh.status == 200) {
        title = xh.responseXML.documentElement.getElementsByTagName("subject");
        authors = xh.responseXML.documentElement.getElementsByTagName("author");

        set_info(title[0].firstChild.nodeValue, authors);

        y = xh.responseXML.documentElement.getElementsByTagName("slide");

        for (i = 0; i < y.length; i++) {
          index = y[i].getAttribute('index');
          title = y[i].getElementsByTagName('title')[0].firstChild.nodeValue;
          content = y[i].getElementsByTagName('content')[0];

          addSlide(index, title, content);
        }
      } else if (xh.status == 400) {
        alert("There was an error 400");
      } else {
        alert("Something else other than 200 was returned");
      } }
  };

  xh.open("GET", "action/generator.php", true);
  xh.send();
}


window.onload = function () {
  var prev = document.querySelector('#prev-btn');
  var next = document.querySelector('#next-btn');
  var reload = document.querySelector('#load-slides');

  slides_container = document.querySelector('#slides');

  prev.addEventListener('click', function (e) {
    prevSlide();
  });

  next.addEventListener('click', function (e) {
    nextSlide();
  });

  reload.addEventListener('click', function (e) {
    clear_slides();
    load_slides();
  });


};