/**
 * Created by Marwan on 11/1/16.
 */


var moving_box, output, t_id, step_x, step_y;
var left_down, right_down, up_down, down_down;
var step, score, score_box, inc;

var load_handler = function () {
  left_down = false;
  right_down = false;
  up_down = false;
  down_down = false;

  step = 10;
  step_x = 0;
  step_y = 0;
  inc = 0;

  score = 0;

  moving_box = document.querySelector('#moving-box');
  output = document.querySelector('#output');
  score_box = document.querySelector('#score');

  moving_box.style['left'] = Math.floor(Math.random() * (window.innerWidth - moving_box.offsetWidth)) + "px";
  moving_box.style['top'] = Math.floor(Math.random() * (window.innerHeight - output.offsetHeight - moving_box.offsetHeight)) + "px";

  window.addEventListener('keyup', function (e) {
    if (e.keyCode >= 37 && e.keyCode <= 40) {
      inc = 0;
    }
    switch (e.keyCode) {
      case 37: // 37 left
        left_down = false;
        if (!right_down)
          step_x = 0;
        else
          step_x = step;
        break;
      case 39: // 39 right
        right_down = false;
        if (!left_down)
          step_x = 0;
        else
          step_x = -step;
        break;
      case 38: // 38 up
        up_down = false;
        if (!down_down)
          step_y = 0;
        else
          step_y = step;
        break;
      case 40: // 40 down
        down_down = false;
        if (!up_down)
          step_y = 0;
        else
          step_y = -step;
        break;
    }
  });

  window.addEventListener('keydown', function (e) {
    var arrow = "";
    if (e.keyCode >= 37 && e.keyCode <= 40) {
      inc++;
    }

    switch (e.keyCode) {
      case 37: // 37 left
        left_down = true;
        arrow = up_down ? 'left-up' : (down_down ? 'left-down' : 'left');
        println(arrow + ' arrow pressed', true);
        step_x = -step - inc;
        apply_move();
        break;
      case 39: // 39 right
        right_down = true;
        arrow = up_down ? 'right-up' : (down_down ? 'right-down' : 'right');
        println(arrow + ' arrow pressed', true);
        step_x = step + inc;
        apply_move();
        break;
      case 38: // 38 up
        up_down = true;
        arrow = left_down ? 'left-up' : (right_down ? 'right-up' : 'up');
        println(arrow + ' arrow pressed', true);
        step_y = -step - inc;
        apply_move();
        break;
      case 40: // 40 down
        down_down = true;
        arrow = left_down ? 'left-down' : (right_down ? 'right-down' : 'down');
        println(arrow + ' arrow pressed', true);
        step_y = step + inc;
        apply_move();
        break;
    }
  });


  random_move_stars();
  t_id = setInterval(function () {
    random_move_stars();
  }, 5000);
};

var increase_score = function () {
  score++;
  if (score >= 5) {
    alert('WOW, you win :) !!!');
    reset_score();
  }
  update_score();
};

var reset_score = function () {
  score = 0;
  update_score();
};

var update_score = function () {
  score_box.innerHTML = score;
};

var check_if_overlap_star = function () {
  var stars = document.querySelectorAll('.star');
  var i, x_s, y_s, x_c, y_c;

  x_c = moving_box.style['left'];
  y_c = moving_box.style['top'];
  x_c = parseInt(x_c.substr(0, x_c.toLowerCase().indexOf('px')));
  y_c = parseInt(y_c.substr(0, y_c.toLowerCase().indexOf('px')));

  for (i = 0; i < stars.length; i++) {

    x_s = stars[i].style['left'];
    y_s = stars[i].style['top'];

    x_s = parseInt(x_s.substr(0, x_s.toLowerCase().indexOf('px')));
    y_s = parseInt(y_s.substr(0, y_s.toLowerCase().indexOf('px')));

    if (x_s > x_c && x_s + 20 < x_c + moving_box.offsetWidth
      && y_s > y_c && y_s + 20 < y_c + moving_box.offsetHeight
      && !stars[i].classList.contains('hidden')) {
      increase_score();

      stars[i].classList.add('hidden');
    }
  }

};

var random_move_stars = function () {
  var stars = document.querySelectorAll('.star');
  var i, w, h, c;

  w = Math.floor(Math.random() * (window.innerWidth - 40));
  h = Math.floor(Math.random() * (window.innerHeight - output.offsetHeight - 40));

  for (i = 0; i < stars.length; ++i) {
    stars[i].style['left'] = 10 + Math.floor(Math.random() * w) + 'px';
    stars[i].style['top'] = 10 + Math.floor(Math.random() * h) + 'px';
    c = generate_random_color();
    stars[i].style.borderBottomColor = c;
    stars[i].querySelector('div').style.borderTopColor = c;

    stars[i].classList.remove('hidden');
  }

  reset_score();
};

var generate_random_color = function () {
  var r, g, b;
  r = Math.floor(Math.random() * 256.0);
  g = Math.floor(Math.random() * 256.0);
  b = Math.floor(Math.random() * 256.0);

  return 'rgb(' + r + ',' + g + ',' + b + ')';
};

var apply_move = function () {
  var x, y;

  x = moving_box.style['left'];
  y = moving_box.style['top'];
  x = parseInt(x.substr(0, x.toLowerCase().indexOf('px')));
  y = parseInt(y.substr(0, y.toLowerCase().indexOf('px')));

  // move circle to random way by -/+ step
  x += step_x;
  y += step_y;

  // keep circle inside white area
  if (x < 0 || x > (window.innerWidth - moving_box.offsetWidth)) {
    x = x - step_x;
  }
  if (y < 0 || y > (window.innerHeight - output.offsetHeight - moving_box.offsetHeight)) {
    y = y - step_y;
  }
  moving_box.style['top'] = y + 'px';
  moving_box.style['left'] = x + 'px';

  println("x = " + x, false);
  println("y = " + y);
  println("step x = " + step_x);
  println("step y = " + step_y);

  check_if_overlap_star();
};

var println = function (line, reset) {
  if (reset) {
    output.innerHTML = line + "\n";
  } else {
    output.innerHTML += line + "\n";
  }
};


window.onload = load_handler;