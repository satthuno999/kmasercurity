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
      url: OC.generateUrl("apps/kmasecurity/analysisTitle"),
      data: {},
      success: function (jsondata) {
        //document.getElementById('loading').style.display = 'none';
        var subTitle = "";
        if (jsondata.status === "success") {
          subTitle = jsondata.data;
        } else {
        }
        document.title = subTitle + document.title;
      },
    });
  },
};

document.addEventListener("DOMContentLoaded", function () {
  OCA.kmasercurity.Core.init();
});
