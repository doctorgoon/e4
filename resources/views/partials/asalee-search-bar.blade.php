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
                                <input type="text" class="form-control" placeholder="Rechercher une infirmière..." onkeyup="searchDoctorAsalee($(this).val())">
                            </div>
                        </div>

                        <a href="{{ action('AdminProjectsController@addAsaleeOffice') }}" class="btn btn-flat ink-reaction">
                            <i class="glyphicon glyphicon glyphicon-user"></i>
                        </a>

                        <a aria-expanded="false" href="#" class="btn btn-icon-toggle dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-share"></i></a>
                        <ul class="dropdown-menu animation-dock pull-right menu-card-styling" role="menu" style="text-align: left;">
                            @foreach(get_all_asalee_quotations() as $quotation)
                                <li>
                                    <a href="{{ action('AdminProjectsController@getAsaleeExcelDocument', [$quotation->id]) }}">
                                        Devis n° {{ $quotation->quotation_number }} - {{ \Carbon\Carbon::parse($quotation->quotation_date)->format('d/m/Y') }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>

                        <a href="{{ action('ProjectsController@asaleeInterface') }}" class="btn btn-flat ink-reaction">
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