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
    OCA.kmasercurity.Core.initialDocumentTitle = document.title;
    OCA.kmasercurity.Core.contentView = $("#content-view");
    document.title = "Dashboard";
    if (OCA.kmasercurity.Core.AjaxCallStatus !== null) {
      OCA.kmasercurity.Core.AjaxCallStatus.abort();
    }
    OCA.kmasercurity.Core.AjaxCallStatus = $.ajax({
      type: "GET",
      url: OC.generateUrl("apps/kmasercurity/dashboard"),
      data: {},
      success: function (jsondata) {
        console.log(jsondata);
        $("#content-view").append(jsondata);
      },
      error: function (xhr, status, error) {
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
    document.getElementById("analysis").style.display = "block";
    document.getElementById("dashboard").style.display = "none";
  },
  handleDashboardToggleClicked: function () {
    document.getElementById("dashboard").style.display = "block";
    document.getElementById("analysis").style.display = "none";
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
  // document
  // .getElementById("analyzeBtn")
  // .addEventListener("click", OCA.kmasercurity.UI.handleAnalyzeToggleClicked);

  // document
  // .getElementById("dashboardBtn")
  // .addEventListener("click", OCA.kmasercurity.UI.handleDashboardToggleClicked);
});
