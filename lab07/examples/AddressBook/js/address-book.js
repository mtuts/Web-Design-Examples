/**
 * Created by Marwan on 10/23/16.
 */

var clear_content = function (element) {
  while (element.childNodes.length > 0) {
    element.removeChild(element.childNodes[0]);
  }
};

var AddressBook = function (container, form_selector) {
  this.container = document.querySelector(container);
  this.header = this.container.parentNode.querySelector('thead');
  this.form = document.querySelector(form_selector);

  this.name_field = this.form.elements['name'];
  this.email_field = this.form.elements['email'];
  this.birth_field = this.form.elements['birth'];
  this.address_field = this.form.elements['address'];
  this.phone_field = this.form.elements['phone'];

  this.submit_button = this.form.querySelector('input[type=submit]');

  this.current_row = null;
};

AddressBook.prototype.init = function () {
  var self = this;

  this.prepareSortColumn(this.header.querySelector('th:nth-child(1)'), function (a, b) {
    return self.compareNum(a, b);
  });

  this.prepareSortColumn(this.header.querySelector('th:nth-child(2)'), function (a, b) {
    return self.compareName(a, b);
  });
  this.prepareSortColumn(this.header.querySelector('th:nth-child(3)'), function (a, b) {
    return self.compareEmail(a, b);
  });
  this.prepareSortColumn(this.header.querySelector('th:nth-child(4)'), function (a, b) {
    return self.compareBirth(a, b);
  });
  this.prepareSortColumn(this.header.querySelector('th:nth-child(5)'), function (a, b) {
    return self.compareAddress(a, b);
  });
  this.prepareSortColumn(this.header.querySelector('th:nth-child(6)'), function (a, b) {
    return self.comparePhone(a, b);
  });

  this.submit_button.value = 'Add';
  clear_content(this.container);

  this.form.addEventListener('submit', function (e) {
    e.preventDefault();

    var flag = true;

    if (self.current_row == null) {
      flag = self.add();

    } else {
      flag = self.update(self.current_row);
    }
    if (flag) this.reset();

    return false;
  });
};

AddressBook.prototype.demo = function () {
  var self = this;
  var step = 500;
  clear_content(this.container);
  setTimeout(function () {
    self.name_field.value = 'Mohammad';
    self.email_field.value = 'in@out';
    self.birth_field.value = 1980;
    self.address_field.value = 'Jeddah, Makkah\nSaudi Arabia 789546';
    self.phone_field.value = '(123) 456-7890';
    self.add();
  }, step);
  setTimeout(function () {
    self.name_field.value = 'Ali';
    self.email_field.value = 'keeper@zoo';
    self.birth_field.value = 1995;
    self.address_field.value = 'Taif, Makkah\nSaudi Arabia 65479';
    self.phone_field.value = '(987) 584-7890';
    self.add();
  }, step * 2);
  setTimeout(function () {
    self.name_field.value = 'John';
    self.email_field.value = 'h2o@co2';
    self.birth_field.value = 2000;
    self.address_field.value = 'London, London\nUK 4254866';
    self.phone_field.value = '(777) 000-8888';
    self.add();
  }, step * 3);
  setTimeout(function () {
    self.name_field.value = 'Someone';
    self.email_field.value = 'something@somewhere';
    self.birth_field.value = 1989;
    self.address_field.value = 'Denver, CO\nUSA 800014';
    self.phone_field.value = '(720) 556-8974';
    self.add();
  }, step * 4);
  setTimeout(function () {
    self.form.reset();
  }, step * 4.5);
};

AddressBook.prototype.load = function () {
  if (typeof localStorage == 'undefined') return;

  clear_content(this.container);

  try {
    if (typeof localStorage.address_book == 'string') {
      var addresses = JSON.parse(localStorage.getItem('address_book'));
      var i;

      for (i = 0; i < addresses.length; ++i) {
        this.name_field.value = addresses[i].name;
        this.email_field.value = addresses[i].email;
        this.birth_field.value = addresses[i].birth;
        this.address_field.value = addresses[i].address;
        this.phone_field.value = addresses[i].phone;
        this.add();
      }
    }
  } catch (e) {
    alert(e);
  }
  this.form.reset();
};

AddressBook.prototype.save = function () {
  if (typeof localStorage == 'undefined') return;

  var addresses = [], i;
  var rows = this.container.children;

  for (i = 0; i < rows.length; ++i) {
    addresses.push({
      name: this.getNameValue(rows[i]),
      email: this.getEmailValue(rows[i]),
      birth: this.getBirthValue(rows[i]),
      address: this.getAddressValue(rows[i]),
      phone: this.getPhoneValue(rows[i])
    });
  }
  localStorage.setItem('address_book', JSON.stringify(addresses));
};

AddressBook.prototype.prepareSortColumn = function (cell, compare_method) {
  var self = this;
  cell.classList.add('clickable');
  cell.addEventListener('click', function () {
    var asc = this.classList.contains('ascending');
    var dec = this.classList.contains('descending');
    var i;

    if (asc || dec) {

      if (asc) {
        this.classList.add('descending');
        this.classList.remove('ascending');
      } else {
        this.classList.add('ascending');
        this.classList.remove('descending');
      }
      self.reverse();
    } else {
      var ths = self.header.querySelectorAll('th.clickable.sorted_by');
      for (i = 0; i < ths.length; ++i) {
        ths[i].classList.remove('sorted_by');
        ths[i].classList.remove('ascending');
        ths[i].classList.remove('descending');
      }
      this.classList.add('sorted_by');
      this.classList.add('ascending');
      self.sortBy(compare_method);
    }

  });
};

AddressBook.prototype.getNum = function (row) {
  return row.querySelector('th:nth-child(1)');
};

AddressBook.prototype.getName = function (row) {
  return row.querySelector('td:nth-child(2)');
};

AddressBook.prototype.getEmail = function (row) {
  return row.querySelector('td:nth-child(3)');
};

AddressBook.prototype.getBirth = function (row) {
  return row.querySelector('td:nth-child(4)');
};

AddressBook.prototype.getAddress = function (row) {
  return row.querySelector('td:nth-child(5)');
};

AddressBook.prototype.getPhone = function (row) {
  return row.querySelector('td:nth-child(6)');
};

AddressBook.prototype.getNumValue = function (row) {
  return this.getNum(row).innerHTML * 1;
};

AddressBook.prototype.setName = function (row, value) {
  this.getName(row).innerHTML = value;
};

AddressBook.prototype.getNameValue = function (row) {
  return this.getName(row).innerHTML;
};

AddressBook.prototype.setEmail = function (row, value) {
  this.getEmail(row).innerHTML = value;
};

AddressBook.prototype.getEmailValue = function (row) {
  return this.getEmail(row).innerHTML;
};

AddressBook.prototype.setBirth = function (row, value) {
  this.getBirth(row).setAttribute('data-brith', value);
  this.getBirth(row).innerHTML = new Date().getFullYear() - parseInt(value);
};

AddressBook.prototype.getBirthValue = function (row) {
  return this.getBirth(row).getAttribute('data-brith');
};

AddressBook.prototype.setAddress = function (row, value) {
  this.getAddress(row).innerHTML = value;
};

AddressBook.prototype.getAddressValue = function (row) {
  return this.getAddress(row).innerHTML;
};

AddressBook.prototype.setPhone = function (row, value) {
  this.getPhone(row).innerHTML = value;
};

AddressBook.prototype.getPhoneValue = function (row) {
  return this.getPhone(row).innerHTML;
};

AddressBook.prototype.edit = function (row) {
  this.current_row = row;
  this.submit_button.value = 'Update';

  this.name_field.value = this.getNameValue(row);
  this.email_field.value = this.getEmailValue(row);
  this.birth_field.value = this.getBirthValue(row);
  this.address_field.value = this.getAddressValue(row);
  this.phone_field.value = this.getPhoneValue(row);
};

AddressBook.prototype.update = function (row) {
  if (!this.validate()) {
    alert('Review your entry');
    return false;
  }
  this.submit_button.value = 'Add';

  this.setName(row, this.name_field.value);
  this.setEmail(row, this.email_field.value);
  this.setBirth(row, this.birth_field.value);
  this.setAddress(row, this.address_field.value);
  this.setPhone(row, this.phone_field.value);

  this.current_row = null;

  return true;
};

AddressBook.prototype.remove = function (row) {
  if (confirm('Are you sure want remove "' + this.getNameValue(row) + '"?')) {
    this.container.removeChild(row);
  }
};

AddressBook.prototype.resetForm = function () {
  this.name_field.classList.remove('not-valid');
  this.birth_field.classList.remove('not-valid');
  this.phone_field.classList.remove('not-valid');
};

AddressBook.prototype.validate = function () {
  var flag = true;

  this.resetForm();

  if (this.name_field.value.length < 3) {
    this.name_field.classList.add('not-valid');
    flag = false;
  }

  var y = this.birth_field.value;
  if (y < 1200 || y > 9999) {
    this.birth_field.classList.add('not-valid');
    flag = false;
  }

  var re = new RegExp("^\\([0-9]{3}\\)\\s*\\d{3}\\s*\\-\\s*\\d{4}$");
  if (!re.test(this.phone_field.value)) {
    this.phone_field.classList.add('not-valid');
    flag = false;
  }

  return flag;
};

AddressBook.prototype.add = function () {
  var self = this;
  this.submit_button.classList.add('highlight');
  setTimeout(function () {
    self.submit_button.classList.remove('highlight');
  }, 200);
  if (!this.validate()) {
    alert('Review your entry');
    return false;
  }
  var row = document.createElement('tr');
  var num = document.createElement('th');
  var name = document.createElement('td');
  var email = document.createElement('td');
  var birth = document.createElement('td');
  var address = document.createElement('td');
  var phone = document.createElement('td');
  var option = document.createElement('td');
  var edit_btn = document.createElement('button');
  var remove_btn = document.createElement('button');
  var new_num = this.container.children.length + 1;

  num.appendChild(document.createTextNode(new_num + ""));
  name.appendChild(document.createTextNode(this.name_field.value));
  email.appendChild(document.createTextNode(this.email_field.value));
  address.appendChild(document.createTextNode(this.address_field.value));

  phone.classList.add('no-wrap');
  phone.appendChild(document.createTextNode(this.phone_field.value));

  edit_btn.addEventListener('click', function () {
    self.edit(this.parentNode.parentNode);
  });

  edit_btn.appendChild(document.createTextNode("Edit"));

  remove_btn.addEventListener('click', function () {
    self.remove(this.parentNode.parentNode);
  });
  remove_btn.appendChild(document.createTextNode("Remove"));

  option.classList.add('no-wrap');
  option.classList.add('center');
  option.appendChild(edit_btn);
  option.appendChild(remove_btn);

  row.appendChild(num);
  row.appendChild(name);
  row.appendChild(email);
  row.appendChild(birth);
  row.appendChild(address);
  row.appendChild(phone);
  row.appendChild(option);

  this.setBirth(row, this.birth_field.value); // in order to calculate age

  this.container.appendChild(row);

  return true;
};

AddressBook.prototype.compareNum = function (a, b) {
  return this.getNumValue(a) - this.getNumValue(b);
};

AddressBook.prototype.compareName = function (a, b) {
  return this.getNameValue(a).localeCompare(this.getNameValue(b));
};

AddressBook.prototype.compareEmail = function (a, b) {
  return this.getEmailValue(a).localeCompare(this.getEmailValue(b));
};

AddressBook.prototype.compareBirth = function (a, b) {
  return this.getBirthValue(a) - this.getBirthValue(b);
};

AddressBook.prototype.compareAddress = function (a, b) {
  return this.getAddressValue(a).localeCompare(this.getAddressValue(b));
};

AddressBook.prototype.comparePhone = function (a, b) {
  return this.getPhoneValue(a).localeCompare(this.getPhoneValue(b));
};

AddressBook.prototype.sortBy = function (compare_method) {
  var list = [].slice.call(this.container.children); // convert from HTMLCollection to Array
  var i;
  list = list.sort(compare_method);

  for (i = 0; i < list.length; ++i) {
    this.container.appendChild(list[i]);
  }
};

AddressBook.prototype.reverse = function () {
  var count = this.container.children.length;
  var i;

  for (i = 1; i < count; ++i) {
    this.container.appendChild(this.container.children[count - i - 1]);
  }
};

