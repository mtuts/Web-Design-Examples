/**
 * Created by Marwan on 12/14/16.
 */

function validate_form(e) {

  if (this.elements['pass'].value != this.elements['confirm-pass'].value) {
    e.preventDefault();

    alert('Password and confirm password should be equal.');

    return false;
  }
}

function confirm_delete(e) {
  var customer_name = this.parentNode.parentNode.querySelectorAll('td:nth-child(2), td:nth-child(3)');
  customer_name = customer_name[0].innerHTML + " " + customer_name[1].innerHTML;
  if (!confirm('Are you sure want delete customer [ ' + customer_name + ' ]')) {
    e.preventDefault();

    return false;
  }
}

window.addEventListener('load', function () {
  var form = document.querySelector('#customer-form');

  if (form) {
    form.addEventListener('submit', validate_form);
  }

  var i, del_links = document.querySelectorAll('.delete-customer');


  for (i = 0; i < del_links.length; i++) {
    del_links[i].addEventListener('click', confirm_delete);
  }
});