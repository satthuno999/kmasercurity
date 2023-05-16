<?php
/**
 * KMA SERCURITY
 *
 * This file is licensed under the Affero General Public License version 3 or
 * later. See the LICENSE.md file.
 *
 * @author S P A R K <binh9aqktk@gmail.com>
 * @copyright 2022-2023 S P A R K
 */
?>
<div class="content">
    <?php
    $uri = $_SERVER['REQUEST_URI'];
    ?>

<p><?php echo "$data"?></p>
    <div class="panel-header bg-primary-gradient">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                <div>
                    <h2 class="text-white pb-2 fw-bold">Dashboard</h2>
                    <h5 class="text-white op-7 mb-2">Model's results given based on version {{ model["version"]
                        }}</h5>
                </div>
                <div class="ml-md-auto py-2 py-md-0">
                    <a href="#/analysis" class="btn btn-white btn-border btn-round mr-2">Analyze</a>
                    <button id="btn-export" class="btn btn-secondary btn-round">Export</button>
                </div>
            </div>
        </div>
    </div>
    <div class="page-inner mt--5">
        <div class="row mt--2">
            <div class="col-md-6">
                <div class="card full-height">
                    <div class="card-body">
                        <div class="card-title">Overall Summary</div>
                        <div class="card-category">Overview information about accuracy prediction of model</div>
                        <div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
                            <div class="px-2 pb-2 pb-md-0 text-center">
                                <div id="circles-1"></div>
                                <h6 class="fw-bold mt-3 mb-0">Accuracy</h6>
                            </div>
                            <div class="px-2 pb-2 pb-md-0 text-center">
                                <div id="circles-2"></div>
                                <h6 class="fw-bold mt-3 mb-0">Precision</h6>
                            </div>
                            <div class="px-2 pb-2 pb-md-0 text-center">
                                <div id="circles-3"></div>
                                <h6 class="fw-bold mt-3 mb-0">Recall</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card full-height">
                    <div class="card-body">
                        <div class="card-title">Details Information</div>
                        <div class="row py-4">
                            <div class="col-md-6 d-flex flex-column justify-content-around">
                                <div>
                                    <h5 class="fw-bold op-8">Version</h5>
                                    <h3 class="fw-bold">{{ model["version"] }}</h3>
                                </div>
                                <div class="py-2"></div>
                                <div>
                                    <h5 class="fw-bold op-8">File Size</h5>
                                    <h3 class="fw-bold">{{ model["size"] | filesizeformat }}</h3>
                                </div>
                            </div>
                            <div class="col-md-6 d-flex flex-column justify-content-around">
                                <div>
                                    <h5 class="fw-bold op-8">Type</h5>
                                    <h3 class="fw-bold text-uppercase">{{ model["type"] }}</h3>
                                </div>
                                <div class="py-2"></div>
                                <div>
                                    <h5 class="fw-bold op-8">Created Date</h5>
                                    <h3 class="fw-bold">{{ model["created_at"].strftime("%d-%m-%Y %H:%M:%S") }}
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row row-card-no-pd">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-head-row card-tools-still-right">
                            <h4 class="card-title">Training History</h4>
                        </div>
                    </div>
                    <div class="card-body row">
                        <div class="col-md-6 chart-container">
                            <div id="accuracy-charts"></div>
                        </div>
                        <div class="col-md-6 chart-container">
                            <div id="loss-charts"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>