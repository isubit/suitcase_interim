<header<?php print $attributes; ?>>
  <div id="section-header-container">
    <div id="skip-link">
      <a href="#main-content" class="element-invisible element-focusable"><?php print t('Skip to main content'); ?></a>
    </div>
    <?php if ($show_blackbar): ?>
      <div class="pwrapper">
        <div class="pwrapper-wrapper">
          <div class="hwrapper" id="header">
            <div class="isu-dark-ribbon" id="top-strip">
              <div class="clearfix wrapper container-12">
                <ul class="isu-responsive-toggles wd-ribbon-menu">
                  <li><a class="search-toggle wd-ribbon-menu-header" href="http://www.iastate.edu/">iastate.edu</a></li>
                </ul>
                <div class="wd-ribbon-menu-stack">
                  <ul class="isu-index wd-ribbon-menu-group first">
                    <li>
                      <ul class="wd-ribbon-menu">
                        <li class="first"><a href="https://www.iastate.edu">iastate.edu</a></li>
                        <li>
                          <ul class="isu-alpha-index wd-ribbon-menu-group">
                            <li class=""><a href="http://www.iastate.edu/index/A/">A</a></li><li class=""><a href="http://www.iastate.edu/index/B/">B</a></li><li class=""><a href="http://www.iastate.edu/index/C/">C</a></li><li class=""><a href="http://www.iastate.edu/index/D/">D</a></li><li class=""><a href="http://www.iastate.edu/index/E/">E</a></li><li class=""><a href="http://www.iastate.edu/index/F/">F</a></li><li class=""><a href="http://www.iastate.edu/index/G/">G</a></li><li class=""><a href="http://www.iastate.edu/index/H/">H</a></li><li class=""><a href="http://www.iastate.edu/index/I/">I</a></li><li class=""><a href="http://www.iastate.edu/index/J/">J</a></li><li class=""><a href="http://www.iastate.edu/index/K/">K</a></li><li class=""><a href="http://www.iastate.edu/index/L/">L</a></li><li class=""><a href="http://www.iastate.edu/index/M/">M</a></li><li class=""><a href="http://www.iastate.edu/index/N/">N</a></li><li class=""><a href="http://www.iastate.edu/index/O/">O</a></li><li class=""><a href="http://www.iastate.edu/index/P/">P</a></li><li class=""><a href="http://www.iastate.edu/index/Q/">Q</a></li><li class=""><a href="http://www.iastate.edu/index/R/">R</a></li><li class=""><a href="http://www.iastate.edu/index/S/">S</a></li><li class=""><a href="http://www.iastate.edu/index/T/">T</a></li><li class=""><a href="http://www.iastate.edu/index/U/">U</a></li><li class=""><a href="http://www.iastate.edu/index/V/">V</a></li><li class=""><a href="http://www.iastate.edu/index/W/">W</a></li><li class=""><a href="http://www.iastate.edu/index/X/">X</a></li><li class=""><a href="http://www.iastate.edu/index/Y/">Y</a></li><li class="last"><a href="http://www.iastate.edu/index/Z/">Z</a></li>
                          </ul>
                        </li>
                      </ul>
                    </li>
                  </ul>
                  <ul class="isu-directory-info wd-ribbon-menu-group last">
                    <li>
                      <a class="wd-ribbon-menu-header" href="http://info.iastate.edu">Directory</a>
                      <ul class="wd-ribbon-menu">
                        <li class="first"><a href="http://info.iastate.edu/">Directory</a></li>
                        <li><a href="http://www.fpm.iastate.edu/maps/">Maps</a></li>
                        <li><a href="http://web.iastate.edu/safety/">Safety</a></li>
                        <li><a href="https://www.it.iastate.edu/signons/">Sign Ons</a></li>
                      </ul>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    <?php endif; ?>
    <?php print $content; ?>
  </div>
</header>
