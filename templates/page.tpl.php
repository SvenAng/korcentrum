
<?php
  // Logik för bakgrundsbilderna. Bilder och färger sätts i components/background.scss
// Denna kan man villkora med $node->type == NULL
// print $node->field_omr_de['und'][0]['tid'];
// $node is not set for all pages
// kontrollerar om sidan är en nod
  if ( !empty($node) ) {
    $node = node_load($node->nid); 
    if($node->field_omr_de['und'][0]['tid'] == NULL){
      $tidd = "normal";
    }else{
      $tidd = $node->field_omr_de['und'][0]['tid'];
    }
  }else{
    $tidd = "front";
  }
?>

<div class="background-<?php print $tidd; ?>">
    
    <!-- Off Canvas Menu -->
    <aside class="left-off-canvas-menu">
        <?php print render($page['offcanvas']); ?>
    </aside>
  <a class="exit-off-canvas"></a>

    <!--.page -->
    <div role="document" class="page">

      <!--.l-header -->
      <header role="banner" class="l-header">
      
          <?php //print $variables['node']->type; ?>
          <!--.l-header-region -->
          <section class="l-header-region row korcentrum-header">
            <div class="rows">
              
              <nav class="tab-bar small-12 medium-1 columns hide-for-large-up">
                <a class="left-off-canvas-toggle menu-icon" href="#" ><span></span></a>
              </nav>

              <div class="columns small-12 medium-6 large-4 logo">
                
                <div class="columns small-12 medium-4 large-4 logo-wrapper">
                  <?php if ($linked_logo): print $linked_logo; endif; ?>
                </div>
                <div class="columns small-12 medium-8 large-8 title-slogan">
                  <h2 class="site-name">
                        <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><span><?php print $site_name; ?></span></a>
                  </h2>
                  <?php if ($site_slogan): ?>
                    <h3 title="<?php print $site_slogan; ?>" class="site-slogan"><?php print $site_slogan; ?></h3>
                  <?php endif; ?>
                </div>
              
              </div>

              <div class="columns small-9 medium-4 large-5 hide-for-medium-down">
                <p></p>
              </div>

              <div class="columns small-12 medium-3 large-3 kiv-logo">
                <a href="http://kulturivast.se" target="_blank"><img src="/sites/all/themes/korcentrum/images/kivlogo.png"></a>
              </div>        
              
              
            
            </div>
            
          </section>

          <div class="row mainmenu">
            <nav class="main-nav columns medium-8 medium-centered hide-for-medium-down">
                  <?php print render($page['header']); ?>
            </nav>
          </div>   

          <!--/.l-header-region -->
        
      </header>
        
      <?php if (!empty($page['frontpage_gallery'])): ?>
        <!--.l-featured -->
        <section class="l-frontpage-gallery row">
          
            <?php print render($page['frontpage_gallery']); ?>
          
        </section>
        <!--/.l-featured -->
      <?php endif; ?>

      <?php if (!empty($page['featured'])): ?>
        <!--.l-featured -->
        <section class="l-featured row">
          <div class="columns">
            <?php print render($page['featured']); ?>
          </div>
        </section>
        <!--/.l-featured -->
      <?php //else: ?>
        <!-- <section class="l-featured-i row"> -->
          <!-- <div class="columns"> -->
            <!-- <div class="invisible-plug"></div> -->
          <!-- </div> -->
        <!-- </section>   -->
      <?php endif; ?>

      <?php if ($messages && !$zurb_foundation_messages_modal): ?>
        <!--.l-messages -->
        <section class="l-messages row">
          <div class="columns">
            <?php if ($messages): print $messages; endif; ?>
          </div>
        </section>
        <!--/.l-messages -->
      <?php endif; ?>

      <?php if (!empty($page['help'])): ?>
        <!--.l-help -->
        <section class="l-help row">
          <div class="columns">
            <?php print render($page['help']); ?>
          </div>
        </section>
        <!--/.l-help -->
      <?php endif; ?>
      
      <?php $sokvag = url($_GET['q']);?>
      
      
      <!--.l-main -->
      <!-- // Dessa grejer är lite oklara DEV -->

      <?php if ((url($_GET['q']) == "/startsida") || (url($_GET['q']) == "/evenemang") || (url($_GET['q']) == "/evenemang-arkiv") || (url($_GET['q']) == "/pressbilder")) : ?>
           <?php $main_grid_repub = "medium-12"; ?>
      <?php elseif(empty($page['sidebar_second']) && (url($_GET['q']) != "/startsida")): ?>     
          <?php $main_grid_repub = "medium-8 medium-centered"; ?>
      <?php else: ?>
          <?php $main_grid_repub = "medium-8"; ?>
      <?php endif; ?>

       <!-- -s- -->

      <main role="main" class="row l-main">
        <!-- .l-main region -->
        <?php if ($title): ?>
            <?php print render($title_prefix); ?>
            <h1 id="page-title" class="title columns small-12 <?php print $main_grid_repub; ?>"><?php print $title; ?></h1>
            <?php print render($title_suffix); ?>
          <?php endif; ?>
         
        <div class="<?php print $main_grid; ?> main columns">
          <?php if (!empty($page['highlighted'])): ?>
            <div class="highlight panel callout">
              <?php print render($page['highlighted']); ?>
            </div>
          <?php endif; ?>

          <a id="main-content"></a>

          <?php //if ($breadcrumb): print $breadcrumb; endif; ?>

          <?php //if ($title): ?>
            <?php //print render($title_prefix); ?>
            <!-- <h1 id="page-title" class="title"><?php //print $title; ?></h1> -->
            <?php //print render($title_suffix); ?>
          <?php //endif; ?>

          <?php if (!empty($tabs)): ?>
            <?php print render($tabs); ?>
            <?php if (!empty($tabs2)): print render($tabs2); endif; ?>
          <?php endif; ?>

          <?php if ($action_links): ?>
            <ul class="action-links">
              <?php print render($action_links); ?>
            </ul>
          <?php endif; ?>
        
            <?php if (!empty($page['sidebar_second_eventmeta'])): ?>
            <aside role="complementary" class="small-event-meta visible-for-small-down">
                <?php print render($page['sidebar_second_eventmeta']); ?>
            </aside>
            <?php endif; ?>
            
          <?php print render($page['content']); ?>
        </div>
        <!--/.l-main region -->

        <?php if (!empty($page['sidebar_first'])): ?>
          <aside role="complementary" class="<?php print $sidebar_first_grid; ?> sidebar-first columns sidebar">
            <?php print render($page['sidebar_first']); ?>
          </aside>
        <?php endif; ?>
          
        <?php if (!empty($page['sidebar_second_eventmeta'])): ?>
          <div role="complementary" class="<?php print $sidebar_sec_grid; ?> sidebar-second columns sidebar">
              <aside class="medium-event-meta visible-for-medium-up">
                  <h5>Fakta</h5>
                  <?php print render($page['sidebar_second_eventmeta']); ?>
              </aside>
              
          </div>
          
        <?php endif; ?>
        <?php if (!empty($page['sidebar_second'])): ?>
          <div role="complementary" class="<?php print $sidebar_sec_grid; ?> sidebar-second columns sidebar">
              
              <div>
                  <?php print render($page['sidebar_second']); ?> 
              </div>
          </div>
          
        <?php endif; ?>
        
          
      </main>
      <!--/.l-main -->

      <?php if (!empty($page['triptych_first']) || !empty($page['triptych_middle']) || !empty($page['triptych_last'])): ?>
        <!--.triptych-->
        <section class="l-triptych row">
          <div class="triptych-first medium-12 column">
            <?php print render($page['triptych_first']); ?>
          </div>
          
        </section>
        <!--/.triptych -->
      <?php endif; ?>

        <!--start foot--><div class="foot row">
        <?php if (!empty($page['footer_firstcolumn']) || !empty($page['footer_secondcolumn']) || !empty($page['footer_thirdcolumn']) || !empty($page['footer_fourthcolumn'])): ?>
        <!--.footer-columns -->
        <div class="footer-wrapper columns">

            <section class="l-footer-columns row">
                <?php if (!empty($page['footer_firstcolumn'])): ?>
                <div class="footer-first medium-3 columns">
                    <?php print render($page['footer_firstcolumn']); ?>
                </div>
                <?php endif; ?>
                <?php if (!empty($page['footer_secondcolumn'])): ?>
                <div class="footer-second medium-3 columns">
                    <?php print render($page['footer_secondcolumn']); ?>
                </div>
                <?php endif; ?>
                <?php if (!empty($page['footer_thirdcolumn'])): ?>
                <div class="footer-third medium-3 columns">
                    <?php print render($page['footer_thirdcolumn']); ?>
                </div>
                <?php endif; ?>
                <?php if (!empty($page['footer_fourthcolumn'])): ?>
                <div class="footer-fourth medium-3 columns">
                    <?php print render($page['footer_fourthcolumn']); ?>
                </div>
                <?php endif; ?>
            </section>

            <section class="l-footer-columns-bottom row">
                <?php if (!empty($page['footer_firstcolumn_bottom'])): ?>
                <div class="footer-first medium-3 columns">
                    <?php print render($page['footer_firstcolumn_bottom']); ?>
                </div>
                <?php endif; ?>
                <?php if (!empty($page['footer_secondcolumn_bottom'])): ?>
                <div class="footer-second medium-3 columns">
                    <?php print render($page['footer_secondcolumn_bottom']); ?>
                </div>
                <?php endif; ?>
                <?php if (!empty($page['footer_thirdcolumn_bottom'])): ?>
                <div class="footer-third medium-3 columns">
                    <?php print render($page['footer_thirdcolumn_bottom']); ?>
                </div>
                <?php endif; ?>
                <?php if (!empty($page['footer_fourthcolumn_bottom'])): ?>
                <div class="footer-fourth medium-3 columns">
                    <?php print render($page['footer_fourthcolumn_bottom']); ?>
                </div>
                <?php endif; ?>
            </section>


            <!--.l-footer -->
            <div class="footer-wrapper-bottom">
                <footer class="l-footer row" role="contentinfo">
                    <?php if (!empty($page['footer'])): ?>
                    <div class="footer columns">
                        <?php print render($page['footer']); ?>
                    </div>
                    <?php endif; ?>
                </footer>
            </div>
            <!--/.l-footer -->

        </div>
        <!--/.footer-columns-->
        <?php endif; ?>


        </div> <!--ende foot-->

      <?php if ($messages && $zurb_foundation_messages_modal): print $messages; endif; ?>
    </div>
    
    <!--/.page -->
    
  </div>


