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

  if  (contents.enumerate && contents.enumerate.item.length > 0) {
    if (contents.enumerate.type == 'numbers') {
      ul = document.createElement('ol');
      cont.appendChild(ul);

      for (j = 0; j < contents.enumerate.item.length; ++j) {
        li = document.createElement('li');

        li.innerHTML = contents.enumerate.item[j];

        ul.appendChild(li);
      }

    }

  }

  if  (contents.points && contents.points.item.length > 0) {
    ul = document.createElement('ul');
    cont.appendChild(ul);

    for (j = 0; j < contents.points.item.length; ++j) {
      li = document.createElement('li');

      li.innerHTML = contents.points.item[j];

      ul.appendChild(li);
    }
  }

  if (contents.paragraph) {
    tmp2 = document.createElement('p');
    tmp2.innerHTML = contents.paragraph;
    cont.appendChild(tmp2);
  }

  if (contents.photo) {
    tmp2 = document.createElement('img');
    tmp2.setAttribute('src', contents.photo);
    tmp2.setAttribute('width', '100%');
    cont.appendChild(tmp2);
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
    q += authors[i];
  }
  a.innerHTML = "By: " + q;
}


function load_slides() {
  // using Ajax to request JSON file from server
  var xh;
  if (window.XMLHttpRequest) {
    // check browser support IE7+, firefox, Chrome, Opera, Safari
    xh = new XMLHttpRequest();
  } else {
    xh = new ActiveXObject("Microsoft.XMLHTTP");
  }

  xh.onreadystatechange = function() {
    var i, response, obj;
    if (xh.readyState == XMLHttpRequest.DONE) {
      if (xh.status == 200) {
        response = xh.responseText;

        obj = JSON.parse(response);

        set_info(obj.subject, obj.author);

        for (i = 0; i < obj.slide.length; i++) {
          addSlide(obj.slide[i].index, obj.slide[i].title, obj.slide[i].content);
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