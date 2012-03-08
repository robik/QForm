## QForm

### About

QForm is simple, Object-Oriented PHP library, for making and validating forms easier.
It's currently in development state and it should not be used in protuction yet and API can change pretty much.

### Requirements

 - PHP 5.3 or higher

### License

 The project is licensed under MIT License.

### Quick Example

Make sure before launching that code to use some autoloader.

```PHP
<?php
# Create new form
$form = new QForm\Form('login', 'user/login');

# Add Textbox
$form->addChild( new QForm\Control\TextBox('login'));

# Create renderer
$renderer = new QForm\HtmlRenderer();
echo htmlspecialchars($renderer->render($form));
```
