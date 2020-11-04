<style>
body {
    padding-top: 50px;
    }
</style>


<div class="container-fluid header">
    <div style="  margin-bottom: 20px;"></div>
    <div class="container">
        <div class="row">
            <form role="form" method="POST" action="">
                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                <span class=""></span>
                </div>
                    <div class="row ">
                        <div class="form-group col-md-4">
                            <div class="input-group">
                                <span class="input-group-addon"></span>
                                <input name="autocomplete_d" id="autocomplete_d" type="text" placeholder="Secteur" class="form-control" value="<?php echo e(old('autocomplete_d')); ?>" required>
                                <span class="input-group-addon"><span class="color-green fa fa-pencil"></span></span>
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <div class="input-group">
                                <span class="input-group-addon"></span>
                                <input name="autocomplete_a" id="autocomplete_a" type="text" class="form-control" placeholder="Ville" value="<?php echo e(old('autocomplete_a')); ?>" required>
                                <span class="input-group-addon"><span class="color-red glyphicon glyphicon-map-marker"></span></span>
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa color-blue fa-calendar fa-lg"></i></span>
                                <input type="text" id="datepicker" name="date_depart" class="form-control" placeholder="Ets/Ong" value="<?php echo e(old('date_depart')); ?>">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
                                </span>
                            </div>
                        </div>
                    </div>
                <input type="hidden"  id="ville_d" name="ville_d" value="">
                <input type="hidden"  id="wilaya_d" name="wilaya_d" value="">
                <input type="hidden"  id="geoloc_d" name="geoloc_d" value="">
            </form>
        </div>
    </div>
</div>

<?php /**PATH C:\laragon\www\fil-rouge1\resources\views/annonce/recherche.blade.php ENDPATH**/ ?>