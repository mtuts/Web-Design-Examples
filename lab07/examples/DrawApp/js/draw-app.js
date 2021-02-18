/**
 * Created by Marwan on 10/23/16.
 */

var DrawApp = function (canvas_selector) {
  this.board = document.querySelector(canvas_selector);
  this.wrapper = this.board.parentNode;
  this.context = this.board.getContext('2d');
  this.shapes = [];
};

DrawApp.prototype.init = function () {
  var self = this;

  this.resize();
  window.addEventListener('resize', function () {
    self.resize();
    self.redraw();
  });
};

DrawApp.prototype.addLine = function (x1, y1, x2, y2, color, width) {
  this.shapes.push(new Line(x1, y1, x2, y2, color, width));
  this.shapes[this.shapes.length - 1].draw(this.context);
};

DrawApp.prototype.addRect = function (x, y, w, h, r, s_c, f_c, width) {
  this.shapes.push(new Rectangle(x, y, w, h, r, s_c, f_c, width));
  this.shapes[this.shapes.length - 1].draw(this.context);
};

DrawApp.prototype.addSquare = function (x, y, w, r, s_c, f_c, width) {
  this.shapes.push(new Square(x, y, w, r, s_c, f_c, width));
  this.shapes[this.shapes.length - 1].draw(this.context);
};

DrawApp.prototype.addCircle = function (x, y, r, s_c, f_c, width) {
  this.shapes.push(new Circle(x, y, r, s_c, f_c, width));
  this.shapes[this.shapes.length - 1].draw(this.context);
};

DrawApp.prototype.redraw = function () {
  var i;
  this.context.fillStyle = "#FFF";
  this.context.clearRect(0, 0, this.board.offsetWidth, this.board.offsetHeight);
  for (i = 0; i < this.shapes.length; ++i) {
    this.shapes[i].draw(this.context);
  }
};

DrawApp.prototype.resize = function () {
  this.board.width = this.wrapper.offsetWidth - 30;
  this.board.height = this.wrapper.offsetHeight - 30;
};

var Shape = function (x, y, stroke_color, fill_color, stroke_width, name) {
  this.name = name ? name : 'Unknown Shape';
  this.x = x;
  this.y = y;
  this.stroke_color = stroke_color || '#000';
  this.fill_color = fill_color || '#000';
  this.stroke_width = stroke_width || 1;
};

Shape.prototype.draw = function (ctx) {
};

var Line = function (x1, y1, x2, y2, color, width) {
  Shape.call(this, x1, y1, color, null, width, 'Line');
  this.x_to = x2;
  this.y_to = y2;
};

Line.prototype = Object.create(Shape.prototype);

Line.prototype.draw = function (ctx) {
  ctx.save();

  ctx.beginPath();
  ctx.moveTo(this.x, this.y);
  ctx.strokeStyle = this.stroke_color;
  ctx.lineWidth = this.stroke_width;
  ctx.lineTo(this.x_to, this.y_to);
  ctx.stroke();

  ctx.restore();
};

var Rectangle = function (x, y, width, height, rotation, stroke_color, fill_color, stroke_width) {
  Shape.call(this, x, y, stroke_color, fill_color, stroke_width, 'Rectangle');
  this.width = width;
  this.height = height;
  this.rotation = rotation || 0;

  this.filled = fill_color ? true : false;
  this.stroked = stroke_color ? true : false;
};

Rectangle.prototype = Object.create(Shape.prototype);

Rectangle.prototype.draw = function (ctx) {
  ctx.save();

  ctx.beginPath();
  ctx.strokeStyle = this.stroke_color;
  ctx.fillStyle = this.fill_color;
  ctx.lineWidth = this.stroke_width;


  ctx.translate(this.x, this.y);

  ctx.rotate(this.rotation * Math.PI / 180.0);

  ctx.translate(-this.x, -this.y);

  ctx.rect(this.x, this.y, this.width, this.height);

  if (this.filled) ctx.fill();
  if (this.stroked || !this.filled) ctx.stroke();

  ctx.restore();
};

var Square = function (x, y, width, rotation, stroke_color, fill_color, stroke_width) {
  Rectangle.call(this, x, y, width, width, rotation, stroke_color, fill_color, stroke_width);
  Shape.call(this, x, y, stroke_color, fill_color, stroke_width, 'Square');
};

Square.prototype = Object.create(Rectangle.prototype);


var Circle = function (x, y, radius, stroke_color, fill_color, stroke_width) {
  Shape.call(this, x, y, stroke_color, fill_color, stroke_width, 'Circle');
  this.radius = radius;

  this.filled = fill_color ? true : false;
  this.stroked = stroke_color ? true : false;
};

Circle.prototype = Object.create(Shape.prototype);

Circle.prototype.draw = function (ctx) {
  ctx.save();

  ctx.beginPath();
  ctx.strokeStyle = this.stroke_color;
  ctx.fillStyle = this.fill_color;
  ctx.lineWidth = this.stroke_width;
  ctx.arc(this.x, this.y, this.radius, 0, 2 * Math.PI);


  if (this.filled) ctx.fill();
  if (this.stroked || !this.filled) ctx.stroke();

  ctx.restore();
};












