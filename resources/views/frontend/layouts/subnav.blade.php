<!-- SUB NAV bg-subnuv -->
<!-- PAGE TITLE -->
<?php if (isset($toolbar_title)) : ?>
<section class="bg-light py-4">
    <div class="container">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb fs--14">
                <li class="breadcrumb-item"><a href="#!" class="">Pages</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?php echo $toolbar_page; ?></li>
            </ol>
        </nav>
        <h1 class="h3 font-weight-normal mt-2">
            <?php echo $toolbar_title; ?>
        </h1>

    </div>
</section>
 <?php endif; ?>
<!-- /PAGE TITLE -->
<!-- /SUB NAV -->