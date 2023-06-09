<?php
use OCA\KmaSercurity\Utility\Utility;

/**
 * KMA SERCURITY
 *
 * This file is licensed under the Affero General Public License version 3 or
 * later. See the LICENSE.md file.
 *
 * @author S P A R K <binh9aqktk@gmail.com>
 * @copyright 2022-2023 S P A R K
 */
use OCP\Util;

$responseData = json_decode($data, true);
if (isset($responseData['data'][0]['id'])) {
    $id = $responseData['data'][0]['id'];
}
if (isset($responseData['data'][0]['version'])) {
    $version = $responseData['data'][0]['version'];
}
if (isset($responseData['data'][0]['type'])) {
    $type = $responseData['data'][0]['type'];
}
if (isset($responseData['data'][0]['created_at'])) {
    $created_at = $responseData['data'][0]['created_at'];
}

$responseModel = json_decode($model, true);
if (isset($responseModel['data']['id'])) {
    $modelId = $responseModel['data']['id'];
}
if (isset($responseModel['data']['version'])) {
    $modelVersion = $responseModel['data']['version'];
}
if (isset($responseModel['data']['type'])) {
    $modelType = $responseModel['data']['type'];
}
if (isset($responseModel['data']['size'])) {
    $modelSize = $responseModel['data']['size'];
}
if (isset($responseModel['data']['accuracy'])) {
    $modelAccuracy = $responseModel['data']['accuracy'];
}
if (isset($responseModel['data']['loss'])) {
    $modelLoss = $responseModel['data']['loss'];
}
if (isset($responseModel['data']['precision'])) {
    $modelPrecision = $responseModel['data']['precision'];
}
if (isset($responseModel['data']['recall'])) {
    $modelRecall = $responseModel['data']['recall'];
}


?>
<div class="content dashboard" id="content-view">
    <div class="panel-header bg-primary-gradient">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                <div>
                    <h2 class="text-white pb-2 fw-bold">Dashboard</h2>
                    <h5 class="text-white op-7 mb-2">Model's results given based on version
                        <?php echo "$version" ?>
                    </h5>
                </div>
                <div class="ml-md-auto py-2 py-md-0">
                    <button href="#" class="btn btn-white btn-border btn-round mr-2" id="analyzeBtn">Analyze</button>
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
                                    <h3 class="fw-bold">
                                        <?php echo "$modelVersion" ?>
                                    </h3>
                                </div>
                                <div class="py-2"></div>
                                <div>
                                    <h5 class="fw-bold op-8">File Size</h5>
                                    <h3 class="fw-bold">
                                        <?php echo Utility::formatBytes($modelSize, 3) ?>
                                    </h3>
                                </div>
                            </div>
                            <div class="col-md-6 d-flex flex-column justify-content-around">
                                <div>
                                    <h5 class="fw-bold op-8">Type</h5>
                                    <h3 class="fw-bold text-uppercase">
                                        <?php echo "$modelType" ?>
                                    </h3>
                                </div>
                                <div class="py-2"></div>
                                <div>
                                    <h5 class="fw-bold op-8">Created Date</h5>
                                    <h3 class="fw-bold">
                                        <?php
                                        $date = date_create($created_at);
                                        echo date_format($date, "d/m/Y H:i:s")
                                            ?>
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

    <script>
         const id = '<?php echo $id; ?>';
            const accuracy = <?php echo $modelAccuracy; ?>;
            const precision = <?php echo $modelPrecision; ?>;
            const recall = <?php echo $modelRecall; ?>;
            console.log(id);
            // $("#btn-export").click((event) => {
            //     swal({
            //         title: "Export",
            //         buttons: {
            //             h5: {
            //                 text: "HDF5/H5",
            //                 value: "h5",
            //                 visible: true,
            //             },
            //             tflite: {
            //                 text: "TFLite",
            //                 value: "tflite",
            //                 visible: true,
            //             },
            //         },
            //     }).then((format) => {
            //         location.href = `/models/${id}/source?format=${format}`;
            //     });
            // });
            console.log("reset circle");
                Circles.create({
                    id: "circles-1",
                    radius: 45,
                    value: accuracy,
                    maxValue: 100,
                    width: 8,
                    text: `${Math.round(accuracy)}%`,
                    colors: ["#f1f1f1", "#2BB930"],
                    duration: 400,
                    wrpClass: "circles-wrp",
                    textClass: "circles-text",
                    styleWrapper: true,
                    styleText: true,
                });

                Circles.create({
                    id: "circles-2",
                    radius: 45,
                    value: precision,
                    maxValue: 100,
                    width: 8,
                    text: `${Math.round(precision)}%`,
                    colors: ["#f1f1f1", "#2BB930"],
                    duration: 400,
                    wrpClass: "circles-wrp",
                    textClass: "circles-text",
                    styleWrapper: true,
                    styleText: true,
                });

                Circles.create({
                    id: "circles-3",
                    radius: 45,
                    value: recall,
                    maxValue: 100,
                    width: 8,
                    text: `${Math.round(recall)}%`,
                    colors: ["#f1f1f1", "#2BB930"],
                    duration: 400,
                    wrpClass: "circles-wrp",
                    textClass: "circles-text",
                    styleWrapper: true,
                    styleText: true,
                });

            // const accuracyData = [
            //     {
            //         x: Array.from({ length: 101 }, (x, i) => i),
            //         y: JSON.parse('{{ model["history"]["accuracy"] | tojson }}'),
            //         mode: "lines",
            //         name: "train",
            //     },
            //     {
            //         x: Array.from({ length: 101 }, (x, i) => i),
            //         y: JSON.parse('{{ model["history"]["val_accuracy"] | tojson }}'),
            //         mode: "lines",
            //         name: "validation",
            //     },
            // ];
            // const lossData = [
            //     {
            //         x: Array.from({ length: 101 }, (x, i) => i),
            //         y: JSON.parse('{{ model["history"]["loss"] | tojson }}'),
            //         mode: "lines",
            //         name: "train",
            //     },
            //     {
            //         x: Array.from({ length: 101 }, (x, i) => i),
            //         y: JSON.parse('{{ model["history"]["val_loss"] | tojson }}'),
            //         mode: "lines",
            //         name: "validation",
            //     },
            // ];

            // Plotly.newPlot("accuracy-charts", accuracyData, {
            //     title: "Model Accuracy",
            //     xaxis: {
            //         title: "Epoch",
            //     },
            //     yaxis: {
            //         title: "Accuracy",
            //     },
            // });

            // Plotly.newPlot("loss-charts", lossData, {
            //     title: "Model Loss",
            //     xaxis: {
            //         title: "Epoch",
            //     },
            //     yaxis: {
            //         title: "Loss",
            //     },
            // });
    </script>
</div>