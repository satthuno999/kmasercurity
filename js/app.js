/**
 * KMA SERCURITY
 *
 * This file is licensed under the Affero General Public License version 3 or
 * later. See the LICENSE.md file.
 *
 * @author S P A R K <binh9aqktk@gmail.com>
 * @copyright 2022-2023 S P A R K
 */

/* global OCA, OCP, OC, t, generateUrl, _, MediaMetadata, Sonos, playSonos, requestToken */
"use strict";

if (!OCA.kmasercurity) {
  /**
   * @namespace
   */
  OCA.kmasercurity = {};
}

/**
 * @namespace OCA.kmasercurity.Core
 */
OCA.kmasercurity.Core = {
  initialDocumentTitle: null,
  AjaxCallStatus: null,
  drag: null,
  contentView: null,

  init: function () {
    document.title = "Dashboard";
    OCA.kmasercurity.UI.loadingPage();
    if (OCA.kmasercurity.Core.AjaxCallStatus !== null) {
      OCA.kmasercurity.Core.AjaxCallStatus.abort();
    }
    OCA.kmasercurity.Core.AjaxCallStatus = $.ajax({
      type: "GET",
      url: OC.generateUrl("apps/kmasercurity/dashboard"),
      data: {},
      success: function (jsondata) {
        var parser = new DOMParser();
        var responseDoc = parser.parseFromString(jsondata, "text/html");
        var content = responseDoc.getElementById("content-view");
        $("#content-view-wrapper").html(content);

        document
          .getElementById("analyzeBtn")
          .addEventListener(
            "click",
            OCA.kmasercurity.UI.handleAnalyzeToggleClicked
          );
        OCA.kmasercurity.UI.loadingPageDone();
      },
      error: function (xhr, status, error) {
        console.log("AJAX request error:", error);
      },
    });
  },

  showAnalyze: function () {
    document.title = "Analyze";
    OCA.kmasercurity.UI.loadingPage();
    if (OCA.kmasercurity.Core.AjaxCallStatus !== null) {
      OCA.kmasercurity.Core.AjaxCallStatus.abort();
    }
    OCA.kmasercurity.Core.AjaxCallStatus = $.ajax({
      type: "GET",
      url: OC.generateUrl("apps/kmasercurity/analyze"),
      data: {},
      success: function (jsondata) {
        var parser = new DOMParser();
        var responseDoc = parser.parseFromString(jsondata, "text/html");
        var content = responseDoc.getElementById("content-view");
        $("#content-view-wrapper").html(content);
        OCA.kmasercurity.UI.loadingPageDone();
      },
      error: function (xhr, status, error) {
        OCA.kmasercurity.Core.init();
        console.log("AJAX request error:", error);
      },
    });
  },
};
/**
 * @namespace OCA.kmasercurity.Core
 */
OCA.kmasercurity.UI = {
  handleAnalyzeToggleClicked: function () {
    OCA.kmasercurity.Core.showAnalyze();
  },
  handleDashboardToggleClicked: function () {
    OCA.kmasercurity.Core.init();
  },
  loadingPage: function () {
    $("#content-view-wrapper").css("opacity", "0");
  },
  loadingPageDone: function () {
    $("#content-view-wrapper").css("opacity", "1");
  },
};

document.addEventListener("DOMContentLoaded", function () {
  var metaTag = document.createElement("meta");
  metaTag.setAttribute("http-equiv", "Content-Security-Policy");
  metaTag.setAttribute(
    "content",
    "default-src * self blob: data: gap:; style-src * self 'unsafe-inline' blob: data: gap:; script-src * 'self' 'unsafe-eval' 'unsafe-inline' blob: data: gap:; object-src * 'self' blob: data: gap:; img-src * self 'unsafe-inline' blob: data: gap:; connect-src self * 'unsafe-inline' blob: data: gap:; frame-src * self blob: data: gap:;"
  );

  document.head.appendChild(metaTag);

  // fetch(`https://www.googleapis.com/books/v1/volumes?q=javascript`, {
  //   method: "GET",
  // })
  //   .then((response) => response.json())
  //   .then((response) => {
  //     console.log(response);
  //   })
  //   .catch((error) => console.log(error));
  OCA.kmasercurity.Core.init();

  document
    .getElementById("dashboardBtn")
    .addEventListener(
      "click",
      OCA.kmasercurity.UI.handleDashboardToggleClicked
    );
});
