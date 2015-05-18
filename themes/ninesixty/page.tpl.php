<?php
include_once('/dropdown-menu.inc.php');
?>

<div id="page" class="container-16 clearfix">

    <div class="bootstrap-wrapper header">
        <header id="navbar" role="banner" class="container">
            <div class="container">
                <div class="row">

                    <div id="branding" class="grid-4 col-md-4 clearfix">
                        <?php if ($linked_logo_img): ?>
                            <span id="logo" class="grid-1 alpha"><?php print $linked_logo_img; ?></span>
                        <?php endif; ?>
                    </div>
                    <div id="main-menu" class="col-md-8">
                        <?php
                        print_main_menu();
                        ?>
                    </div>
                </div>

                <?php
//                print_main_menu();
                ?>

                <?php if ($main_menu_links || $secondary_menu_links): ?>
                    <div id="site-menu" class="grid-12">
                        <?php print $main_menu_links; ?>
                        <?php print $secondary_menu_links; ?>
                    </div>
                <?php endif; ?>

                <?php if ($page['search_box']): ?>
                    <div id="search-box" class="grid-6 prefix-10"><?php print render($page['search_box']); ?></div>
                <?php endif; ?>
            </div>
        </header>
    </div>

    <div id="site-subheader" class="prefix-1 suffix-1 clearfix">
        <?php if ($page['highlighted']): ?>
            <div id="highlighted" class="<?php print ns('grid-14', $page['header'], 7); ?>">
                <?php print render($page['highlighted']); ?>
            </div>
        <?php endif; ?>

        <?php if ($page['header']): ?>
            <div id="header-region" class="region <?php print ns('grid-14', $page['highlighted'], 7); ?> clearfix">
                <?php print render($page['header']); ?>
            </div>
        <?php endif; ?>
    </div>


    <div id="main"
         class="column <?php print ns('grid-16', $page['sidebar_first'], 4, $page['sidebar_second'], 3) . ' ' . ns('push-4', !$page['sidebar_first'], 4); ?>">
        <?php print $breadcrumb; ?>
        <?php print render($title_prefix); ?>
        <?php if ($title): ?>
            <h1 class="title" id="page-title"><?php print $title; ?></h1>
        <?php endif; ?>
        <?php print render($title_suffix); ?>
        <?php if ($tabs): ?>
            <div class="tabs"><?php print render($tabs); ?></div>
        <?php endif; ?>
        <?php print $messages; ?>
        <?php print render($page['help']); ?>

        <div id="main-content" class="region clearfix">
            <?php print render($page['content']); ?>
        </div>

        <?php print $feed_icons; ?>
    </div>

    <?php if ($page['sidebar_first']): ?>
        <div id="sidebar-left"
             class="column sidebar region grid-4 <?php print ns('pull-12', $page['sidebar_second'], 3); ?>">
            <?php print render($page['sidebar_first']); ?>
        </div>
    <?php endif; ?>

    <?php if ($page['sidebar_second']): ?>
        <div id="sidebar-right" class="column sidebar region grid-3">
            <?php print render($page['sidebar_second']); ?>
        </div>
    <?php endif; ?>


    <div id="footer" class="prefix-1 suffix-1">
        <?php if ($page['footer']): ?>
            <div id="footer-region" class="region grid-14 clearfix">
                <?php print render($page['footer']); ?>
            </div>
        <?php endif; ?>
    </div>

</div>
