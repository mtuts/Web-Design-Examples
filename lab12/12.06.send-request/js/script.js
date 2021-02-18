/**
 * Created by Marwan on 12/15/16.
 */


function toggle_load_status(flag) {
  if (typeof flag == "undefined") {
    flag = ajax_loader_img.classList.contains('hidden');
  }
  if (flag) {
    ajax_loader_img.classList.remove('hidden');
  } else {
    ajax_loader_img.classList.add('hidden');
  }
}

function handle_form_submit() {
  var full_name = names_form.elements['full-name'].value;
  var email = names_form.elements['email'].value;

  toggle_load_status(true);

  var xh = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject("Microsoft.XMLHTTP");

  xh.onreadystatechange = function() {
    var response;
    if (xh.readyState == XMLHttpRequest.DONE) {
      if (xh.status == 200) {
        response = xh.responseText;

        output.value = response;

        names_form.reset();

      } else if (xh.status == 400) {
        alert("There was an error 400");
      } else {
        alert("Something else other than 200 was returned");
      }

      toggle_load_status(false);
    }
  };

  // request with parameters
  xh.open("POST","process.php", true);
  xh.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
  xh.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  xh.send("full_name=" + encodeURIComponent(full_name) + "&email=" + encodeURIComponent(email));
}


function load_file() {
  toggle_load_status(true);

  // using Ajax to request JSON file from server
  var xh = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject("Microsoft.XMLHTTP");

  xh.onreadystatechange = function() {
    var response;
    if (xh.readyState == XMLHttpRequest.DONE) {
      if (xh.status == 200) {
        response = xh.responseText;

        output.value = response;

      } else if (xh.status == 400) {
        alert("There was an error 400");
      } else {
        alert("Something else other than 200 was returned");
      }

      toggle_load_status(false);
    }
  };

  xh.open("POST","process.php", true);
  xh.send();
}


var ajax_loader_img, names_form, output;
var edit_row;

window.addEventListener('load', function () {
  edit_row = null;
  ajax_loader_img = document.querySelector('.loading');
  output = document.querySelector('textarea#output');

  names_form = document.querySelector('#names-form');
  names_form.addEventListener('submit', function (e) {
    e.preventDefault();

    handle_form_submit();

    return false;
  });
  names_form.querySelector('button[type=button]').addEventListener('click', function () {
    load_file();
  });
});