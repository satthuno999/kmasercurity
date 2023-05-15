/**
 * KMA SERCURITY
 *
 * This file is licensed under the Affero General Public License version 3 or
 * later. See the LICENSE.md file.
 *
 * @author S P A R K <binh9aqktk@gmail.com>
 * @copyright 2022-2023 S P A R K
 */

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
// OCA.kmasecurity.Core = {
//   initialDocumentTitle: null,
//   AjaxCallStatus: null,
//   drag: null,

//   init: function () {
//     OCA.kmasecurity.Core.initialDocumentTitle = document.title;

//     if (OCA.kmasecurity.Core.AjaxCallStatus !== null) {
//       OCA.kmasecurity.Core.AjaxCallStatus.abort();
//     }
//     OCA.kmasecurity.Core.AjaxCallStatus = $.ajax({
//       type: "GET",
//       url: "http://14.225.254.142:8080/api/v1/models",
//       data: {},
//       success: function (jsondata) {
//         //document.getElementById('loading').style.display = 'none';
//         var subTitle = "";
//         console.log(jsondata);
//         if (jsondata.status === "success") {
//         } else {
//         }
//         document.title = subTitle + document.title;
//       },
//     });
//   },
// };

document.addEventListener("DOMContentLoaded", function () {
  var metaTag = document.createElement("meta");
  metaTag.setAttribute("http-equiv", "Content-Security-Policy");
  metaTag.setAttribute("content", "script-src 'self' 'unsafe-inline'");

  document.head.appendChild(metaTag);

  $.ajax({
    type: "GET",
    url: "http://14.225.254.142:8080/api/v1/models",
    data: {},
    success: function (jsondata) {
      //document.getElementById('loading').style.display = 'none';
      var subTitle = "";
      console.log(jsondata);
      alert(1);
      if (jsondata.status === "success") {
      } else {
      }
      document.title = subTitle + document.title;
    },
  });
  OCA.kmasercurity.Core.init();
});
