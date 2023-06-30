<footer class="page-footer">
    {{-- <p class="mb-0">Copyright © 2021. All right reserved.</p> --}}

    <p class="mb-0">
    © <?php
    $copyYear = 2019; // Set your website start date
    $curYear = date('Y'); // Keeps the second year updated
    echo $copyYear . (($copyYear != $curYear) ? ' - ' . $curYear : '');
    ?>
    Designed and Developed by <a class="text-primary" href="https://www.newinfo.com.ng/" target="_blank">Newinfo Global Solutions Ltd</a>.

    <span  style="float:right" >This page took {{ round(microtime(true) - LARAVEL_START, 3) }} seconds to render</span>
</p>
</footer>




