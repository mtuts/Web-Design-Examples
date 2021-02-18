/**
 * Created by Marwan on 12/15/16.
 */



function update_store() {
  var s = document.querySelector('input[type=radio][name=store]:checked');

  current_store = s.value;

  load_data();
}

function get_store() {
  var s = document.querySelector('input[type=radio][name=store]:checked');

  return s.value;
}

function edit_record(element) {
  var full_name, email, code;

  edit_row = element.parentNode.parentNode;
  full_name = edit_row.querySelector('td:nth-child(1)').innerHTML;
  email = edit_row.querySelector('td:nth-child(2)').innerHTML;
  code = edit_row.getAttribute('data-code');

  names_form.elements['action'].value = 'edit';
  names_form.elements['code'].value = code;
  names_form.elements['full-name'].value = full_name;
  names_form.elements['email'].value = email;
}

function delete_record(element) {

  if (confirm("Are you sure want remove this record")) {
    toggle_load_status(true);

    // using Ajax to request JSON file from server
    var xh = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject("Microsoft.XMLHTTP");

    xh.onreadystatechange = function() {
      var response, obj;
      if (xh.readyState == XMLHttpRequest.DONE) {
        if (xh.status == 200) {
          response = xh.responseText;

          obj = JSON.parse(response);

          if (obj.success) {
            data_list.removeChild(element.parentNode.parentNode)
          }

        } else if (xh.status == 400) {
          alert("There was an error 400");
        } else {
          alert("Something else other than 200 was returned");
        }

        toggle_load_status(false);
      }
    };

    // request with parameters
    xh.open("POST","action/delete-data.php", true);
    xh.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
    xh.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xh.send("code=" + element.parentNode.parentNode.getAttribute('data-code') + "&store=" + get_store());
  }
}

function process_load_request(response) {

  if (typeof response.result != "undefined") {
    var i;

    data_list.innerHTML = '';

    for (i = 0; i < response.result.length; ++i) {
      add_row(response.result[i].code, response.result[i].full_name, response.result[i].email)
    }
  }
}

function add_row(code, full_name, email) {
  var row = document.createElement('tr');
  var td1 = document.createElement('td');
  var td2 = document.createElement('td');
  var td3 = document.createElement('td');
  var edit = document.createElement('a');
  var del = document.createElement('a');
  var spl = document.createTextNode(" | ");

  td1.innerHTML = full_name;
  td2.innerHTML = email;

  edit.innerHTML = "Edit";
  edit.setAttribute('href', 'javascript:;');
  edit.addEventListener('click', function (e) {
    e.preventDefault();
    edit_record(this);

    return false;
  });
  del.innerHTML = "Delete";
  del.setAttribute('href', 'javascript:;');
  del.addEventListener('click', function (e) {
    e.preventDefault();

    delete_record(this);

    return false;
  });

  row.setAttribute('data-code', code);

  td3.appendChild(edit);
  td3.appendChild(spl);
  td3.appendChild(del);

  row.appendChild(td1);
  row.appendChild(td2);
  row.appendChild(td3);

  data_list.appendChild(row);
}

function process_update_request(code, full_name, email, action) {
  names_form.elements['action'].value = 'add';
  names_form.elements['code'].value = '';
  names_form.reset();

  if (action == 'add') {
    add_row(code, full_name, email);
  } else {
    var row = document.querySelector('tr[data-code=\'' + code + '\']');
    if (row) {
      row.querySelector('td:nth-of-type(1)').innerHTML = full_name;
      row.querySelector('td:nth-of-type(2)').innerHTML = email;
    }
  }
}

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

function load_data() {

  toggle_load_status(true);

  // using Ajax to request JSON file from server
  var xh = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject("Microsoft.XMLHTTP");

  xh.onreadystatechange = function() {
    var response, obj;
    if (xh.readyState == XMLHttpRequest.DONE) {
      if (xh.status == 200) {
        response = xh.responseText;

        obj = JSON.parse(response);

        process_load_request(obj);

      } else if (xh.status == 400) {
        alert("There was an error 400");
      } else {
        alert("Something else other than 200 was returned");
      }

      toggle_load_status(false);
    }
  };

  // request with parameters
  xh.open("POST","action/get-data.php", true);
  xh.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
  xh.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  xh.send("store=" + encodeURIComponent(current_store));

}


function handle_form_submit(form) {
  var action = form.elements['action'].value;
  var code = form.elements['code'].value;
  var full_name = form.elements['full-name'].value;
  var email = form.elements['email'].value;
  var store = get_store();
  var data = {
    action: action,
    code: code,
    full_name: full_name,
    email: email,
    store: store
  };

  var params = Object.keys(data).map(
    function(k){ return encodeURIComponent(k) + '=' + encodeURIComponent(data[k]) }
    ).join('&');

  toggle_load_status(true);

  // using Ajax to request JSON file from server
  var xh = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject("Microsoft.XMLHTTP");

  xh.onreadystatechange = function() {
    var response, obj;
    if (xh.readyState == XMLHttpRequest.DONE) {
      if (xh.status == 200) {
        response = xh.responseText;

        obj = JSON.parse(response);

        process_update_request(obj.code, data.full_name, data.email, data.action);

      } else if (xh.status == 400) {
        alert("There was an error 400");
      } else {
        alert("Something else other than 200 was returned");
      }

      toggle_load_status(false);
    }
  };

  // request with parameters
  xh.open("POST","action/set-data.php", true);
  xh.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
  xh.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  xh.send(params);
}

var data_list, current_store, ajax_loader_img, names_form;
var edit_row;

window.addEventListener('load', function () {
  var store_where = document.querySelectorAll("input[type=radio][name=store]");
  var i;
  edit_row = null;

  names_form = document.querySelector('#names-form');

  ajax_loader_img = document.querySelector('.loading');

  for (i = 0; i < store_where.length; ++i) {
    store_where[i].addEventListener('change', function (e) {
      update_store();
    });
  }

  data_list = document.querySelector('#data-list');

  names_form.addEventListener('submit', function (e) {
    e.preventDefault();

    handle_form_submit(this);

    return false;
  });

  update_store();
});