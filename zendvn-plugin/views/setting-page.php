
<div class="wrap">
    <h1>Setting</h1>
    <p> pplskjsa</p>
    <?php settings_errors( $this->_menu_slug, false, false ); ?>
    <form action="options.php" method="POST" id="<?php echo $this->_menu_slug;?>" enctype="multipart/form-data">

    <?php
       echo  settings_fields($this->_menu_slug);
    ?>
    <?php
       echo do_settings_sections( $this->_menu_slug );
    ?>
    <p class="submit">
        <input type="submit" class="button button-primary" name="submit" value="save">
    </p>
    </form>
</div>
