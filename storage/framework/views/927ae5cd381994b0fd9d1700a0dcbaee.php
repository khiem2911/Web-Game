<?php $__env->startSection('content'); ?>
<div class="main-product">
    <div style="margin-top:100px;" class="main-productnew">
        <p>NEW GAMES</p>
        <a href="<?php echo e(route('newgame')); ?>">Xem tất cả ></a>
    </div>
    <div id="pronew-main">
        <div class="pronew">
        <a href="<?php echo e(URL::to('/detail/Fatal Frame')); ?>">
        <img style="width:350px;height:200px" src="<?php echo e(asset('assets/img/Fatal_Frame.png')); ?>" alt="">
        <p>Fatal Frame</p>
        <p>300.000đ</p>
        </a>
        </div>
        <div class="pronew">
        <a href="<?php echo e(URL::to('/detail/Layers Of Fear')); ?>">
        <img style="width:350px;height:200px" src="<?php echo e(asset('assets/img/Layers_of_fear.png')); ?>" alt="">
        <p>Layers Of Fear</p>
        <p>200.000đ</p>
        </a>
        </div>
        <div class="pronew">
        <a href="<?php echo e(URL::to('/detail/FIFA online 4')); ?>">
        <img style="width:350px;height:200px" src="<?php echo e(asset('assets/img/Fifa_onl_4.png')); ?>" alt="">
        <p>FIFA online 4</p>
        <p>500.000đ</p>
        </a>
        </div>
    </div>
    <div style="margin-top:100px;" class="main-productnew">
        <p>TOP GAMES</p>
        <a href="<?php echo e(route('topgames')); ?>">Xem tất cả ></a>
    </div>
    <div id="pronew-main">
    <div class="pronew">
        <a href="<?php echo e(URL::to('/detail/Áo cưới giấy')); ?>">
        <img style="width:350px;height:200px" src="<?php echo e(asset('assets/img/ao-cuoi-giay.jpg')); ?>" alt="">
        <p>Áo cưới giấy</p>
        <p>50.00đ</p>
        </a>
        </div>
        <div class="pronew">
        <a href="<?php echo e(URL::to('/detail/Rules of Survival')); ?>">
        <img style="width:350px;height:200px" src="<?php echo e(asset('assets/img/Rules_survival.jpeg')); ?>" alt="">
        <p>Rules of Survival</p>
        <p>500.000đ</p>
        </a>
        </div>
        <div class="pronew">
        <a href="<?php echo e(URL::to('/detail/Blade and Soul')); ?>">
        <img style="width:350px;height:200px" src="<?php echo e(asset('assets/img/blade-and-soul.jpg')); ?>" alt="">
        <p>Blade and Soul</p>
        <p>120.000đ</p>
        </a>
        </div>
      
    </div>
    <div style="margin-top:100px;" class="main-productnew">
        <p>SALE GAMES</p>
        <a href="<?php echo e(route('salegames')); ?>">Xem tất cả ></a>
    </div>
    <div id="pronew-main">
    <div class="pronew">
        <a href="<?php echo e(URL::to('/detail/Pokemon Cafe Mix')); ?>">
        <img style="width:350px;height:200px" src="<?php echo e(asset('assets/img/pokemon_cafe_mix.jpg')); ?>" alt="">
        <p>Pokemon Cafe Mix</p>
        <p class='price'> <?php echo number_format(270000).'Đ' ?></p>
        <p><?php echo (number_format(245700)).'Đ' ?></p>
        </a>
        </div>
        <div class="pronew">
        <a href="<?php echo e(URL::to('/detail/Genshin Impact')); ?>">
        <img style="width:350px;height:200px" src="<?php echo e(asset('assets/img/Genshin_Impact.jpg')); ?>" alt="">
        <p>Genshin Impact</p>
        <p class='price'> <?php echo number_format(200000).'Đ' ?></p>
        <p><?php echo (number_format(178000)).'Đ' ?></p>
        </a>
        </div>
        <div class="pronew">
        <a href="<?php echo e(URL::to('/detail/Counter Side')); ?>">
        <img style="width:350px;height:200px" src="<?php echo e(asset('assets/img/Counter_Side.jpg')); ?>" alt="">
        <p>Counter Side</p>
        <p class='price'> <?php echo number_format(270000).'Đ' ?></p>
        <p><?php echo (number_format(256500)).'Đ' ?></p>
        </a>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Admin\Desktop\Web-Game\resources\views/Pages/welcome.blade.php ENDPATH**/ ?>