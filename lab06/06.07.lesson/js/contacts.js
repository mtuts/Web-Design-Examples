/**
 * Created by Marwan on 10/29/16.
 */

/**
 * introduction into Event
 */

var add_handler = function (event) {
  // event.preventDefault();

  var row = document.createElement('tr');
  var td_num = document.createElement('td');
  var td_name = document.createElement('td');
  var td_email = document.createElement('td');
  var td_mobile = document.createElement('td');
  var td_option = document.createElement('td');
  var del_btn = document.createElement('button');

  if (text_name.value.length >= 3 && text_email.value.length >= 3) {
    var re = new RegExp("^[0-9]{10}$");
    if (!re.test(text_mobile.value)) {
      alert("Phone number should be 10 digits only!");
      return false;
    }
    td_num.innerHTML = output.childElementCount + 1;
    td_name.innerHTML = text_name.value;
    td_email.innerHTML = text_email.value;
    td_mobile.innerHTML = text_mobile.value;
    del_btn.innerHTML = "Delete";

    del_btn.addEventListener('click', function () {
      if (confirm('Are you sure want delete this row?')) {
//         output.removeChild(row);
        this.parentNode.parentNode.parentNode.removeChild(this.parentNode.parentNode);
      }
    });

    td_option.classList.add('center');
    td_option.appendChild(del_btn);

    row.appendChild(td_num);
    row.appendChild(td_name);
    row.appendChild(td_email);
    row.appendChild(td_mobile);
    row.appendChild(td_option);

    output.appendChild(row);

    main_form.reset();
  } else {
    alert('Please fill name and email!');
  }
  return false;
};
