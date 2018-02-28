<?php
/**
 * PHP library for adding addition of complements for Eliasis Framework.
 *
 * @author    Josantonius <hello@josantonius.com>
 * @copyright 2017 - 2018 (c) Josantonius - Eliasis Complement
 * @license   https://opensource.org/licenses/MIT - The MIT License (MIT)
 * @link      https://github.com/eliasis-framework/complement
 * @since     1.0.8
 */
use Eliasis\Framework\View;

$options = json_encode(View::getOption());
?>
<div id="eliasis-complements" :options='setConfiguration(<?= $options ?>)'>

    <vue-simple-notify :items="errors"></vue-simple-notify>

    <vue-module-manager
      :items="items"
      :translations="translations"
      v-on:on-active="onActive"
      v-on:on-inactive="onInactive"
      v-on:on-update="onUpdate"
      v-on:on-install="onInstall"
      v-on:on-uninstall="onUninstall"
    ></vue-module-manager>

</div>
