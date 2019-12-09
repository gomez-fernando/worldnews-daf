<?php $__env->startSection('title'); ?>
    <title>Crear nuevo artículo</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <?php echo e(__('lang.create_article')); ?>

                    </div>
                    <div class="card-body">
                        <form action="<?php echo e(route('article.store')); ?>" method="POST" id="" enctype="multipart/form-data" >

                            <?php echo csrf_field(); ?>


                            

                            <div class="form-group row">
                                <label for="authorReadOnly" class="col-md-3 col-form-label text-md-right"><?php echo e(__('lang.author')); ?></label>
                                <div class="col-md-8">
                                    <input readonly value="<?php echo e(Auth::user()->name . ' '. Auth::user()->surname); ?>" type="text" id="authorReadOnly" class="form-control" required>

                                </div>

                            </div>

                            <div class="form-group row">
                                <label for="title" class="col-md-3 col-form-label text-md-right"><?php echo e(__('lang.title')); ?></label>
                                <div class="col-md-8">
                                    <input type="text" id="title" name="title" class="form-control" value="<?php echo e(old('title')); ?>" required autofocus>

                                    
                                    <?php if($errors->has('title')): ?>
                                        <span class="alert-danger" role="alert">
                                    <strong><?php echo e($errors->first('title')); ?></strong>
                                    </span>

                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="sub_title" class="col-md-3 col-form-label text-md-right"><?php echo e(__('lang.sub_title')); ?></label>
                                <div class="col-md-8">
                                    <input type="text" id="sub_title" name="sub_title" class="form-control" value="<?php echo e(old('sub_title')); ?>" required autofocus>

                                    
                                    <?php if($errors->has('sub_title')): ?>
                                        <span class="alert-danger" role="alert">
                                    <strong><?php echo e($errors->first('sub_title')); ?></strong>
                                    </span>

                                    <?php endif; ?>
                                </div>
                            </div>










                            <div class="form-group row">
                                <label for="section" class="col-md-3 col-form-label text-md-right"><?php echo e(__('lang.section')); ?></label>
                                <div class="col-md-8">
                                    <select  type="select" id="section" name="section" class="form-control" value="<?php echo e(old('section')); ?>" required autofocus>
                                        <?php $__currentLoopData = $sections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($section->id); ?>"><?php echo e($section->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>

                                    
                                    <?php if($errors->has('section')): ?>
                                        <span class="alert-danger" role="alert">
                                    <strong><?php echo e($errors->first('section')); ?></strong>
                                    </span>

                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="image_path" class="col-md-3 col-form-label text-md-right"><?php echo e(__('lang.image')); ?></label>
                                <div class="col-md-8">

                                    <input type="file" id="image_path" name="image_path" class="form-control <?php echo e($errors->has('image_path') ? 'is-invalid' : ''); ?>" value="<?php echo e(old('image_path')); ?>" required autofocus />

                                    
                                    <?php if($errors->has('image_path')): ?>
                                        <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($errors->first('image_path')); ?></strong>
                                    </span>

                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="keywords" class="col-md-3 col-form-label text-md-right"><?php echo e(__('lang.keywords')); ?></label>
                                <div class="col-md-8">
                                    <input type="text" id="keywords" name="keywords" class="form-control"  value="<?php echo e(old('keywords')); ?>" required autofocus>

                                    
                                    <?php if($errors->has('keywords')): ?>
                                        <span class="alert-danger" role="alert">
                                    <strong><?php echo e($errors->first('keywords')); ?></strong>
                                    </span>

                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="slug" class="col-md-3 col-form-label text-md-right"><?php echo e(__('Slug')); ?></label>
                                <div class="col-md-8">
                                    <input type="text" id="slug" name="slug" class="form-control"  value="<?php echo e(old('slug')); ?>" required autofocus>

                                    
                                    <?php if($errors->has('slug')): ?>
                                        <span class="alert-danger" role="alert">
                                    <strong><?php echo e($errors->first('slug')); ?></strong>
                                    </span>

                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="text" class="col-md-3 col-form-label text-md-right"><?php echo e(__('lang.text')); ?></label>
                                <div class="col-md-8">
                                    <textarea id="text" name="text" class="form-control"  value="<?php echo e(old('text')); ?>" required autofocus></textarea>

                                    <script src="<?php echo e(asset('vendor/unisharp/laravel-ckeditor/ckeditor.js')); ?>"></script>

                                    <script>
                                        // Replace the <textarea id="editor1"> with a CKEditor
                                        // instance, using default configuration.
                                        CKEDITOR.replace( 'text' );
                                    </script>


                                    <?php if($errors->has('text')): ?>
                                        <span class="alert-danger" role="alert">
                                    <strong><?php echo e($errors->first('text')); ?></strong>
                                    </span>

                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group row justify-content-center">
                                <div class="form-group row">
                                    <div class="col-md-6 offset-md-3">
                                        <input type="submit" name="submitState" id="guardarYSalir" value="Guardar y salir" class="btn btn-primary"  />
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-6 offset-md-3">
                                        <input type="submit" name="submitState" id="enviarARevision" value="Enviar a revisión" class="btn btn-primary" />
                                    </div>
                                </div>
                            </div>

                        </form>


                </div>

            </div>
        </div>
    </div>

    <script>
        

        // $(document).ready(function(){
        //
        //     $("input[type=submit]").click(function() {
        //         var accion = $(this).attr('dir');
        //         $('form').attr('action', accion);
        //         $('form').submit();
        //     });
        //
        // });
    </script>

<?php $__env->stopSection(); ?>




<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>