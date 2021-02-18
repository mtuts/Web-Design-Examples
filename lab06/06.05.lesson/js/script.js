/**
 * Created by Marwan on 10/29/16.
 */

/**
 * Using FireFox FireBug Console to write following
 */

/**
 * creating and append node/element
 */
var heading = document.createElement('h1');
var heading_text = document.createTextNode("Big Head!");

heading.appendChild(heading_text);
document.body.appendChild(heading);


/**
 * advanced usage
 */

var addProduct = function (num, item, price) {
  var row = document.createElement('tr');
  var num_cell =  document.createElement('th');
  var item_cell =  document.createElement('td');
  var price_cell =  document.createElement('td');

  var num_node = document.createTextNode(num);

  num_cell.appendChild(num_node);

  item_cell.appendChild(document.createTextNode(item));
  price_cell.innerHTML = "$" + price;

  row.appendChild(num_cell);
  row.appendChild(item_cell);
  row.appendChild(price_cell);

  return row;
};

var custom_round = function(num, decimal) {
  var x = Math.floor(num);
  var product = Math.pow(10, decimal);
  var y = Math.floor(num * product) - x * product;

  return x + y / product;
};

var products = [
  {item: 'Apple', price: 2.99},
  {item: 'Orange', price: 1.79},
  {item: 'Banana', price: 2.25},
  {item: 'Avocado', price: 9.96}
];

var table = document.createElement('table');
var row = document.createElement('tr');
var num = document.createElement('th');
var item = document.createElement('th');
var price = document.createElement('th');

num.innerHTML = "#";
item.innerHTML = "Product";
price.innerHTML = "Price";

row.appendChild(num);
row.appendChild(item);
row.appendChild(price);

table.appendChild(row);


var sum = 0;
for (var i = 0; i < products.length; ++i) {
  row = addProduct(i + 1, products[i].item, products[i].price);
  sum += products[i].price;
  table.appendChild(row);
}

row = document.createElement('tr');
var total_label = document.createElement('th');
var total_price = document.createElement('td');

total_label.innerHTML = "Total";
total_label.style.textAlign = 'right';
total_label.setAttribute('colspan', "2");

total_price.innerHTML = "$" + custom_round(sum, 2);

row.appendChild(total_label);
row.appendChild(total_price);

table.appendChild(row);

document.body.appendChild(table);
