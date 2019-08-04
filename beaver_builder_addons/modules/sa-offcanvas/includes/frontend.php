<?php
/**
 * @package shortcode addons
 */
//echo '<pre>';
//print_r(jQuerysettings);
//echo '</pre>';
?>


<div clas="oxi_sa_offcanvas_wrapter">
    <main class="c-offcanvas-content-wrap" role="main">
        <div class="o-wrapper">
            <a class="sa-offcanvas-trigger-left" href="#left" >Left</a>
            <a class="sa-offcanvas-trigger" data-offcanvas-trigger="right" href="#right">Right</a>
            <a class="sa-offcanvas-trigger" data-offcanvas-trigger="top" href="#top">Top</a>
            <a class="sa-offcanvas-trigger" data-offcanvas-trigger="bottom" href="#bottom">Bottom</a>
        </div>
    </main>

    <aside id="left" role="complementary">

        <button class="sa-offcanvas-close">Close</button>
    </aside>

    <aside class="sa-offcanvas" data-offcanvas-options='{"modifiers":"right,overlay"}' id="right" role="complementary">

        <button class="sa-offcanvas-close" data-button-options='{"modifiers":"m1,m2"}'>Close</button>
    </aside>

    <aside class="sa-offcanvas" data-offcanvas-options='{"modifiers":"top,fixed,overlay"}' id="top" role="complementary">

        <a data-focus href="#">Test</a>
        <button data-focus class="sa-offcanvas-close" data-button-options='{"modifiers":"m1,m2"}'>Close</button>
    </aside>
    <aside class="sa-offcanvas" data-offcanvas-options='{"modifiers":"bottom, fixed, overlay"}' id="bottom" role="complementary">

        <button class="sa-offcanvas-close" data-button-options='{"modifiers":"m1,m2"}'>Close</button>
    </aside>

</div>




