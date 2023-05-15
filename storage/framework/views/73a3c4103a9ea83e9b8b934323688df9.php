<?php $__env->startSection('content'); ?>
<div style="margin-top:50px;" class="main-productnew">
       <h1>TOP GAMES</h1>
    </div>
<div id="pronew-main">
<?php if(!empty($data)): ?>
    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="pronew">
          <a href="">
        <img style="width:350px;height:200px" src="<?php echo e(URL::to('/assets/img/' .$item->imgPro)); ?>" alt="">
        <p><?php echo e($item->nameProduct); ?></p>
        <?php echo number_format($item->price).'Đ' ?>
        </a>
       </a>
       </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php echo e($data->links()); ?>

    <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Admin\Desktop\Web-Game\resources\views/topgames.blade.php ENDPATH**/ ?>