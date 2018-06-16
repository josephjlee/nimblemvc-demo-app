<?php require(APP_ROOT . '/views/includes/header.php'); ?>
<h1><?php echo($data['title']); ?></h1>
<ul>
    <li>App Name: <strong><?php echo(SITE_NAME); ?></strong></li>
    <li>App Version: <strong><?php echo(APP_VERSION); ?></strong></li>
    <li>App Repo: <strong><a href="https://github.com/farhanhasinc/diymvc-demo-app">https://github.com/farhanhasinc/diymvc-demo-app</a></strong></li>
    <li>Framework Name: <strong><?php echo(FRAMEWORK_NAME); ?></strong></li>
    <li>Framework Version: <strong><?php echo(FRAMEWORK_VERSION); ?></strong></li>
    <li>Framework Repo: <strong><a href="https://github.com/farhanhasinc/diymvc">https://github.com/farhanhasinc/diymvc</a></strong></li>
</ul>
<?php require(APP_ROOT . '/views/includes/footer.php'); ?>