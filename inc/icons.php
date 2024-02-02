<?php
function wave_border( $color = '#ffba6b', $background_color = '#fff' ) { ?>
    <div class="wave-border">
        <div class="border">
            <svg viewBox="0 0 2106.01 138.082" preserveAspectRatio="none">
                <path d="M0,0C205.069,0,205.069,82.928,410.144,82.928S615.219,0,820.3,0s205.087,82.928,410.174,82.928S1435.566,0,1640.665,0c203.657,0,205.083,81.771,410.19,82.928"
                      transform="translate(27.5 27.5)"
                      fill="none"
                      stroke="<?= $color ?>"
                      stroke-linecap="round"
                      stroke-miterlimit="10"
                      stroke-width="55"/>
            </svg>

        </div>

        <div class="border-bg">
            <svg xmlns="http://www.w3.org/2000/svg" width="2076.059" height="145.344" viewBox="0 0 2106.01 138.082">
                <path id="Path_47835" data-name="Path 47835" d="M-21253.912,4049.282v52.4l191.525,30.557,276.3,35.1,379.131-65.655,273.951,54.729,245.246,23.034,332.652-89.939,377.256,105.117V4049.282Z" transform="translate(21253.912 -4049.282)" fill="<?= $background_color ?>"/>
            </svg>
        </div>
    </div>
<?php }

function icon_search() { ?>
    <svg xmlns="http://www.w3.org/2000/svg" width="19.548" height="22.314" viewBox="0 0 19.548 22.314">
        <g id="Group_842" data-name="Group 842" transform="translate(1 1)">
            <ellipse id="Ellipse_181" data-name="Ellipse 181" cx="8" cy="7.5" rx="8" ry="7.5" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
            <line id="Line_548" data-name="Line 548" x2="4.374" y2="5.467" transform="translate(12.769 14.442)" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
        </g>
    </svg>
<?php }