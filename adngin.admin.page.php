<div class="wrap">

  <img
    src="<?php echo plugins_url('img/logo.png', __FILE__) ?>"
    width="120px"
    alt="adngin logo">

  <!-- <h2>Adngin</h2> -->

  <p>Do you have an Adngin account? If not, <a href="#">create one</a> - it's 100% free.</p>

  <p>Connect your site to Adngin</p>

  <?php if ($valid === true): ?>
    <div class="updated">
      <p>API key is valid.</p>
    </div>
  <?php endif; ?>

  <?php if ($valid === false): ?>
    <div class="error">
      <p>API key is not valid.</p>
    </div>
  <?php endif; ?>

  <form method="post">

  	<input class="regular-text" type="text" name="adngin_api_key" value="<?php echo get_option('adngin_api_key') ?>">
  	<button class="button button-primary" type="submit">Remember and Verify API Key</button>

  </form>

  <p>Need help? <a href="#">Contact Us!</a></p>

</div>