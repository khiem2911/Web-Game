<?php $__env->startSection('content'); ?>
<?php if(!empty($check)): ?>

<?php endif; ?>
<div class="detail">
<?php if(!empty($data)): ?>
<div id="imgDetail">
<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<img style="width:400px;height:200px" src="<?php echo e(URL::to('/assets/img/'.$item->imgPro)); ?>" alt="">
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<div class="headerDetail">
<div>
<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<p>Sản phẩm</p>
<h1><?php echo e($item->nameProduct); ?></h1>
<div class="littleDetail">
<i class="fas fa-box"></i>
<p  class="text">Tình trạng: <?php echo e($item->status); ?></p>
</div>
<div class="littleDetail">
<i class="fas fa-tag"></i>
<p  class="text">Thể loại: <?php echo e($item->nameCate); ?></p>
</div>
<div class="littleDetail">
<p > <?php echo number_format($item->price).'Đ' ?></p>
<button class='btn'><i class="fas fa-bell"></i></button>
<a href="<?php echo e(URL::to('/add/'.$item->proId)); ?>"><button class='btn'><i class="fas fa-heart"> </i></button></a>
</div>
<div class="littleDetail">
<p  class="text">Mô tả: <?php echo e($item->description); ?></p>
</div>
<div class="btnCart">
<a href= "<?php echo e(URL::to('/viewCart')); ?>" ><i class="fa-solid fa-credit-card" style="color:white"></i>Mua ngay</a>
<button onclick="AddCart(<?php echo e($item->proId); ?>)" id="btn-addnow"><p style="color:#5c9bf5;padding-left:10px;"><i class="fas fa-cart-plus" style="color:#5c9bf5"></i>Thêm vào giỏ</p></button>
</div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php endif; ?>
</div>
<div style="margin-left:100px;margin-right:100px;">
<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<form action="<?php echo e(route('store')); ?>" method="POST" class="mt-5">
        <h2>Bình luận</h2>
    <?php echo csrf_field(); ?>
                <div class="mb-4">
                    <input type="text"  class="form-control" id="content" name="content">
                </div>
                
                <input placeholder="Nhập nội dung bình luận" type="hidden" value="<?php echo e($item->proId); ?>" name="proid" id="product_id">
                <button style="margin-bottom:20px" id="btn-checkout"><p style="color:white"><i class="fas fa-paper-plane"></i>Send</p></button>
    </form>
    </div>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php if(!empty($comment)): ?>
    <div style="margin-left:100px;margin-right:100px;">
    </div>
            <?php $__currentLoopData = $comment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comments): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div style="display:flex;flex-direction:'row'">
    <p><?php echo e($comments->username); ?></p>
    </div>
            <p  style="padding-left:130px"><?php echo e($comments->content); ?></p>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
    </div>
    <?php endif; ?>

<div >
<h2 style="margin-left:100px;">Sản phẩm liên quan</h2>

   <div class="detailRelate">
   <?php if(!empty($relate)): ?>
   <?php $__currentLoopData = $relate; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
   <a href="<?php echo e(URL::to('/detail/'.$item->nameProduct)); ?>">
<img style="width:230px;height:150px;" src="<?php echo e(URL::to('/assets/img/'.$item->imgPro)); ?>" alt="">
</a>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
   <?php endif; ?>
   </div>
</div>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/custom.css')); ?>" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <script src="https://www.tutorialspoint.com/jquery/jquery-3.6.0.js"></script>
<script>

   function AddCart(id) {
      console.log(id)
      $.ajax({
                url: "/addCart/"+id,
                type:'GET'}).
                done(function(data) {
                  
                if(data=="Chưa đăng nhập")
                {
                  window.location="/login";
                }
                else
                {
                  alert(data)
                }
                });
   }
   
    
</script>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('headerpage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Admin\Desktop\Web-Game\resources\views/Pages/detail.blade.php ENDPATH**/ ?>