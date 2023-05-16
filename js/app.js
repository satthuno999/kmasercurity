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

if (!OCA.kmasecurity) {
  /**
   * @namespace
   */
  OCA.kmasecurity = {};
}

/**
 * @namespace OCA.kmasecurity.Core
 */
OCA.kmasecurity.Core = {
  initialDocumentTitle: null,
  AjaxCallStatus: null,
  drag: null,

  init: function () {
    OCA.kmasecurity.Core.initialDocumentTitle = document.title;

    if (OCA.kmasecurity.Core.AjaxCallStatus !== null) {
      OCA.kmasecurity.Core.AjaxCallStatus.abort();
    }
    OCA.kmasecurity.Core.AjaxCallStatus = $.ajax({
      type: "GET",
      url: "http://14.225.254.142:8080/api/v1/models",
      data: {},
      success: function (jsondata) {
        //document.getElementById('loading').style.display = 'none';
        var subTitle = "";
        console.log(jsondata);
        if (jsondata.status === "success") {
        } else {
        }
        document.title = subTitle + document.title;
      },
    });
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
});
