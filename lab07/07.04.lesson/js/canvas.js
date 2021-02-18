/**
 * Created by Marwan on 10/31/16.
 */


var my_canvas, ctx;

window.onload = function () {
  my_canvas = document.querySelector('#my-canvas canvas');

  ctx = my_canvas.getContext('2d');

  ctx.beginPath();
  ctx.moveTo(10, 10);
  ctx.lineTo(100, 100);
  ctx.strokeStyle = 'red';
//    ctx.closePath();
  ctx.stroke();

  ctx.beginPath();
  ctx.moveTo(100, 10);
  ctx.lineTo(300, 100);
  ctx.strokeStyle = 'green';
  ctx.stroke();

  ctx.beginPath();
  ctx.rect(200, 50, 300, 150);
  ctx.strokeStyle = 'blue';
  ctx.stroke();

  ctx.beginPath();
  ctx.rect(200, 250, 290, 150);
  ctx.fillStyle = 'skyblue';
  ctx.fill();

  ctx.fillStyle = 'pink';
  ctx.fillRect(400, 450, 50, 100);

  ctx.beginPath();
  ctx.strokeStyle = '#938584';
  ctx.arc(300, 200, 80, 0, -120 * Math.PI / 180.0, true);
  ctx.stroke();

  ctx.beginPath();
  ctx.fillStyle = '#938584';
  ctx.arc(100, 220, 50, 0, 2 * Math.PI, true);
  ctx.fill();

  ctx.beginPath();
  ctx.textAlign = 'center';
  ctx.font = '30px Arial';
  ctx.strokeText('Marwan', 600, 100, 100);

  ctx.beginPath();
  ctx.textAlign = 'center';
  ctx.font = '30px Arial';
  ctx.fillStyle = 'green';
  ctx.fillText('Marwan Alsahafi', 550, 300);


  // a crescent

  ctx.beginPath();
  ctx.fillStyle = '#6CAEE5';
  ctx.arc(140, 500, 70, -110 * Math.PI / 180.0, 50 * Math.PI / 180.0, true);
  ctx.fill();

  ctx.beginPath();
  ctx.fillStyle = '#FFF';
  ctx.arc(178, 477, 80, -120 * Math.PI / 180.0, 60 * Math.PI / 180.0, true);
  ctx.fill();

};
