<?php

namespace CustomFooter
{
  class FooterController extends \WpMvc\BaseController
  {
    public function index()
    {
      global $site;

      $site = \WpMvc\Site::find( 1 );

      $this->create_attribute_if_not_exists( $site, 'footer_content' );

      if ( $_SERVER['REQUEST_METHOD'] == 'POST' && isset( $_GET['page'] ) && $_GET['page'] == 'custom_footer_settings' ) {
        $site->takes_post( $_POST['site'] );

        $site->save();

        static::redirect_to( "{$_SERVER['REQUEST_URI']}&custom_footer_updated=1" );
      }

      $this->render( $this, "index" );
    }

    private function create_attribute_if_not_exists( &$site, $attribute )
    {
      if ( ! isset( $site->sitemeta->{$attribute} ) ) {
        $site->sitemeta->{$attribute} = \WpMvc\SiteMeta::virgin();
        $site->sitemeta->{$attribute}->site_id = $site->id;
        $site->sitemeta->{$attribute}->meta_key = "$attribute";
        $site->sitemeta->{$attribute}->meta_value = "";
        $site->sitemeta->{$attribute}->save();
      }
    }
  }
}
