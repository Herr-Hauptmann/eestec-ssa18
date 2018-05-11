<section class="container-fluid marginContainer novosti-cont">
    <p class="sectionHeadline"><b>novosti</b></p>
    <p class="sectionHeadlineBottomRed"></p>
    <div class="row">
        <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-md-6">
            <a href="<?php echo e(route('jednaNovost', $post->id)); ?>" class="a-mainNewsDiv">
                <div class="mainNewsDiv">
                    <div>
                        <img class="img-responsive newsImg" src="<?php echo e(asset($post->image_url)); ?>" />
                    </div>
                    <div class="newsMainDate">
                        <p class="newsDayMargin"><?php echo e($post->created_at->day); ?>.</p>
                        <p><?php echo e(jdmonthname($post->created_at->month, 2)); ?></p>
                    </div>
                    <div>
                        <p class="newsArticleHeader"><?php echo e($post->title); ?></p>
                        <div class="newsArticleText"><?php echo e(strip_tags($post->content)); ?></div>
                    </div>
                </div>
            </a>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <div class="container-fluid newsMoreDiv">
        <p><a class="newsMoreText" href="<?php echo e(route('novosti')); ?>">Više novosti...</a></p>
    </div>
    <script>
        $(function() {
            $(window).resize(function() {
                responsiveDateDiv();
            });

            let responsiveDateDiv = function() {
                let imgHeight = $($(".newsImg")[0]).height();
                if (imgHeight != 0) {
                    $.each($(".newsMainDate"), function(index, value) {
                        if ($(window).width() > 768) {
                            $(value).css("top", (imgHeight - 80) + "px");
                        } else {
                            $(value).css("top", (imgHeight - 35) + "px");
                        }
                    });
                }
            };
            responsiveDateDiv();
        });
    </script>
</section>