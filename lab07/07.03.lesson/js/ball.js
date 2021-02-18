/**
 * Created by Marwan on 11/4/16.
 */


/**
 * keyboard keys handler
 */

var moving_box, output, t_id, step_x, step_y;

var load_handler = function () {
  moving_box = document.querySelector('#moving-box');
  output = document.querySelector('#output');

  moving_box.style['left'] = Math.floor(Math.random() * (window.innerWidth - moving_box.offsetWidth)) + "px";
  moving_box.style['top'] = Math.floor(Math.random() * (window.innerHeight - output.offsetHeight - moving_box.offsetHeight)) + "px";

  t_id = setInterval(random_move, 10);

  step_x = 2;
  step_y = 2;
};

var generate_random_color = function () {
  var r, g, b;
  r = Math.floor(Math.random() * 256.0);
  g = Math.floor(Math.random() * 256.0);
  b = Math.floor(Math.random() * 256.0);

  return 'rgb(' + r + ',' + g + ',' + b + ')';
};

var random_move = function () {
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
    step_x = -step_x;
    x = x + step_x;

    moving_box.style.backgroundColor = generate_random_color();
  }
  if (y < 0 || y > (window.innerHeight - output.offsetHeight - moving_box.offsetHeight)) {
    step_y = -step_y;
    y = y + step_y;

    moving_box.style.borderColor = generate_random_color();
  }
  moving_box.style['top'] = y + 'px';
  moving_box.style['left'] = x + 'px';

  println("x = " + x, true);
  println("y = " + y);
  println("step x = " + step_x);
  println("step y = " + step_y);
  println("background-color: " + moving_box.style.backgroundColor);
  println("    border-color: " + moving_box.style.borderColor);
};

var println = function (line, reset) {
  if (reset) {
    output.innerHTML = line + "\n";
  } else {
    output.innerHTML += line + "\n";
  }
};

window.addEventListener('load', load_handler);