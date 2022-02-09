<?php 
// Control core classes for avoid errors
if( class_exists( 'CSF' ) ) {

  //
  // Set a unique slug-like ID
  $prefix = 'tp_opt';

  //
  // Create options
  CSF::createOptions( $prefix, array(
    'menu_title' => 'Theme Options',
    'menu_slug'  => 'my-framework',
    'framework_title' => 'Theme Options',
  ) );

  // logo
  CSF::createSection( $prefix, array(
    'title'  => 'Header',
    'fields' => array(

      array(
        'id'    => 'logo',
        'type'  => 'media',
        'title' => 'Logo Main',
        'preview' => false,
        'library' => 'image',
      ),
    )
  ) );
  // Footer
  CSF::createSection( $prefix, array(
    'title'  => 'Footer',
    'fields' => array(
      array(
        'id'    => 'logo_footer',
        'type'  => 'media',
        'title' => 'Logo Footer',
        'preview' => false,
        'library' => 'image',
      ),
      array(
        'id'      => 'footer-about',
        'type'    => 'textarea',
        'title'   => 'Footer Content',
        'default' => ''
      ),      
      array(
        'id'      => 'footer-email',
        'type'    => 'text',
        'title'   => 'Footer Email',
        'default' => ''
      ),
      array(
        'id'      => 'footer-phone',
        'type'    => 'text',
        'title'   => 'Footer Phone',
        'default' => ''
      ),      
      array(
        'id'      => 'footer-copy',
        'type'    => 'text',
        'title'   => 'Footer Copyright',
        'default' => ''
      ),
    )
  ) );

  // Social Media Tab
  CSF::createSection( $prefix, array(
    'title'  => 'Social Media',
    'fields' => array(
      array(
        'id'    => 'footer_instagram',
        'type'  => 'text',
        'title' => 'Instagram',
        'placeholder' =>'Enter Instagram Link In this field',
      ),      
      array(
        'id'    => 'footer_facebook',
        'type'  => 'text',
        'title' => 'Facebook',
        'placeholder' =>'Enter Facebook Link In this field',
      ),      
      array(
        'id'    => 'footer_twitter',
        'type'  => 'text',
        'title' => 'Twitter',
        'placeholder' =>'Enter Twitter Link In this field',
      ),      
      array(
        'id'    => 'footer_yt',
        'type'  => 'text',
        'title' => 'YouTube',
        'placeholder' =>'Enter YouTube Link In this field',
      ),      
      array(
        'id'    => 'footer_linked',
        'type'  => 'text',
        'title' => 'LinkedIn',
        'placeholder' =>'Enter LinkedIn Link In this field',
      ),
    )
  ));

}


?>