# Web Design Learn by Example
A step by step examples about designing a website using [HTML](#html), [CSS](#css), [JS](#JavaScript), [AJax](#Ajax), [PHP and MySQL](#php)

## Contents
### HTML
- [Lab 1](lab01)
  - Lesson 1.1: Plain text file with extension (.html)
  - Lesson 1.2: A text file contains HTML tags
  - Lesson 1.3: Minimum HTML required tags to start with.
  - Lesson 1.4: Multilines
    - Browser does not display new line in a text file as its, it appear in single line.
    - Using `<br>` tag to break the line
    - Another way to have several lines by using paragraph tag `<p>`
    - Using text formatting such italic tag `<em>`, bold `<strong>` and some other tags which have no effect unless you apply CSS.
  - Lesson 1.5: Introduction to Heading tags `<h1> ... <h6>`
  - Lesson 1.6: Unordered list `<ul>` and ordered lists.
  - Lesson 1.7: Introduction to Links and website navigation:
    - Basic usage (inline)
    - Break line to display links into several lines.
    - Using paragraph
    - Using unordered list.
  - Lesson 1.8: Complete webpage with reasonable layout. Also, describe the usage of ID and classes.

- [Lab 2](lab02)
  - Lesson 2.1: Image tag `<img>` and special characters
  - Lesson 2.2: Tables
  - Lesson 2.3: Simple form
  - Lesson 2.4: Using label with simple form
  - Lesson 2.5: Advanced form
  - Lesson 2.6: iframe, include small window within a webpage.

### CSS
- [Lab 3](lab03)
  - Lesson 3.1: Inline CSS
  - Lesson 3.2: Internal CSS
  - Lesson 3.3: External CSS
  - Lesson 3.4: CSS class and its usage.
  - Lesson 3.5: Optimizing CSS file by use group selector.
  - Lesson 3.6: Using border, drawing an egg by using CSS only.
  - Lesson 3.7: Formatting a paragraph and image by using margin and padding
  - Lesson 3.8: Background and layers.
  - Lesson 3.9: Merge several images using background.
- [Lab 4](lab04)
  - Lesson 4.1: Pseudo selectors and filter selector.
  - Lesson 4.2: Using border rules to draw a star.
  - Lesson 4.3: Selector priority order.
  - Lesson 4.4: Complete webpage with reasonable layout

### JavaScript
- [Lab 5](lab05)
  - Lesson 5.1: Introduction to internal JavaScript and debugging methods such as `document.write`, `document.writeln`, and `consol.log`.
  - Lesson 5.2: Defining variables, undefined values, unary operator, automatic type conversion
  - Lesson 5.3: Arithmetic operation
  - Lesson 5.4: `if-else-statement`, short `if-statement`, `switch`
  - Lesson 5.5: loops, breaking out of loop
  - Lesson 5.6: popup windows (`alert`, `prompt`, and `confirm`)
  - Lesson 5.7: Defining a `function`, parameters and scopes
- [Lab 6](lab06)
  - Lesson 6.1: Data Structure: Array, Stack, and update core language using prototype (example used here: implementing Queue by defining new method dequeue within Array class).
  - Lesson 6.2: OOP, Defining basic object, class, and class inheritance.
  - Lesson 6.3: DOM, get element(s) by id, class name, and tag name.
  - Lesson 6.4: include external JS files, more practice in DOM CSS selector (`querySelector`, `querySelectorAll`).
  - Lesson 6.5: Create new element and append it to document.
  - Lesson 6.6: Introduction into Events, (`window.onload`, `addEventListener`, `removeEventListener`, and `window.resize` handlers)
  - Lesson 6.7: Button click handler, Form submit handler, form validator, and Regular Expression
- [Lab 7](lab07)
  - Lesson 7.1:
    - Concept of multi-threading in JavaScript (simulate multi-threading in JavaScript even though JS does not completely support multi-threading, using `setTimeout`, `setInterval`).
    - LocalStorage: using browser `localStorage` as our Database storage. 
  - Lesson 7.2: Keyboard handler
  - Lesson 7.3: Another usage of `setInterval` and getting window size information.
  - Lesson 7.4: Introduction to HTML5 canvas, an advance drawing tools (`canvas`: replace the usage of Macromedia Flash where canvas killed flash since HTML5 released)

  - JavaScript useful usages examples: (lab instructor could show students the possibility of JavaScript which help them to invent new project ideas from these examples)
    - **AddressBook**: Object-Oriented programming that include form validator, regular expression, manage database (browser localStorage) and much more.
    - **DrawApp**: Also OOP application provides drawing tools to draw line, circle, rectangle, and square.
    - **Game**: an interactive game that records points detect when user complete basic level. Students could learn from this example how to interact with keyboard.
    - **Painter**: a complete application similar to Windows Paint application done in less than 190 lines using JavaScript and HTML5 canvas only to draw several shapes with different setting and colors. Also, it provides how to save canvas image as PNG. Students could learn from this example how to handle mouse and keyboard events such as mouse-move, mouse-down, mouse-up, and keyup.

### PHP
- [Lab 8](lab08)
  - Lesson 8.1: Introduction to creating simple PHP file and print methods
  - Lesson 8.2: define PHP block within HTML code
  - Lesson 8.3: Defining variables, concatenate operator, and arithmetic operations
  - Lesson 8.4: if-else-statement, short if-statement, switch, random function.
  - Lesson 8.5: loops, breaking out of loop
  - Lesson 8.6: Function and variables scopes
- [Lab 9](lab09)
  - Lesson 9.1: Array declaration and concept of dictionary.
  - Lesson 9.2: An example with undeclared function in order to see what will happen to deal with errors
  - Lesson 9.3: Corrected version of lesson 9.2
  - Lesson 9.4: Concept of code reuse and how to deal with several files.
  - Lesson 9.5: Classes declaration basics
  - Lesson 9.6: More examples in OOP.
    - SingletonDemo: an implementation of Singleton Design Pattern in order to learn usage of static attribute and method within the class and outside it. Also, how to prevent creating more than one instance of class.
- [Lab 10](lab)
  - Lesson 10.1: Basic Form handler.
  - Lesson 10.2: Using image as submit button in order to know where user click by sending `x` and `y`.
  - Lesson 10.3: Advanced Form handler, and file I/O read and write from files.
  - Lesson 10.4: Using JSON to store data into file and read from file using json decoder.
  - Lesson 10.5: Cookies and Session
  - Lesson 10.6: File upload, handling file upload and list files from a folder
- [Lab 11](lab11)
  - Lesson 11.1: Basic mysql connection (using mysqli)
  - Lesson 11.2: MySQL connection error handling using `try-catch`.
  - Lesson 11.3: OOP connection.
  - Lesson 11.4: Universal PHP connection `PDO` (Oracle, MySQL, MsSQL, ..).
  - Lesson 11.5: Secure query prevents query injection by using prepared statements.
  - Lesson 11.6: A complete project using session, cookie, database, retrieve/update/ delete DB records.
    - A README.txt file contains sample database you may use to practice examples.
### Ajax
- [Lab 12](lab12)
  - Lesson 12.1: Basic Ajax connection
  - Lesson 12.2: Request and parse XML file
  - Lesson 12.3: Generate XML file using PHP and request it by Ajax
  - Lesson 12.4: Request and parse JSON file
  - Lesson 12.5: Generate JSON file using PHP and request it by Ajax
  - Lesson 12.6: Send POST request via Ajax
    - DEMO: A complete project that handle Ajax and interacting with server.
