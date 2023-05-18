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
<div class="container" id="content-view">
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Analysis</h4>
            <ul class="breadcrumbs">
                <li class="nav-home">
                    <a href="/">
                        <i class="flaticon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="/dashboard/">Dashboard</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="/dashboard/analysis/">Analysis</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a>{{ analysis["id"] }}</a>
                </li>
            </ul>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-lg-10 col-xl-9">
                <div class="row align-items-center">
                    <div class="col">
                        <h6 class="page-title"></h6>
                        <h4 class="page-title">ID: #{{ analysis["id"] }}</h4>
                    </div>
                    <div class="col-auto">
                        <button id="btn-save" class="btn btn-primary ml-2"> Save </button>
                    </div>
                </div>
                <div class="page-divider"></div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-invoice">
                            <div class="card-header">
                                <div class="invoice-header">
                                    <h3 class="invoice-title">Name: {{ analysis["name"] }}</h3>
                                    <h3 class="invoice-title"><strong>{{ analysis["malware_type"] }}</strong></h3>
                                </div>
                                <div class="invoice-desc"></div>
                            </div>
                            <div class="card-body">
                                <div class="separator-solid"></div>
                                <div class="row">
                                    <div class="col-md-4 info-invoice">
                                        <h5 class="sub">Version</h5>
                                        <h5>{{ analysis["version_name"] }}</h5>
                                    </div>
                                    <div class="col-md-4 info-invoice">
                                        <h5 class="sub">Package ID</h5>
                                        <h5>{{ analysis["package"] }}</h5>
                                    </div>
                                    <div class="col-md-4 info-invoice">
                                        <h5 class="sub">Version Code</h5>
                                        <h5>{{ analysis["version_code"] }}</h5>
                                    </div>
                                </div>
                                <div class="row pt-3">
                                    <div class="col-md-12">
                                        <div class="invoice-detail">
                                            <div class="invoice-top">
                                                <h3 class="title"><strong>Summary</strong></h3>
                                            </div>
                                            <div class="invoice-item">
                                                <div class="table-responsive">
                                                    <table class="table table-striped">
                                                        <thead>
                                                            <tr>
                                                                <td class="text-center"><strong>Fields</strong></td>
                                                                <td class="text-center"><strong>Values</strong></td>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td class="text-center"><strong>User Features</strong>
                                                                </td>
                                                                <td class="text-center">
                                                                    <br />
                                                                    {% for user_feature in analysis["user_features"] %}
                                                                    {{ user_feature }}<br />
                                                                    {% endfor %}
                                                                    <br />
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-center"><strong>Permissions</strong>
                                                                </td>
                                                                <td>
                                                                    <br />
                                                                    {% for permission in analysis["permissions"] %} {{
                                                                    permission }}<br />
                                                                    {% endfor %}
                                                                    <br />
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-center"><strong>Activities</strong></td>
                                                                <td>
                                                                    <br />
                                                                    {% for activity in analysis["activities"] %} {{
                                                                    activity }}<br />
                                                                    {% endfor %}
                                                                    <br />
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-center"><strong>Services</strong></td>
                                                                <td>
                                                                    <br />
                                                                    {% for service in analysis["services"] %} {{ service
                                                                    }}<br />
                                                                    {% endfor %}
                                                                    <br />
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-center"><strong>Receivers</strong></td>
                                                                <td>
                                                                    <br />
                                                                    {% for receiver in analysis["receivers"] %} {{
                                                                    receiver }}<br />
                                                                    {% endfor %}
                                                                    <br />
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>