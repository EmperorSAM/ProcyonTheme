<!DOCTYPE html>
<html lang="<?php print $language->language; ?>">
  <head>
    <?php print $head; ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title><?php print $head_title; ?></title>
    <?php print $styles; ?>
    <?php print $scripts; ?>
  </head>
<body>
    
<div class="container">
    
    <div class="sm-6">
        <?php if ($logo): ?>
            <a href="<?php print $front_page; ?>" title="<?php print $site_name; ?>">
                <img src="<?php print $logo; ?>" alt="<?php print $site_name; ?>" />
            </a>
        <?php endif; ?>
    </div>
    
    <div class="sm-6">
        <h1>404 - <?php print t('Forbidden page'); ?></h1>
        <a onclick="history.back(); return false;"><?php print t('Back'); ?></a>
        <a href="<?php print $front_page; ?>"><?php print t('Home'); ?></a>
        <a href="/user"><?php print t('Login'); ?></a>
    </div>

</div>

</body>
</html>