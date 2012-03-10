## QForm

### About

QForm is simple, Object-Oriented PHP Form toolkit, which includes Form Building and validating.
It's independent from CSS nor JS. Everything you need is PHP to create form.
It's currently in development state and it should not be used in protuction yet, note that API can change pretty much.

### Requirements

 - PHP 5.3 or higher

### License

 The project is licensed under MIT License.

### Quick Example

Make sure before launching that code to use some autoloader.

Basic:

```PHP
<?php
# Create new builder
$builder = new QForm\Builder('/user/login', 'post');

$builder->label   ('login', 'Your Login: ');
$builder->textbox ('Type your login here',  array('id'=>'login'));

echo $builder->render();
```

Alternative:

```PHP
<?php
# Create new form
$form = new QForm\Control\Form('user/login', 'post');

# Add Textbox
$form->addChild( new QForm\Control\TextBox('login'));

# Create renderer
echo htmlspecialchars($form->render());
```
