"use strict";

function dropHandler(ev) {
  ev.preventDefault();
  if (ev.dataTransfer.items) {
    [...ev.dataTransfer.items].forEach((item, i) => {
      const isFile = item.kind === "file";
      const isAPK = item.kind === "application/vnd.android.package-archive";

      if (isFile && isAPK) {
        analyze(item.getAsFile());
      }
    });
  }
}

function analyze(file) {
  const formData = new FormData();

  formData.append("file", file);
  notify("Analyzing... This analysis may take a few minutes", "primary");
  fetch(`/dashboard/analysis/`, {
    method: "POST",
    body: formData,
  })
    .then((response) => response.json())
    .then((response) => {
      const analysis_id = response["data"]["analysis_id"];

      notify(
        "Analyze application successfully! We will redirect in a few seconds",
        "success"
      );
      setTimeout(() => {
        location.href = `/dashboard/analysis/${analysis_id}/`;
      }, 1500);
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
