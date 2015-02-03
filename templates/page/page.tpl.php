<header role="banner">

        <div class="sm-4 md-2">
            <?php if ($logo): ?>
                    <a href="<?php print $front_page; ?>" title="<?php print $site_name; ?>">
                        <img src="<?php print $logo; ?>" alt="<?php print $site_name; ?>" />
                    </a>
            <?php endif; ?>
        </div>
        
        <div class="sm-8 md-10">
            <h1><?php print $title; ?></h1>
            <?php print render($page['header']); ?>
        </div>

</header>
  
<?php if ($main_menu): ?>
        <nav id="main-menu" role="navigation">
            <?php print theme('links__system_main_menu', array(
              'links' => $main_menu,
              'attributes' => array(
                'id' => 'main-menu-links',
                'class' => array('links', 'clearfix', 'list-inline'),
              ),
              'heading' => array(
                'text' => t('Main menu'),
                'level' => 'h2',
                'class' => array('element-invisible'),
              ),
            )); ?>
        </nav> <!-- #main-menu -->
<?php endif; ?>

<section role="main">
        
        <div class="container">
        
            <div class="<?php if ($page['sidebar_first'] && $page['sidebar_second']): ?>sm-6<?php elseif ($page['sidebar_first']): ?>sm-9<?php elseif ($page['sidebar_second']): ?>sm-9<?php else: ?>xs-12<?php endif; ?>">
            
                <?php print $breadcrumb; ?>
                
                <?php print $messages; ?>
                
                <?php print render($page['help']); ?>
                
                <?php if (!empty($tabs)): ?>
                    <?php print render($tabs); ?>
                <?php endif; ?>
                
                <?php print render($page['page_top']); ?>
                
                <?php print render($page['content']); ?>
                
                <?php print render($page['page_bottom']); ?>
                
            </div> <!-- End main content box -->
            
            <?php if ($page['sidebar_first']): ?>
            <div class="sm-3">
                
                <?php print render($page['sidebar_first']); ?>
                
            </div> <!-- End first sidebar -->
            <?php endif; ?>
            
            <?php if ($page['sidebar_second']): ?>
            <div class="sm-3">
                
                <?php print render($page['sidebar_second']); ?>
                
            </div> <!-- End second sidebar -->
            <?php endif; ?>
        
        </div> <!-- End container -->
            
</section>

<footer>
    <?php print render($page['footer']); ?>
</footer>

<div id="modal1" data-modal>
    <?php print render($page['modal1']); ?>
    <span data-modal-close></span>
</div>

<div id="modal2" data-modal>
    <?php print render($page['modal2']); ?>
    <span data-modal-close></span>
</div>