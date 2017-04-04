<div class="row">
    <div class="col-lg-12">
        <div class="card" style="margin-bottom: 5px;">
            <div class="card-body no-padding">
                <ul class="list">
                    <li class="tile">
                        <div class="tile-content">
                            <div class="tile-icon">
                                <i class="glyphicon glyphicon-search"></i>
                            </div>
                            <div class="tile-text">

                                <?php echo Form::open(); ?>

                                <input type="text" class="form-control" placeholder="Rechercher un client..." onkeyup="searchClientByName($(this).val(), <?php if(isset($all)): ?> '*' <?php else: ?> '0' <?php endif; ?> );" />
                                <input type="hidden" name="client_id" id="client_id" />
                                <input type="submit" id="submit" style="display: none;" />
                                <?php echo Form::close(); ?>


                                <div id="results">

                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>