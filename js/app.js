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
        console.log(lastScriptTag);
        // Create a new script element
        var script = document.createElement("script");
        script.innerHTML = lastScriptTag.innerHTML;
        script.setAttribute("nonce", "<?php echo $nonce ?>");
        script.setAttribute("defer", "");
        // Append the script element to the HTML body or any other desired location
        document.body.appendChild(script);
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
              const isFile = item.kind === 'file';
              const isAPK = item.kind === 'application/vnd.android.package-archive';

              if (isFile && isAPK) {
                analyze(item.getAsFile());
              }
            });
          }
        }

        function analyze(file) {
          const formData = new FormData();
          const urlPost = OC.generateUrl("apps/kmasercurity/analyzeFile");
          formData.append('file', file);

          notify('Analyzing... This analysis may take a few minutes', 'primary');
          fetch(urlPost, {
            method: 'POST',
            body: formData,
          })
            .then((response) => response.json())
            .then((response) => {
              // const analysis_id = response['data']['analysis_id']
              var parser = new DOMParser();
              var responseDoc = parser.parseFromString(jsondata, "text/html");
              var content = responseDoc.getElementById("content-view");
              $("#content-view-wrapper").html(content);

              notify("Analyze application successfully! We will redirect in a few seconds", 'success');
              // setTimeout(() => { location.href = `/dashboard/analysis/${analysis_id}/` }, 1500)
            })
            .catch((error) => notify(error, 'danger'));
        }

        function notify(message, type) {
          const content = {
            title: 'K-Security',
            message: message,
            icon: 'flaticon-alarm-1',
          };

          $.notify(content, {
            type: type,
            placement: {
              from: 'bottom',
              align: 'right',
            },
            time: 1000,
          });
        }

        function dragOverHandler(ev) {
          ev.preventDefault();
        }

        const input = $(document.createElement('input'));

        input.on('change', function () {
          const file = input[0].files[0];

          if (file) {
            analyze(file);
          }
        });
        input.attr('type', 'file');
        input.attr('accept', '.apk');

        $('#apk-files').on('click', function () {
          input.trigger('click');
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
};

document.addEventListener("DOMContentLoaded", function () {
  // var metaTag = document.createElement("meta");
  // metaTag.setAttribute("http-equiv", "Content-Security-Policy");
  // metaTag.setAttribute("content","default-src * self blob: data: gap:; style-src * self 'unsafe-inline' blob: data: gap:; script-src * 'self' 'unsafe-eval' 'unsafe-inline' blob: data: gap:; object-src * 'self' blob: data: gap:; img-src * self 'unsafe-inline' blob: data: gap:; connect-src self * 'unsafe-inline' blob: data: gap:; frame-src * self blob: data: gap:;");
  // console.log(metaTag);


  // document.getElementsByTagName('head')[0].appendChild(metaTag);
  $('head').append(`<meta http-equiv="Content-Security-Policy" content="script-src * 'self' 'unsafe-eval' 'unsafe-inline' 'nonce-<?php echo $nonce ?>' ;">`)
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
