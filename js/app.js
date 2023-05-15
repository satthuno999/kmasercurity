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

  WebFont.load({
    google: { families: ["Lato:300,400,700,900"] },
    custom: {
      families: [
        "Flaticon",
        "Font Awesome 5 Solid",
        "Font Awesome 5 Regular",
        "Font Awesome 5 Brands",
        "simple-line-icons",
      ],
      urls: [
        "http://192.168.1.5/nextcloud/apps/kmasercurity/css/fonts.min.css",
      ],
    },
    active: function () {
      sessionStorage.fonts = true;
    },
  });
  
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

  //   fetch(`http://14.225.254.142:8080/api/v1/models`, {
  //     method: "GET",
  //   })
  //     .then((response) => response.json())
  //     .then((response) => {
  //       console.log(response);
  //     })
  //     .catch((error) => console.log(error));
  //   OCA.kmasercurity.Core.init();
});
