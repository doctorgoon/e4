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
                                <input type="text" class="form-control" placeholder="Rechercher un médecin..." onkeyup="searchDoctorGsk($(this).val())">
                            </div>
                        </div>

                        <a href="{{ action('AdminProjectsController@addGskDoctor') }}" class="btn btn-flat ink-reaction">
                            <i class="glyphicon glyphicon glyphicon-user"></i>
                        </a>
                        <a href="{{ action('AdminProjectsController@getGskExcelDocument') }}" class="btn btn-flat ink-reaction">
                            <i class="glyphicon glyphicon-share"></i>
                        </a>
                        <a href="{{ action('ProjectsController@gskInterface') }}" class="btn btn-flat ink-reaction">
                            <i class="glyphicon glyphicon-log-in"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row" id="card_results" style="display: none;">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body no-padding">
                        <ul class="list divider-full-bleed" id="results">
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>