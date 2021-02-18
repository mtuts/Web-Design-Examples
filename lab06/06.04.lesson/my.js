/**
 * Created by Marwan on 10/21/16.
 */

/**
 * get all elements who tag name is (a)
 */

var links = document.getElementsByTagName("a");

console.log(links);

var i;

for (i = 0; i < links.length; ++i) {
  console.log(links[i].href, " | ", links[i].innerHTML);
}

/**
 * Using CSS selector
 *
 * querySelector selects first match
 * querySelectorAll selects all matches
 */
var head = document.querySelector('h1');

console.log(head);

var heads = document.querySelectorAll('h2');

console.log(heads);


var p = document.querySelectorAll('.post');

console.log(p);

console.log(p[1]); // print second element from p array which contains list of (.post)

/**
 * get specified element using CSS selector
 */

p = document.querySelectorAll('.somewhere .post');

console.log(p);

p = document.querySelectorAll('.myclass1.myclass2.post');

console.log(p);

/**
 * delete element
 */

p[0].parentNode.removeChild(p[0]);


/**
 * get element by id selector
 */

p = document.querySelector('p#my-layer');

console.log(p); // null

p = document.querySelector('div#my-layer');

console.log(p); // found

p = document.querySelector('#my-layer');

console.log(p); // found

var children = p.querySelectorAll('*');

console.log(children);

children = document.querySelectorAll('#my-layer *');

console.log(children);


/**
 * get all elements
 */

p = document.querySelectorAll('*');
console.log(p);

for (i = 0; i < p.length; ++i) {
  console.log(p[i]);

  if (p[i].parentNode == document.body) {
    p[i].style.border = '1px solid black';
  }

  if (p[i].tagName.toLowerCase() == 'p') {
    p[i].style.color = '#FF0000';
  }
}




