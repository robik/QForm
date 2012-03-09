<?php
// Load Autoloader Here

# Create new form
$form = new QForm\Control\Form('login', 'user/login');

# Login box
$login = new QForm\Control\TextBox('login');
$login->setMaxLength(22)
      ->setSize(16);

# Add Textbox
$form->addChild( $login );


# Print the generated code
echo htmlspecialchars( $form->render() );
?>
