<section class="pt-5">
    <div class="container h-100vh mb-5 p-3">
        <div class="row justify-content-center">
            <div class="text-center">
                <h3 class="mb-4"><?php echo trans('Gallery') ?></h3>
            </div>
            
            <div class="col-lg-12 br-10 minh-400s">
                <div class="preloader">
                    <!-- <div class="container text-center"><div class="spinner-md"></div></div> -->
                </div>

             
            
                <?php if (empty($galleries)): ?>
                    <div class="text-center">
                        <p class="text-muted m-auto pt-4"><?php echo trans('no-data-found') ?></p>
                    </div>
                <?php else: ?>
                <div class="jf-gallery">
                    <?php foreach ($galleries as $image): ?>
                        <a href="<?php echo base_url($image->image); ?>" data-lightbox="example-set" data-title="<?php echo html_escape($image->title); ?>">
                        <img src="<?php echo base_url($image->image); ?>" alt="A windmill" />
                     </a>
                    <?php endforeach ?>
                  
                </div>
                <?php endif ?>

            </div>

        </div>
    </div>
</section>


