
<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Laravel 8</title>
 <style>
  .container{
   position:relative;
  }
  .listuser{
   position:absolute;
   top:300px;
   right:200px
   
  }
  table td {
  border: 1px solid;
  width: 50%;
}
.w-5{
 display:none
}
 </style>
</head>
<body>
 <div class="container">
  <div class="listuser">
  <h1 style="color:red">LIST USERS</h1>
  <table>
   <tr>
    <td><b>Name</b></td>
    <td><b>Email</b></td>
    <td><b>Image</b></td>
   </tr>
   <tr>
   <?php $__currentLoopData = $user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $users): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <td><?php echo e($users->name); ?></td>
  <td><?php echo e($users->email); ?></td>
 <td><img width=100% src="<?php echo e(URL::to('/' .$users->image)); ?>" alt="Image"/></td>
   </tr>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </table>
  <br>
  <span id="navigaton"><?php echo e($user->links()); ?></span>
  </div>
 </div> 
</body>
</html>
<?php echo $__env->make('dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\webgame\resources\views/auth/users.blade.php ENDPATH**/ ?>