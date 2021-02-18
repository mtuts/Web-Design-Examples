/**
 * Created by Marwan on 11/1/16.
 */

var my_canvas, ctx, temp_image, border_size, pen_line_list;
var x1, y1, x2, y2, mouse_down_flag, border_color, background_color;

var load_handler = function () {
  my_canvas = document.querySelector('#my-canvas canvas');
  border_color = document.querySelector('#border-picker-button');
  background_color = document.querySelector('#background-picker-button');
  border_size = document.querySelector('input[name=border-size]');
  pen_line_list = [];

  ctx = my_canvas.getContext('2d');

  document.querySelector('#clear-button').addEventListener('click', function() {
    if (confirm('Are you sure want clear your canvas?'))
      clear_canvas(true);
  });

  my_canvas.addEventListener('mousedown', mouseDown);

  my_canvas.addEventListener('mousemove', mouseMove);

  my_canvas.addEventListener('mouseup', mouseUp);

  window.addEventListener('keyup', function (e) {
    if (e.keyCode == 27) {
      if (mouse_down_flag) {
        mouse_down_flag = false;
        reset_image();
      }
    }
  });
};

var get_selected_shape = function () {
  return document.querySelector('input[name=shape]:checked').value;
};

var clear_canvas = function (flag) {
  if (flag) temp_image = null;
  ctx.clearRect(0, 0, ctx.canvas.clientWidth, ctx.canvas.clientHeight);
};

var mouseDown = function (e) {
  var pos = getPosition(e);
  x1 = pos.x;
  y1 = pos.y;

  if (get_selected_shape() == 'pen') {
    pen_line_list = [{x: pos.x, y:pos.y}];
  }
  mouse_down_flag = true;
};

var mouseMove = function (e) {
  if (mouse_down_flag) {
    var pos = getPosition(e);
    x2 = pos.x;
    y2 = pos.y;

    if (get_selected_shape() == 'pen') {
      pen_line_list.push({x: pos.x, y:pos.y});
    }
    live_draw(false);
  }
};

var mouseUp = function (e) {
  if (mouse_down_flag) {
    var pos = getPosition(e);
    x2 = pos.x;
    y2 = pos.y;
    if (get_selected_shape() == 'pen') {
      pen_line_list.push({x: pos.x, y:pos.y});
    }
    live_draw(true);
  }
  mouse_down_flag = false;
  temp_image = my_canvas.toDataURL('image/png');
};

var getPosition = function (evt) {
  var rec = my_canvas.getBoundingClientRect();
  return {
    x: evt.clientX - rec.left,
    y: evt.clientY - rec.top
  }
};

var reset_image = function () {
  var img = document.createElement('img');
  img.src = temp_image;
  clear_canvas();
  ctx.drawImage(img, 0, 0);
};

var live_draw = function (final_draw) {
  var draw_option = document.querySelector('input[name=draw-option]:checked');
  var minX = Math.min(x1, x2),
    maxX = Math.max(x1, x2),
    minY = Math.min(y1, y2),
    maxY = Math.max(y1, y2),
    width = maxX - minX,
    height = maxY - minY,
    min_width = Math.min(width, height),
    radius = Math.sqrt(Math.pow(width, 2) + Math.pow(height, 2)),
    text, i;

  if (!final_draw) {
    reset_image();
  }

  ctx.beginPath();
  ctx.strokeStyle = border_color.value;
  ctx.fillStyle = background_color.value;
  ctx.lineWidth = border_size.value;
  switch (get_selected_shape()) {
    case 'pen':
      ctx.moveTo(pen_line_list[0].x, pen_line_list[0].y);
      for (i = 1; i < pen_line_list.length; i++) {
        ctx.lineTo(pen_line_list[i].x, pen_line_list[i].y);
      }
      break;
    case 'line':
      ctx.moveTo(x1, y1);
      ctx.lineTo(x2, y2);
      break;
    case 'rectangle':
      ctx.rect(minX, minY, width, height);
      break;
    case 'square':
      if (x1 > x2) {
        minX = x1 - min_width;
      }
      if (y1 > y2) {
        minY = y1 - min_width;
      }
      ctx.rect(minX, minY, min_width, min_width);
      break;
    case 'circle':
      ctx.arc(x1, y1, radius, 0, 2 * Math.PI);
      break;
  }

  if (get_selected_shape() == 'text') {

    if (final_draw) {
      text = prompt('Enter your text?');
      ctx.textAlign = 'left';
      ctx.font = 'bold 20px Arial';
      switch (draw_option.value) {
        case 'stroke':
          ctx.strokeText(text, x2, y2);
          break;
        case 'fill':
          ctx.fillText(text, x2, y2);
          break;
        case 'both':
          ctx.fillText(text, x2, y2);
          ctx.strokeText(text, x2, y2);
          break;
      }
    }
  } else {
    switch (draw_option.value) {
      case 'stroke':
        ctx.stroke();
        break;
      case 'fill':
        ctx.fill();
        break;
      case 'both':
        ctx.fill();
        ctx.stroke();
        break;
    }
  }

  if (final_draw) {
    document.querySelector('#save-button').href = my_canvas.toDataURL('image/png');
  }

};


window.addEventListener('load', load_handler);