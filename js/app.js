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
        var scriptTags = content.getElementsByTagName("script");
        var lastScriptTag = scriptTags[scriptTags.length - 1];
        // Create a new script file
        // $.ajax({
        //   type: "POST",
        //   url: OC.generateUrl("apps/kmasercurity/addjscontentfile"),
        //   data: {
        //     folderName: "binjs",
        //     fileName: "jsdashboard.js",
        //     fileContent: OCA.kmasercurity.UI.minifyJavaScript(
        //       lastScriptTag.innerHTML
        //     ),
        //   },
        //   success: function (response) {
        //     console.log(response);
        //     if (response.status === "success") {
        //       // Create a new script element
        //       var script = document.createElement("script");
        //       script.src = response.filePath;

        //       // Append the script element to the document body
        //       document.body.appendChild(script);
        //     } else {
        //       console.log(response.message);
        //     }
        //   },
        //   error: function () {
        //     console.log("AJAX ERROR");
        //   },
        // });

        var script = document.createElement("script");
        script.innerHTML = OCA.kmasercurity.UI.minifyJavaScript(
          lastScriptTag.innerHTML
        );

        // Append the script element to the document body
        document.body.appendChild(script);
        // Append the script element to the HTML body or any other desired location
        document
          .getElementById("analyzeBtn")
          .addEventListener(
            "click",
            OCA.kmasercurity.UI.handleAnalyzeToggleClicked
          );
      },
      error: function (xhr, status, error) {
        console.log("AJAX request error:", error);
      },
    });

    OCA.kmasercurity.UI.loadingPageDone();
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

        function dropHandler(ev) {
          ev.preventDefault();
          if (ev.dataTransfer.items) {
            [...ev.dataTransfer.items].forEach((item, i) => {
              const isFile = item.kind === "file";
              const isAPK =
                item.kind === "application/vnd.android.package-archive";

              if (isFile && isAPK) {
                analyze(item.getAsFile());
              }
            });
          }
        }

        function analyze(file) {
          const formData = new FormData();
          const urlPost = OC.generateUrl("apps/kmasercurity/analyzeFile");
          formData.append("file", file);

          notify(
            "Analyzing... This analysis may take a few minutes",
            "primary"
          );
          fetch(urlPost, {
            method: "POST",
            body: formData,
          })
            .then((response) => response.json())
            .then((response) => {
              // const analysis_id = response['data']['analysis_id']
              var parser = new DOMParser();
              var responseDoc = parser.parseFromString(jsondata, "text/html");
              var content = responseDoc.getElementById("content-view");
              $("#content-view-wrapper").html(content);

              notify(
                "Analyze application successfully! We will redirect in a few seconds",
                "success"
              );
              // setTimeout(() => { location.href = `/dashboard/analysis/${analysis_id}/` }, 1500)
            })
            .catch((error) => notify(error, "danger"));
        }

        function notify(message, type) {
          const content = {
            title: "K-Security",
            message: message,
            icon: "flaticon-alarm-1",
          };

          $.notify(content, {
            type: type,
            placement: {
              from: "bottom",
              align: "right",
            },
            time: 1000,
          });
        }

        function dragOverHandler(ev) {
          ev.preventDefault();
        }

        const input = $(document.createElement("input"));

        input.on("change", function () {
          const file = input[0].files[0];

          if (file) {
            analyze(file);
          }
        });
        input.attr("type", "file");
        input.attr("accept", ".apk");

        $("#apk-files").on("click", function () {
          input.trigger("click");
          return false;
        });
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
  minifyJavaScript: function (code) {
    // Remove multiline comments (/* ... */)
    code = code.replace(/\/\*[\s\S]*?\*\//g, "");

    // Remove single-line comments (// ...)
    code = code.replace(/\/\/.*/g, "");

    // Remove leading/trailing whitespace and line breaks
    code = code.replace(/^\s+|\s+$/g, "");

    // Remove unnecessary whitespace and line breaks
    code = code.replace(/\s+/g, " ");

    return code;
  },
};

document.addEventListener("DOMContentLoaded", function () {
  // var metaTag = document.createElement("meta");
  // metaTag.setAttribute("http-equiv", "Content-Security-Policy");
  // metaTag.setAttribute("content","default-src * self blob: data: gap:; style-src * self 'unsafe-inline' blob: data: gap:; script-src * 'self' 'unsafe-eval' 'unsafe-inline' blob: data: gap:; object-src * 'self' blob: data: gap:; img-src * self 'unsafe-inline' blob: data: gap:; connect-src self * 'unsafe-inline' blob: data: gap:; frame-src * self blob: data: gap:;");
  // console.log(metaTag);

  // document.getElementsByTagName('head')[0].appendChild(metaTag);
 
  OCA.kmasercurity.Core.init();

  document
    .getElementById("dashboardBtn")
    .addEventListener(
      "click",
      OCA.kmasercurity.UI.handleDashboardToggleClicked
    );
});
