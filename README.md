# Web Design Learn by Example
A step by step examples about designing a website using [HTML](#html), [CSS](#css), [JS](#JavaScript), [AJax](#Ajax), [PHP and MySQL](#php)

## Contents
### HTML
- [Lab 1](lab01)
  - [Lesson 1.1](lab01/01.01.lesson.html): Plain text file with extension (.html)
  - [Lesson 1.2](lab01/01.02.lesson.html): A text file contains HTML tags
  - [Lesson 1.3](lab01/01.03.lesson.html): Minimum HTML required tags to start with.
  - Lesson 1.4: Multilines
    - Browser does not display new line in a text file as its, it appear in single line. [example](lab01/01.04a.lesson.html)
    - Using `<br>` tag to break the line [example](lab01/01.04b.lesson.html)
    - Another way to have several lines by using paragraph tag `<p>` [example](lab01/01.04c.lesson.html)
    - Using text formatting such italic tag `<em>`, bold `<strong>` and some other tags which have no effect unless you apply CSS. [example](lab01/01.04d.lesson.html)
  - [Lesson 1.5](lab01/01.05.lesson.html): Introduction to Heading tags `<h1> ... <h6>`
  - [Lesson 1.6](lab01/01.06.lesson.html): Unordered list `<ul>` and ordered lists.
  - Lesson 1.7: Introduction to Links and website navigation:
    - Basic usage (inline) [example](lab01/01.07a.lesson.html)
    - Break line to display links into several lines. [example](lab01/01.07b.lesson.html)
    - Using paragraph [example](lab01/01.07c.lesson.html)
    - Using unordered list. [example](lab01/01.07d.lesson.html)
  - [Lesson 1.8](lab01/01.08.lesson.html): Complete webpage with reasonable layout. Also, describe the usage of ID and classes.

- [Lab 2](lab02)
  - [Lesson 2.1](lab02/02.01.lesson.html): Image tag `<img>` and special characters
  - [Lesson 2.2](lab02/02.02.lesson.html): Tables
  - [Lesson 2.3](lab02/02.03.lesson.html): Simple form
  - [Lesson 2.4](lab02/02.04.lesson.html): Using label with simple form
  - [Lesson 2.5](lab02/02.05.lesson.html): Advanced form
  - [Lesson 2.6](lab02/02.06.lesson.html): iframe, include small window within a webpage.

### CSS
- [Lab 3](lab03)
  - [Lesson 3.1](lab03/03.01.lesson.html): Inline CSS
  - [Lesson 3.2](lab03/03.02.lesson.html): Internal CSS
  - [Lesson 3.3](lab03/03.03.lesson): External CSS
  - [Lesson 3.4](lab03/03.04.lesson): CSS class and its usage.
  - [Lesson 3.5](lab03/03.05.lesson): Optimizing CSS file by use group selector.
  - [Lesson 3.6](lab03/03.06.lesson): Using border, drawing an egg by using CSS only.
  - [Lesson 3.7](lab03/03.07.lesson): Formatting a paragraph and image by using margin and padding
  - [Lesson 3.8](lab03/03.08.lesson): Background and layers.
  - [Lesson 3.9](lab03/03.09.lesson): Merge several images using background.
- [Lab 4](lab04)
  - [Lesson 4.1](lab04/04.01.lesson): Pseudo selectors and filter selector.
  - [Lesson 4.2](lab04/04.02.lesson): Using border rules to draw a star.
  - [Lesson 4.3](lab04/04.03.lesson): Selector priority order.
  - [Lesson 4.4](lab04/04.04.lesson): Complete webpage with reasonable layout

### JavaScript
- [Lab 5](lab05)
  - [Lesson 5.1](lab05/05.01.lesson.html): Introduction to internal JavaScript and debugging methods such as `document.write`, `document.writeln`, and `consol.log`.
  - [Lesson 5.2](lab05/05.02.lesson.html): Defining variables, undefined values, unary operator, automatic type conversion
  - [Lesson 5.3](lab05/05.03.lesson.html): Arithmetic operation
  - [Lesson 5.4](lab05/05.04.lesson.html): `if-else-statement`, short `if-statement`, `switch`
  - [Lesson 5.5](lab05/05.05.lesson.html): loops, breaking out of loop
  - [Lesson 5.6](lab05/05.06.lesson.html): popup windows (`alert`, `prompt`, and `confirm`)
  - [Lesson 5.7](lab05/05.07.lesson.html): Defining a `function`, parameters and scopes
- [Lab 6](lab06)
  - [Lesson 6.1](lab06/06.01.lesson.html): Data Structure: Array, Stack, and update core language using prototype (example used here: implementing Queue by defining new method dequeue within Array class).
  - [Lesson 6.2](lab06/06.02.lesson.html): OOP, Defining basic object, class, and class inheritance.
  - [Lesson 6.3](lab06/06.03.lesson.html): DOM, get element(s) by id, class name, and tag name.
  - [Lesson 6.4](lab06/06.04.lesson): include external JS files, more practice in DOM CSS selector (`querySelector`, `querySelectorAll`).
  - [Lesson 6.5](lab06/06.05.lesson): Create new element and append it to document.
  - [Lesson 6.6](lab06/06.06.lesson): Introduction into Events, (`window.onload`, `addEventListener`, `removeEventListener`, and `window.resize` handlers)
  - [Lesson 6.7](lab06/06.07.lesson): Button click handler, Form submit handler, form validator, and Regular Expression
- [Lab 7](lab07)
  - [Lesson 7.1](lab07/07.01.lesson.html):
    - Concept of multi-threading in JavaScript (simulate multi-threading in JavaScript even though JS does not completely support multi-threading, using `setTimeout`, `setInterval`).
    - LocalStorage: using browser `localStorage` as our Database storage. 
  - [Lesson 7.2](lab07/07.02.lesson.html): Keyboard handler
  - [Lesson 7.3](lab07/07.03.lesson): Another usage of `setInterval` and getting window size information.
  - [Lesson 7.4](lab07/07.04.lesson): Introduction to HTML5 canvas, an advance drawing tools (`canvas`: replace the usage of Macromedia Flash where canvas killed flash since HTML5 released)

  - JavaScript useful usages examples: (lab instructor could show students the possibility of JavaScript which help them to invent new project ideas from these examples)
    - [**AddressBook**](lab07/examples/AddressBook): Object-Oriented programming that include form validator, regular expression, manage database (browser localStorage) and much more.
    - [**DrawApp**](lab07/examples/DrawApp): Also OOP application provides drawing tools to draw line, circle, rectangle, and square.
    - [**Game**](lab07/examples/Game): an interactive game that records points detect when user complete basic level. Students could learn from this example how to interact with keyboard.
    - [**Painter**](lab07/examples/Painter): a complete application similar to Windows Paint application done in less than 190 lines using JavaScript and HTML5 canvas only to draw several shapes with different setting and colors. Also, it provides how to save canvas image as PNG. Students could learn from this example how to handle mouse and keyboard events such as mouse-move, mouse-down, mouse-up, and keyup.

### PHP
- [Lab 8](lab08)
  - [Lesson 8.1](lab08/08.01.lesson.html): Introduction to creating simple PHP file and print methods
  - [Lesson 8.2](lab08/08.02.lesson.html): define PHP block within HTML code
  - [Lesson 8.3](lab08/08.03.lesson.html): Defining variables, concatenate operator, and arithmetic operations
  - [Lesson 8.4](lab08/08.04.lesson.html): if-else-statement, short if-statement, switch, random function.
  - [Lesson 8.5](lab08/08.05.lesson.html): loops, breaking out of loop
  - [Lesson 8.6](lab08/08.06.lesson.html): Function and variables scopes
- [Lab 9](lab09)
  - [Lesson 9.1](lab09/09.01.lesson.html): Array declaration and concept of dictionary.
  - [Lesson 9.2](lab09/09.02.lesson.html): An example with undeclared function in order to see what will happen to deal with errors
  - [Lesson 9.3](lab09/09.03.lesson.html): Corrected version of lesson 9.2
  - [Lesson 9.4](lab09/09.04.lesson): Concept of code reuse and how to deal with several files.
  - [Lesson 9.5](lab09/09.05.lesson): Classes declaration basics
  - [Lesson 9.6](lab09/09.06.lesson): More examples in OOP.
  - [SingletonDemo](lab09/SingletonDemo): an implementation of Singleton Design Pattern in order to learn usage of static attribute and method within the class and outside it. Also, how to prevent creating more than one instance of class.
- [Lab 10](lab)
  - [Lesson 10.1](lab10/10.01.form-handler): Basic Form handler.
  - [Lesson 10.2](lab10/10.02.form-image): Using image as submit button in order to know where user click by sending `x` and `y`.
  - [Lesson 10.3](lab10/10.03.advance-form-handler): Advanced Form handler, and file I/O read and write from files.
  - [Lesson 10.4](lab10/10.04.json-form-handler): Using JSON to store data into file and read from file using json decoder.
  - [Lesson 10.5](lab10/10.05.cookies): Cookies and Session
  - [Lesson 10.6](lab10/10.06.file-upload): File upload, handling file upload and list files from a folder
- [Lab 11](lab11)
  - [Lesson 11.1](lab11/11.01.basic-mysql-connection): Basic mysql connection (using mysqli)
  - [Lesson 11.2](lab11/11.02.mysql-connection): MySQL connection error handling using `try-catch`.
  - [Lesson 11.3](lab11/11.03.mysql-connection-oop): OOP connection.
  - [Lesson 11.4](lab11/11.04.mysql-connection-oop): Universal PHP connection `PDO` (Oracle, MySQL, MsSQL, ..).
  - [Lesson 11.5](lab11/11.05.mysql-statement): Secure query prevents query injection by using prepared statements.
  - [Lesson 11.6](lab11/11.06.advanced-usage): A complete project using session, cookie, database, retrieve/update/ delete DB records.
  - A [README.sql](lab11/README.sql) file contains sample database you may use to practice examples.
### Ajax
- [Lab 12](lab12)
  - [Lesson 12.1](lab12/12.01.basic-ajax): Basic Ajax connection
  - [Lesson 12.2](lab12/12.02.parse-xml-document): Request and parse XML file
  - [Lesson 12.3](lab12/12.03.parse-generated-xml): Generate XML file using PHP and request it by Ajax
  - [Lesson 12.4](lab12/12.04.parse-json-document): Request and parse JSON file
  - [Lesson 12.5](lab12/12.05.parse-generated-json): Generate JSON file using PHP and request it by Ajax
  - [Lesson 12.6](lab12/12.06.send-request): Send POST request via Ajax
  - [DEMO](lab12/Demo): A complete project that handle Ajax and interacting with server.
